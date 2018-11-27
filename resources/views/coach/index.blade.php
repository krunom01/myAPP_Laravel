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
                    @if($column != 'workingPlace' && $column != 'id')
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
                <td>{{$coach->firstName}}</a></td>
                <td>{{$coach->lastName}}</td>
                <td>{{$coach->email}}</td>
                
                
            </tr>
                @endforeach
               
            </tbody>
        </table>
        
    @endif
@endsection