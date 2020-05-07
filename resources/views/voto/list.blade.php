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
            <h1>Votos</h1>
        </div>
        <div class="col right">
            <a href="{{ route('voto.create')}}"class="btn btn-primary btn-block">Registrar Votos</a></td>
        </div>
        <hr>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Numero De Eleccion</th>
            <th scope="col">Eleccion</th>
            <th scope="col">Casilla</th>
            <th scope="col">Evidencia</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <!-- RECORRIDO DE TABLA eleccioncomite -->
            @foreach($votos as $voto)
                <!-- RECORRIDO DE TABLA eleccion para estetica web -->
                @foreach($elecciones as $eleccion)
                    @if($voto->eleccion_id === $eleccion->id)
                        @php ($periodo = $eleccion->periodo)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA casilla para estetica web -->
                @foreach($casillas as $casilla)
                    @if($voto->casilla_id === $casilla->id)
                        @php($name = $casilla->ubicacion)
                        @break;
                    @endif
                @endforeach
            

            <tr>
                <th scope="row">{{$voto->id}}</th>
                <td>{{$periodo}}</td>
                <td>{{$name}}</td>
                <td>{{$voto->evidencia}}</td>
                <td> 
                <div class="row">
                    <div class="col">
                        <a class="btn btn-info btn-block" href="{{ route('voto.edit', $voto->id)}}" class="white-text"><i class="fas fa-pen"></i> Modificar</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('voto.destroy', $voto->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Esta seguro de borrar {{$voto->id}}')"><i class="fas fa-trash"></i> Eliminar</button>
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