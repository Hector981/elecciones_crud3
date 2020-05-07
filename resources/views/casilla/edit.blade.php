@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}

</style>
<div class="card uper">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
    <br/>
    @endif
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>MODIFICANDO CASILLA {{$casilla->id}}</strong>
    </h5>
    <div class="card-body px-lg-5 pt-0">
        <form class="text-center" style="color: #757575;" method="post" action="{{ route('casilla.update', $casilla->id) }}"  enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                        <input type="text" id="materialRegistrarUbicacion" class="form-control" name="ubicacion" value="{{$casilla->ubicacion}}">
                        <label for="ubicacion">Ubicacion</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">REGISTRAR</button>
        </form>
    </div>
</div>
@endsection
