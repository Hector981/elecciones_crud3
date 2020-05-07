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
            <h1>Votos De Los Canditdatos</h1>
        </div>
        <div class="col right">
            <a href="{{ route('votocandidato.create')}}"class="btn btn-primary btn-block">Registrar Votacion</a></td>
        </div>
        <hr>
    </div>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Candidato</th>
            <th scope="col">Nombre De Candidato</th>
            <th scope="col">Total De Votos</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <!-- RECORRIDO DE TABLA  -->
            @foreach($votocandidatos as $votocandidato)
                <!-- RECORRIDO DE TABLA  -->
                @foreach($candidatos as $candidato)
                    @if($votocandidato->candidato_id === $candidato->id)
                        @php ($cand = $candidato->nombrecompleto)
                        @break;
                    @endif
                @endforeach
            

            <tr>
                <th scope="row">{{$votocandidato->voto_id}}</th>
                <td>{{$cand}}</td>
                <td>{{$votocandidato->votos}}</td>
                <td> 
                <div class="row">
                    <div class="col">
                        <a class="btn btn-info btn-block" href="{{ route('votocandidato.edit', $votocandidato->voto_id)}}" class="white-text"><i class="fas fa-pen"></i> Modificar</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('votocandidato.destroy', $votocandidato->voto_id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Esta seguro de borrar {{$candidato->nombrecompleto}}')"><i class="fas fa-trash"></i> Eliminar</button>
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