@extends ('pageParts.main')
@section('content')
    
    @if (count($employees) < 1)
    <p>employees not found!</p>
    @else
    <table class="table">
            <thead>
                  
            <th scope="col">
                @foreach ($columns as $column)
                    @if($column != 'id')
                        <th scope="col">{{$column}}</th>
                    @endif
                @endforeach
            </th>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach($employees as $employee)
            <tr>
                <th scope="row"><?php echo $i++; ?></th>
                <td title="click for change"><a href="/employees/{{$employee->id}}" style="color:black;">{{$employee->name}}</a></td>
                <td>{{$employee->surname}}</td>
                <td>{{$employee->email}}</td>
                
                
            </tr>
                @endforeach
               
            </tbody>
        </table>
        {{ $employees->links() }}
    @endif
@endsection