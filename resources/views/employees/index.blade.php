@extends ('pageParts.main')
@section('content')
<a class="btn btn-danger"  href="/employees/create" role="button">Create new employee</a>
<table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
                @foreach($columns as $column)
                    @if($column != 'id')
                        <th scope="col">{{$column}}</th>
                    @endif
                @endforeach
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1;?>
            @foreach($employees as $employee)
                <tr>   
                    <th scope="row">{{$i++}}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->surname}}</td>
                    <td>{{$employee->email}}</td>
                    <td>  
                    <a href="/employees/{{$employee->id}}/edit" class="btn btn-primary a-btn-slide-text">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong>Edit</strong></span>
                        </a> 
                        {{Form::open(array( 
                            'route' => array( 'employees.destroy', $employee->id ), 
                            'method' => 'POST', 
                            'onsubmit' => "return confirm('Are you sure you want to delete employee $employee->name $employee->surname?')",
                        ))}}          
                        {{Form::hidden('_method', 'DELETE' )}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                        </a> 
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$employees->links()}}
@endsection