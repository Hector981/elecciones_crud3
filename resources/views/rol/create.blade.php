@extends('plantilla')
@section('content')
<style>
.uper {
    margin-top: 40px;
}
</style>
<div class="card uper">
    <h5 class="card-header info-color white-text text-center py-4">
        <strong>REGISTRAR ROL</strong>
    </h5>
    <div class="card-body px-lg-5 pt-0">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form class="text-center" style="color: #757575;" method="post" action="{{ route('rol.store') }} " enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        @csrf
                        <input type="text" id="materialRegistrarDescripcion" class="form-control" name="descripcion" >
                        <label for="descripcion">Descripcion Del Rol</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">REGISTRAR</button>
        </form>
    </div>
</div>
@endsection