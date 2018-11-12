@extends ('pageParts.main')
@section('content')
<a class="btn btn-danger"  href="/employees" role="button">Go back</a>
{!! Form::open(['action' => 'EmployeesController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'name')}}
        {{Form::text('name', '',  ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('surname', 'surname')}}
        {{Form::text('surname', '',  ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'email')}}
        {{Form::text('email', '',  ['class' => 'form-control'])}}
    </div>
    {{Form::submit('submit', ['class'  => 'btn btn-danger'])}}
{!! Form::close() !!}
@endsection