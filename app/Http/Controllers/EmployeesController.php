<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employees;
use App\coaches;
use Schema;
use DB;

class employeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employees::orderBy('surname','asc')->paginate(10);
        $columns = Schema::getColumnListing('employees');
        return view('employees.index')
            ->with('columns', $columns)
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
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
            'name' => 'required|min:3|max:20|alpha',
            'surname' => 'required|min:3|max:20|alpha',
            'email' => 'required|unique:employees,email|email',
            'workingplace' => 'required|in:coach,worker,board'
            
        ]);
        $employee = new employees;
        $employee->name = $request->input('name');
        $employee->surname = $request->input('surname');
        $employee->email = $request->input('email');
        $employee->workingplace = $request->input('workingplace');
        $employee->save();

        if($employee->workingplace==="coach"){
            $coach = new coaches;
            $coach->employee_id = $employee->id;
            $coach->save();
        }

        return redirect('/employees')->with('success', 'new employee created!');
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
        return view('employees.edit')->with('employees',$employees);
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
        $employees = Employees::find($id);
        $this-> validate($request, [
            'name' => 'required|min:3|max:20|alpha',
            'surname' => 'required|min:3|max:20|alpha',
            'email' => 'required|string|email|max:255|unique:employees,email,'.$employees->id,
            'workingplace' => 'required|in:coach,worker,board'
            
        ]);
        $employee = Employees::find($id);
        $employee->name = $request->input('name');
        $employee->surname = $request->input('surname');
        $employee->email = $request->input('email');
        $employee->workingplace = $request->input('workingplace');
        $employee->save();

        $coaches = DB::select("select * from coaches where employee_id = '$employee->id'");
        if($employee->workingplace == "coach")
        {
               if(empty($coaches))
               {
                   $coach = new Coaches;
                   $coach->employee_id = $employee->id;
                   $coach->save();
               }            
        }
        else{
               if(!empty($coaches))
               {
                Coaches::where('employee_id', $employee->id)->delete();
               }  
        }
        return redirect('/employees')->with('success', 'employee updated!');
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employees::find($id);
        $employee->delete(); 
        return redirect('/employees')->with('success', 'employee deleted!');
    }
}
