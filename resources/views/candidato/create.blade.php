@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 60px;
}
</style>
<div class="card uper">
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>REGISTRAR CANDIDATO</strong>
    </h5>
    <div class="card-body px-lg-5 pt-0">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
        @endif
        <br>
        <form class="text-center" style="color: #757575;" method="post" action="{{ route('candidato.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="md-form mt-3">
                @csrf
                <input type="text" id="materialRegistrarNombre" class="form-control" name="nombrecompleto">
                <label for="nombreCompleto">Nombre Completo</label>
            </div>
            <span for="sexo">Selecione El Sexo Del Cantidadato</span>
            <select class="mdb-select"  id="sexo" class="form-group" name="sexo">
                @csrf
                <option value="" disabled selected> Selecionar</option>
                <option value="M" for="sexo" class="form-group" name="sexo">(M) Masculino</option>
                <option value="F" for="sexo" class="form-group" name="sexo">(F) Femenino</option>
            </select>
            <br><br>
            <div class="form-row">
                <div class="col">
                @csrf
                <span for="foto">Fotografia:</span>
                    <div class="fileuploadwrapper">
                        <input type="file" class="file-upload" id="foto" name="foto"/>
                    </div>
                </div>
                <div class="col">
                @csrf
                <span for="perfil">PDF Sobre Candidato</span>
                    <div class="fileuploadwrapper">
                        <input type="file" class="file-upload" id="perfil" name="perfil"/>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">REGISTRAR</button>
        </form>
    </div>
</div>
@endsection