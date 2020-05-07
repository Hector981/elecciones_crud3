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
            <h1>Elecciones</h1>
        </div>
        <div class="col right">
            <a href="{{ route('eleccion.create')}}"class="btn btn-primary btn-block">Crear Eleccion</a></td>
        </div>
        <hr>
    </div>
    <hr>
    <div class="row row-cols-1 row-cols-md-3">
    @foreach($elecciones as $eleccion)
        <div class="col mb-4">
            <div class="card">
                    <td></td>
                <div class="card-body">
                    <h5 class="card-title">Eleccion {{$eleccion->id}} </h5>
                    <p class="card-text">Periodo {{$eleccion->periodo}}</p>
                    <p class="card-text">Fecha {{$eleccion->fecha}} </p>
                    <p class="card-text">Fecha de apertura {{$eleccion->fechaapertura}}</p>
                    <p class="card-text">Hora de apertura {{$eleccion->horaapertura}}</p>
                    <p class="card-text">Fecha de cierre {{$eleccion->fechacierre}}</p>
                    <p class="card-text">Hora de Cierre {{$eleccion->horacierre}}</p>
                    <p class="card-text">Observaciones {{$eleccion->observaciones}}</p>
                </div>
                
                <div class="card-footer ">
                    <div class="col">
                        <a class="btn btn-info btn-block" href="{{ route('eleccion.edit', $eleccion->id)}}" class="white-text"><i class="fas fa-pen"></i> Modificar</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('eleccion.destroy', $eleccion->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Esta seguro de borrar {{$eleccion->periodo}}')"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
<div>
@endsection