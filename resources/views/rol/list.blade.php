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
            <h1>Roles</h1>
        </div>
        <div class="col right">
            <a href="{{ route('rol.create')}}"class="btn btn-primary btn-block">Crear Rol</a></td>
        </div>
        <hr>
    </div>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Rol</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $rol)
            <tr>
            <th scope="row">{{$rol->id}}</th>
            <td>{{$rol->descripcion}}</td>
            <td> 
                <div class="row">
                    <div class="col">
                        <a class="btn btn-info btn-block" href="{{ route('rol.edit', $rol->id)}}" class="white-text"><i class="fas fa-pen"></i> Modificar</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('rol.destroy', $rol->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Esta seguro de borrar {{$rol->descripcion}}')"><i class="fas fa-trash"></i> Eliminar</button>
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