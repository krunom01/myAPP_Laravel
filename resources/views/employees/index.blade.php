@extends ('pageParts.main')
@section('content')

<table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
                @foreach($columns as $column)
                    @if($column != 'id')
                        <th scope="col">{{$column}}</th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
        <?php $i=1;?>
            @foreach($employees as $employee)
                <tr>   
                    <th scope="row">{{$i++}}</th>
                <td><a href="/employees/{{$employee->id}}" style="color:black;">{{$employee->name}}</a></td>
                    <td>{{$employee->surname}}</td>
                    <td>{{$employee->email}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$employees->links()}}
@endsection