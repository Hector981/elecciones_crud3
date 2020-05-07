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
            <h1>Funcionarios</h1>
        </div>
        <div class="col right">
            <a href="{{ route('funcionario.create')}}"class="btn btn-primary btn-block">Registrar Funcionario</a></td>
        </div>
        <hr>
    </div>
    <hr>

    <div class="row row-cols-1 row-cols-md-3">
        @foreach($funcionarios as $funcionario)
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Funcionario numero {{$funcionario->id}} </h5>
                    <p class="card-text">{{$funcionario->nombrecompleto}} </p>
                    <p class="card-text">Sexo {{$funcionario->sexo}} </p>
                </div>
                <div class="card-footer ">
                    <div class="col">
                        <a class="btn btn-info btn-block" href="{{ route('funcionario.edit', $funcionario->id)}}" class="white-text"><i class="fas fa-pen"></i> Modificar</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('funcionario.destroy', $funcionario->id)}}"method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-block" onclick="return confirm('Desea Eliminar Casilla {{$funcionario->nombrecompleto}}')"><i class="fas fa-trash"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
<div>
@endsection