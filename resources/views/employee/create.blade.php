@extends ('pageParts.main')
@section('content')
<a class="btn btn-danger"  href="/employees" role="button">Go back</a>
{!! Form::open(['action' => 'employeeController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('firstName', 'firstName')}}
        {{Form::text('firstName', '',  ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('lastName', 'lastName')}}
        {{Form::text('lastName', '',  ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'email')}}
        {{Form::text('email', '',  ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::select('workingplace', ['coach' => 'Coach', 'worker' => 'Worker', 'board' => 'Member of the Board'], null, ['placeholder' => 'Working place'])}}
       
    </div>
    {{Form::submit('submit', ['class'  => 'btn btn-danger'])}}
{!! Form::close() !!}
@endsection