@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper animated fadeInUp">
<h5 class="card-header info-color white-text text-center py-4">
        <strong>MODIFICANDO VOTO {{$voto->id}}</strong>
    </h5>
    <div class="card-body">
        
        <form class="text-center" style="color: #757575;" method="post" action="{{ route('voto.update', $voto->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                @method('PUT')

                
                <div class="form-row">
                <div class="col">
                <label for="eleccion_id">Selecione El Periodo De La Eleccion:</label>
                    <div class="md-form">
                        @csrf
                        <select class="browser-default custom-select mb-4" id="eleccion_id" class="form-group" name="eleccion_id">
                            <option value="" disabled selected>Periodo</option>
                            @foreach($elecciones as $eleccion)
                            <option for="eleccion_id"  class="form-group"  name="eleccion_id"  label="{{$eleccion->periodo}}">{{$eleccion->id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
                
                <div class="form-row">
                <div class="col">
                <label for="casilla_id">Selecione La Casilla:</label>
                    <div class="md-form">
                        @csrf
                        <select class="browser-default custom-select mb-4" id="casilla_id" class="form-group" name="casilla_id">
                            <option value="" disabled selected>Casilla</option>
                            @foreach($casillas as $casilla)
                            <option for="casilla_id"  class="form-group"  name="casilla_id"  label="{{$casilla->ubicacion}}">{{$casilla->id}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
                <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                    <label for="evidencia">Evidencia:</label>
                    <input type="text"
                        value="{{$voto->evidencia}}"
                        class="form-control"
                        name="evidencia" />
                        </div>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0">GUARDAR</button>
        </form>
    </div>
</div>
@endsection