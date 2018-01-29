<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element"> <span>
            <img alt="image" class="img-circle" src="{{ asset('img/astartelogo.png') }}" style="width:  64px; height:  auto;">
           </span>
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear">
              <span class="block m-t-xs">
                <strong class="font-bold">Astarté</strong>
              </span>
              <span class="text-muted text-xs block">
                Laboratorio de Patología
              </span>
            </span>
          </a>
          </div>
            <div class="logo-element">
                ALP
            </div>
        </li>

        <li class="{{ isActiveRoute('main') }}">
            <a href="{{ url('/') }}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
        </li>
        <li
          class="
            {{ isActiveRoute('pacientes.index') }}
            {{ isActiveRoute('pacientes.create') }}
          ">
          <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Pacientes</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="{{ isActiveRoute('pacientes.index') }}">
                <a href="{{ url('/pacientes') }}">Ver pacientes</a>
            </li>
            <li class="{{ isActiveRoute('pacientes.create') }}">
                <a href="{{ url('/pacientes/create') }}">Nuevo paciente</a>
            </li>
          </ul>
        </li>
        <li class="
          {{ isActiveRoute('doctores.index') }}
          {{ isActiveRoute('doctores.create') }}
        ">
          <a href="#"><i class="fa fa-user-md"></i> <span class="nav-label">Doctores</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="{{ isActiveRoute('doctores.index') }}">
                <a href="{{ url('/doctores') }}">Ver doctores</a>
            </li>
            <li class="{{ isActiveRoute('doctores.create') }}">
                <a href="{{ url('/doctores/create') }}">Nuevo doctor</a>
            </li>
          </ul>
        </li>
        <li class="
          {{ isActiveRoute('biopsia.index') }}
          {{ isActiveRoute('biopsia.create') }}
          {{ isActiveRoute('biopsia_report.index') }}
        ">
          <a href="#"><i class="fa fa-medkit"></i> <span class="nav-label">Biopsias</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="{{ isActiveRoute('biopsia.index') }}">
                <a href="{{ url('/biopsia') }}">Ver biopsias</a>
            </li>
            <li class="{{ isActiveRoute('biopsia.create') }}">
                <a href="{{ url('/biopsia/create') }}">Solicitud biopsia</a>
            </li>
            <li class="{{ isActiveRoute('biopsia_report.index') }}">
                <a href="{{ url('/biopsia-report') }}">Reportes biopsia</a>
            </li>
          </ul>
        </li>
        <li class="
          {{ isActiveRoute('citologia.index') }}
          {{ isActiveRoute('citologia.create') }}
          {{ isActiveRoute('citologia_report.index') }}
        ">
          <a href="#"><i class="fa fa-heartbeat"></i> <span class="nav-label">Citologias</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="{{ isActiveRoute('citologia.index') }}">
                <a href="{{ url('/citologia') }}">Ver citologías</a>
            </li>
            <li class="{{ isActiveRoute('citologia.create') }}">
                <a href="{{ url('/citologia/create') }}">Solicitud citología</a>
            </li>
            <li class="{{ isActiveRoute('citologia_report.index') }}">
                <a href="{{ url('/citologia-report') }}">Reportes citología</a>
            </li>
          </ul>
        </li>
        <li class="
          {{ isActiveRoute('grupos.index') }}
          {{ isActiveRoute('grupos.create') }}
          {{ isActiveRoute('grupo_biopsia.index') }}
          {{ isActiveRoute('grupo_citologia.index') }}
        ">
          <a href="#"><i class="fa fa-industry"></i> <span class="nav-label">Grupos</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="{{ isActiveRoute('grupos') }}">
                <a href="{{ url('/grupos') }}">Ver grupos</a>
            </li>
            <li class="{{ isActiveRoute('grupos.create') }}">
                <a href="{{ url('/grupos/create') }}">Nuevo grupo</a>
            </li>
            <li class="{{ isActiveRoute('grupo_biopsia') }}">
                <a href="{{ url('/grupo-biopsia') }}">Biopsias de grupos</a>
            </li>
            <li class="{{ isActiveRoute('grupo_citologia') }}">
                <a href="{{ url('/grupo-citologia') }}">Citologías de grupos</a>
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
              <li class="{{ isActiveRoute('diagnosticos') }}">
                  <a href="{{ url('/diagnosticos') }}">lista de diagnósticos</a>
              </li>
              <li class="{{ isActiveRoute('diagnosticos.create') }}">
                  <a href="{{ url('/diagnosticos/create') }}">Nuevo diagnóstico</a>
              </li>
              <li class="{{ isActiveRoute('frases') }}">
                  <a href="{{ url('/frases') }}">lista de frases</a>
              </li>
              <li class="{{ isActiveRoute('frases.create') }}">
                  <a href="{{ url('/frases/create') }}">Nueva frase</a>
              </li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
</nav>
