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
            <h1>Funcionario En Casillas</h1>
        </div>
        <div class="col right">
            <a href="{{ route('funcionariocasilla.create')}}"class="btn btn-primary btn-block">Registrar Funcionario En Casilla</a></td>
        </div>
        <hr>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Funcionario</th>
            <th scope="col">Nombre De Funcionario</th>
            <th scope="col">Casilla</th>
            <th scope="col">Rol</th>
            <th scope="col">Eleccion</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <!-- RECORRIDO DE TABLA funcionariocasilla -->
            @foreach($funcionarioscasilla as $funcionariocasilla)
                <!-- RECORRIDO DE TABLA funcionario para estetica web -->
                @foreach($funcionarios as $funcionario)
                    @if($funcionariocasilla->funcionario_id === $funcionario->id)
                        @php ($nombre = $funcionario->nombrecompleto)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA casilla para estetica web -->
                @foreach($casillas as $casilla)
                    @if($funcionariocasilla->casilla_id === $casilla->id)
                        @php($lacasilla = $casilla->ubicacion)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA rol para estetica web -->
                @foreach($roles as $rol)
                    @if($funcionariocasilla->rol_id === $rol->id)
                        @php($elrol = $rol->descripcion)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA eleccion para estetica web -->
                @foreach($elecciones as $eleccion)
                    @if($funcionariocasilla->eleccion_id === $eleccion->id)
                        @php($laeleccion = $eleccion->periodo)
                        @break;
                    @endif
                @endforeach
            

            <tr>
                <th scope="row">{{$funcionariocasilla->id}}</th>
                <td>{{$nombre}}</td>
                <td>{{$lacasilla}}</td>
                <td>{{$elrol}}</td>
                <td>{{$laeleccion}}</td>
                
                <td> 
                <div class="row">
                    <div class="col">
                        <a class="btn btn-info btn-block" href="{{ route('funcionariocasilla.edit', $funcionariocasilla->id)}}" class="white-text"><i class="fas fa-pen"></i> Modificar</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('funcionariocasilla.destroy', $funcionariocasilla->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Esta seguro de borrar {{$funcionariocasilla->id}}')"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection