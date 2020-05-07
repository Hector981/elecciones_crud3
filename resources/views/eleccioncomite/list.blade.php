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
            <h1>Comites</h1>
        </div>
        <div class="col right">
            <a href="{{ route('eleccioncomite.create')}}"class="btn btn-primary btn-block">Registrar Un Comite</a></td>
        </div>
        <hr>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Comite</th>
                <th scope="col">Eleccion</th>
                <th scope="col">Funcionario</th>
                <th scope="col">Rol</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($elecciones as $eleccioncomite)
            <!-- RECORRIDO DE TABLA eleccion para estetica web -->
            @foreach($eleccioness as $eleccion)
                    @if($eleccioncomite->eleccion_id === $eleccion->id)
                        @php ($periodo = $eleccion->periodo)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA funcionario para estetica web -->
                @foreach($funcionarios as $funcionario)
                    @if($eleccioncomite->funcionario_id === $funcionario->id)
                        @php($name = $funcionario->nombrecompleto)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA rol para estetica web -->
                @foreach($roles as $rol)
                    @if($eleccioncomite->rol_id === $rol->id)
                        @php($namerol = $rol->descripcion)
                        @break;
                    @endif
                @endforeach
            <tr>
            <th scope="row">{{$eleccioncomite->id}}</th>
                <td>{{$periodo}}</td>
                <td>{{$name}}</td>
                <td>{{$namerol}}</td>
            <td> 
                <div class="row">
                    <div class="col">
                        <a class="btn btn-info btn-block" href="{{ route('eleccioncomite.edit', $eleccioncomite->id)}}" class="white-text"><i class="fas fa-pen"></i> Modificar</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('eleccioncomite.destroy', $eleccioncomite->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Esta seguro de borrar {{$eleccioncomite->id}}')"><i class="fas fa-trash"></i> Eliminar</button>
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