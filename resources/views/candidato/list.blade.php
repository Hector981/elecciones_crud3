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
            <h1>Candidatos</h1>
        </div>
        <div class="col right">
            <a href="{{ route('candidato.create')}}"class="btn btn-primary btn-block">Registrar Candidato</a></td>
        </div>
        <hr>
    </div>
    <hr>

    <div class="row row-cols-1 row-cols-md-3">
    @foreach($candidatos as $candidato)
        <div class="col mb-4">
            <div class="card">
                    <td></td>
                <div class="card-body">
                    <div class="view overlay">
                        <img class="card-img-top" src="{{$candidato->foto}}" alt="{{$candidato->foto}}">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <h5 class="card-title">Candidato {{$candidato->id}} </h5>
                    <p class="card-text">{{$candidato->nombrecompleto}}</p>
                    <p class="card-text">Sexo {{$candidato->sexo}}</p>
                    <p class="card-text">Perfil: {{$candidato->perfil}}</p>
                </div>
                <div class="card-footer ">
                    <div class="col">
                        <a class="btn btn-info btn-block" href="{{ route('candidato.edit', $candidato->id)}}" class="white-text"><i class="fas fa-pen"></i> Modificar</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('candidato.destroy', $candidato->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Esta seguro de borrar {{$candidato->nombrecompleto}}')"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
<div>
@endsection