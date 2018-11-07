@extends ('pageParts.main')
@section('content')

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Ime</span>
    </div>
        <input type="text" value="{{$employees->name}}" class="form-control"  aria-label="Name" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Prezime</span>
    </div>
        <input type="text" value="{{$employees->surname}}" class="form-control"  aria-label="Name" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Email</span>
    </div>
        <input type="text" value="{{$employees->email}}" class="form-control"  aria-label="Name" aria-describedby="basic-addon1">
</div>   
<button>Promjeni</button>  
@endsection