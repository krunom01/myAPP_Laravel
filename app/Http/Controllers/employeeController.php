<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\employees;
use App\coaches;
use Schema;
use DB;
class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = employees::orderBy('lastName','asc')->paginate(10);
        $columns = Schema::getColumnListing('employees');
        return view('employee.index')
            ->with('columns', $columns)
            ->with('employees', $employee);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this-> validate($request, [
            'firstName' => 'required|min:3|max:20|alpha',
            'lastName' => 'required|min:3|max:20|alpha',
            'email' => 'required|unique:employees,email|email',
            'workingplace' => 'required|in:coach,worker,board'
            
        ]);
        $employee = new employees;
        $employee->firstName = $request->input('firstName');
        $employee->lastName = $request->input('lastName');
        $employee->email = $request->input('email');
        $employee->workingplace = $request->input('workingplace');
        $employee->save();

        if($employee->workingplace==="coach"){
            $coach = new coaches;
            $coach->employee_id = $employee->id;
            $coach->save();
        }
        
        return redirect('/employee')->with('success', 'new employee created!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = employees::find($id);
        return view('employee.edit')->with('employees',$employees);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = employees::find($id);
        $this-> validate($request, [
            'firstName' => 'required|min:3|max:20|alpha',
            'lastName' => 'required|min:3|max:20|alpha',
            'email' => 'required|string|email|max:255|unique:employees,email,'.$employee->id,
            'workingplace' => 'required|in:coach,worker,board'
            
        ]);
        $employee = employees::find($id);
        $employee->firstName = $request->input('firstName');
        $employee->lastName = $request->input('lastName');
        $employee->email = $request->input('email');
        $employee->workingplace = $request->input('workingplace');
        $employee->save();

        $coaches = DB::select("select * from coaches where employee_id = '$employee->id'");
        if($employee->workingplace == "coach")
        {
               if(empty($coaches))
               {
                   $coach = new coaches;
                   $coach->employee_id = $employee->id;
                   $coach->save();
               }            
        }
        else{
               if(!empty($coaches))
               {
                coaches::where('employee_id', $employee->id)->delete();
               }  
        }
        return redirect('/employee')->with('success', 'employee updated!');
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employees::find($id);
        $employee->delete(); 
        return redirect('/employee')->with('success', 'employee deleted!');
    }
}