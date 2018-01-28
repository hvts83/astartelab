<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element">
            <span>
              <img alt="image" class="img-circle" src="https://picsum.photos/60/60/?random" />
              <strong class="font-bold">{{ Auth::user()->name }}</strong>
            </span>
          </div>
            <div class="logo-element">
                L
            </div>
        </li>

        <li class="{{ isActiveRoute('main') }}">
            <a href="{{ url('/') }}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Pacientes</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="{{ isActiveRoute('pacientes') }}">
                <a href="{{ url('/pacientes') }}">ver pacientes</a>
            </li>
            <li class="{{ isActiveRoute('paciente_add') }}">
                <a href="{{ url('/pacientes/create') }}">Nuevo paciente</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-user-md"></i> <span class="nav-label">Doctores</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="{{ isActiveRoute('doctores') }}">
                <a href="{{ url('/doctor') }}">ver doctores</a>
            </li>
            <li class="{{ isActiveRoute('doctor_add') }}">
                <a href="{{ url('/doctor/create') }}">Nuevo doctor</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-medkit"></i> <span class="nav-label">Biopsias</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="{{ isActiveRoute('biopsias') }}">
                <a href="{{ url('/biopsia') }}">ver biopsias</a>
            </li>
            <li class="{{ isActiveRoute('biopsia_add') }}">
                <a href="{{ url('/biopsia/create') }}">Solicitud biopsia</a>
            </li>
            <li class="{{ isActiveRoute('biopsia_report') }}">
                <a href="{{ url('/biopsia-report') }}">Reportes biopsia</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-heartbeat"></i> <span class="nav-label">Citologias</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="{{ isActiveRoute('citologias') }}">
                <a href="{{ url('/citologia') }}">ver citologias</a>
            </li>
            <li class="{{ isActiveRoute('citologia_add') }}">
                <a href="{{ url('/citologia/create') }}">Solicitud citologia</a>
            </li>
            <li class="{{ isActiveRoute('citologia_report') }}">
                <a href="{{ url('/citologia-report') }}">Reportes citologia</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-industry"></i> <span class="nav-label">Grupos</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="{{ isActiveRoute('grupo') }}">
                <a href="{{ url('/grupo') }}">ver grupos</a>
            </li>
            <li class="{{ isActiveRoute('grupo_add') }}">
                <a href="{{ url('/grupo/create') }}">Nuevo grupo</a>
            </li>
            <li class="{{ isActiveRoute('grupo_biopsia') }}">
                <a href="{{ url('/grupo-biopsia') }}">Biopsias de grupos</a>
            </li>
            <li class="{{ isActiveRoute('grupo_citologia') }}">
                <a href="{{ url('/grupo-citologia') }}">Citologias de grupos</a>
            </li>
          </ul>
        </li>
        @if ( Auth::user()->rol == 'A')
          <li>
            <a href="#"><i class="fa fa-cog"></i> <span class="nav-label">Ajustes</span> </a>
            <ul class="nav nav-second-level collapse">
              <li class="{{ isActiveRoute('usuarios') }}">
                  <a href="{{ url('/usuario') }}">Ver usuarios</a>
              </li>
              <li class="{{ isActiveRoute('usuario_add') }}">
                  <a href="{{ url('/usuario/create') }}">Nuevo usuarios</a>
              </li>
              <li class="{{ isActiveRoute('diagnostico') }}">
                  <a href="{{ url('/diagnostico') }}">lista de diagnosticos</a>
              </li>
              <li class="{{ isActiveRoute('diagnostico_add') }}">
                  <a href="{{ url('/diagnostico/create') }}">Nuevo diagnostico</a>
              </li>
              <li class="{{ isActiveRoute('frase') }}">
                  <a href="{{ url('/frase') }}">lista de frases</a>
              </li>
              <li class="{{ isActiveRoute('frase_add') }}">
                  <a href="{{ url('/frase/create') }}">Nueva frase</a>
              </li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
</nav>
