@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 60px;
}

</style>
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <div class="row">
        <div class="col">
            <h1>Casillas</h1>
        </div>
        <div class="col right">
            <a href="{{ route('casilla.create')}}"class="btn btn-primary btn-block">Registrar Nueva Casilla</a></td>
        </div>
        <hr>
    </div>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Casilla</th>
                <th scope="col">Ubicacion</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($casillas as $casilla)
            <tr>
            <th scope="row">{{$casilla->id}}</th>
            <td>{{$casilla->ubicacion}}</td>
            <td> 
                <div class="row">
                    <div class="col">
                        <a class="btn btn-info btn-block" href="{{ route('casilla.edit', $casilla->id)}}" class="white-text"><i class="fas fa-pen"></i> Modificar</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('casilla.destroy', $casilla->id)}}"method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Desea Eliminar Casilla {{$casilla->ubicacion}}')"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
            </td>
            </tr>
            @endforeach
        <tbody>
    <table>
<div>
@endsection
