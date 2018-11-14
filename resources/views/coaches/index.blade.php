@extends ('pageParts.main')
@section('content')
    
    @if (count($coaches) < 1)
    <p>employees not found!</p>
    @else
    <h3>List of coaches</h3>
    <table class="table">
            <thead>
                  
            <th scope="col">
                @foreach ($columns as $column)
                    @if($column != 'workingplace' && $column != 'id')
                        <th scope="col">{{$column}}</th>
                    @endif
                @endforeach
            </th>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach($coaches as $coach)
            <tr>
                <th scope="row"><?php echo $i++; ?></th>
                <td>{{$coach->name}}</a></td>
                <td>{{$coach->surname}}</td>
                <td>{{$coach->email}}</td>
                
                
            </tr>
                @endforeach
               
            </tbody>
        </table>
        
    @endif
@endsection