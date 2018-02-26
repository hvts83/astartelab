@extends('layouts.sessionsLayout')

@section ('title') Login @stop

@section('content')

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
          <img alt="image" class="img-circle" src="{{ asset('img/astartelogo.png') }}" style="width:  200px; height: auto;">
          </div>
          <h3>Astarté</h3>
          <p>Inicie sesión con sus credenciales.</p>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
              <input type="text" class="form-control" placeholder="usuario" name="usuario" value="{{ old('usuario') }}" required autofocus>
              @if ($errors->has('usuario'))
                  <span class="help-block">
                      <strong>{{ $errors->first('usuario') }}</strong>
                  </span>
              @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>

          <div class="form-group">
              <div class="col-md-12">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuerdame
                      </label>
                  </div>
              </div>
          </div>

          <div class="form-group">
              <div class="col-md-12">
                  <button type="submit" class="btn btn-block btn-flat btn-primary">
                      Iniciar sesión
                  </button>
              </div>
          </div>
      </form>
      <p class="m-t"> <small>Astarté Laboratorio de Patologías</small> </p>
    </div>
    </div>
@endsection
