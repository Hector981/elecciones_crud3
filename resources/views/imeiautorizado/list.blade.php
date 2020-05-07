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
            <h1>IMEI AUTORIZADOS</h1>
        </div>
        <div class="col right">
            <a href="{{ route('imeiautorizado.create')}}"class="btn btn-primary btn-block">Crear IMEIAUTORIZADO</a></td>
        </div>
        <hr>
    </div>
    <hr>
    
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Funcionario </th>
            <th scope="col">Nombre de Funcionario</th>
            <th scope="col">Eleccion</th>
            <th scope="col">Casilla</th>
            <th scope="col">IMEI</th>
            <th scope="col">Opciones</td>
            </tr>
        </thead>
        <tbody>

            <!-- RECORRIDO DE TABLA imeiautorizado -->
            @foreach($imeiautorizados as $imeiautorizado)
                <!-- RECORRIDO DE TABLA funcionario para estetica web -->
                @foreach($funcionarios as $funcionario)
                    @if($imeiautorizado->funcionario_id === $funcionario->id)
                        @php ($nombre = $funcionario->nombrecompleto)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA eleccion para estetica web -->
                @foreach($elecciones as $eleccion)
                    @if($imeiautorizado->eleccion_id === $eleccion->id)
                        @php($laeleccion = $eleccion->periodo)
                        @break;
                    @endif
                @endforeach

                <!-- RECORRIDO DE TABLA casilla para estetica web -->
                @foreach($casillas as $casilla)
                    @if($imeiautorizado->casilla_id === $casilla->id)
                        @php($lacasilla = $casilla->ubicacion)
                        @break;
                    @endif
                @endforeach


            <tr>
                <td>{{$imeiautorizado->id}}</td>
                <td>{{$nombre}}</td>
                <td>{{$laeleccion}}</td>
                <td>{{$lacasilla}}</td>
                <td>{{$imeiautorizado->imei}}</td>
                <td> 
                <div class="row">
                    <div class="col">
                        <a class="btn btn-info btn-block" href="{{ route('imeiautorizado.edit', $imeiautorizado->id)}}" class="white-text"><i class="fas fa-pen"></i> Modificar</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('imeiautorizado.destroy', $imeiautorizado->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Esta seguro de borrar {{$imeiautorizado->id}}')"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
            
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
    @endsection