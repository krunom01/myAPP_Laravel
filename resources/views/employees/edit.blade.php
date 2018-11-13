@extends ('pageParts.main')
@section('content')
<a class="btn btn-danger"  href="/employees" role="button">Go back</a>

{!! Form::open(['action' => ['EmployeesController@update', $employees->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'name')}}
        {{Form::text('name', $employees->name,  ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('surname', 'surname')}}
        {{Form::text('surname', $employees->surname,  ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'email')}}
        {{Form::email('email', $employees->email,  ['class' => 'form-control'])}}
    </div>
    {{"Working place:"}}
    <div class="form-group">
        {{Form::select('workingplace', ['coach' => 'Coach', 'worker' => 'Worker', 'board' => 'Member of the Board'], $employees->workingplace, ['workingplace' => 'workingplace'])}}
       
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('submit', ['class'  => 'btn btn-danger'])}}
{!! Form::close() !!}
@endsection