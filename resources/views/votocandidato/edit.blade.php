@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper">
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>MODIFICANDO VOTOS DE LA CASILLA {{$votocandidato->id}}</strong>
    </h5>

    <div class="card-body">

        <form method="POST"
            action="{{ route('votocandidato.update', $votocandidato->id) }}"
            enctype="multipart/form-data">
                {{ csrf_field() }}

                @method('PUT')
                <div class="form-row">
                <div class="col">
                <label  for="candidato_id">Selecione Al Candidato</label>
                    <div class="md-form">
                        @csrf
                        <select class="browser-default custom-select mb-4" id="candidato_id" class="form-group" name="candidato_id">
                            <option value="" disabled selected>Candidato</option>
                            @foreach($candidatos as $candidato)
                            <option for="candidato_id" class="form-group" name="candidato_id" label="{{$candidato->nombrecompleto}}" >{{$candidato->id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                <label for="votos">Ingresa la cantidad de votos:</label>
                <input type="number" class="form-control" name="votos" />
                </div>
                </div>
            </div>
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                <label for="voto">numero 2 o 9:</label>
                <input type="number" class="form-control" name="voto" />
                </div>
                </div>
            </div>
            </div>

            <button type="submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">Guardar</button>
        </form>
    </div>
</div>
@endsection
