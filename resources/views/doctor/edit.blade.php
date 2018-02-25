@extends ('layouts/app')

@section ('title') {{ $page_title }} @stop

@section('breadcrumb')
  <li><a href="{{ url('/doctores') }}">Ver doctores</a></li>
  <li class="active">
      <strong>{{ $page_title }}</strong>
  </li>
@endsection

@section ('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="ibox-content">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form role="form" method="post" action="{{ url('doctores/'. $doctor->id ) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" class="form-control" name="nombre" value="{{ $doctor->nombre }}">
            </div>
            <div class="form-group">
              <label>Correo</label>
              <input type="email" placeholder="Correo" class="form-control" name="email" value="{{ $doctor->email }}">
            </div>
            <div class="form-group">
              <label>Télefono</label>
              <input type="text" placeholder="Télefono"  class="form-control" data-mask="(999)-9999-9999" name="telefono" value="{{ $doctor->telefono }}">
            </div>
            <div class="form-group">
              <label>Dirección</label>
              <textarea name='direccion' class="form-control">{{ $doctor->direccion }} </textarea>
            </div>
            <div>
                <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
            </div>
        </form>
      </div>
  </div>
</div>
@endsection
