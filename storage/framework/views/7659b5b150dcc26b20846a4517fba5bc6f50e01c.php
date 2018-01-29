<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element"> <span>
            <img alt="image" class="img-circle" src="<?php echo e(asset('img/astartelogo.png')); ?>" style="width:  64px; height:  auto;">
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

        <li class="<?php echo e(isActiveRoute('main')); ?>">
            <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Pacientes</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="<?php echo e(isActiveRoute('pacientes.index')); ?>">
                <a href="<?php echo e(url('/pacientes')); ?>">Ver pacientes</a>
            </li>
            <li class="<?php echo e(isActiveRoute('pacientes.create')); ?>">
                <a href="<?php echo e(url('/pacientes/create')); ?>">Nuevo paciente</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-user-md"></i> <span class="nav-label">Doctores</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="<?php echo e(isActiveRoute('doctores')); ?>">
                <a href="<?php echo e(url('/doctores')); ?>">Ver doctores</a>
            </li>
            <li class="<?php echo e(isActiveRoute('doctores.create')); ?>">
                <a href="<?php echo e(url('/doctores/create')); ?>">Nuevo doctor</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-medkit"></i> <span class="nav-label">Biopsias</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="<?php echo e(isActiveRoute('biopsias')); ?>">
                <a href="<?php echo e(url('/biopsia')); ?>">Ver biopsias</a>
            </li>
            <li class="<?php echo e(isActiveRoute('biopsia_add')); ?>">
                <a href="<?php echo e(url('/biopsia/create')); ?>">Solicitud biopsia</a>
            </li>
            <li class="<?php echo e(isActiveRoute('biopsia_report')); ?>">
                <a href="<?php echo e(url('/biopsia-report')); ?>">Reportes biopsia</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-heartbeat"></i> <span class="nav-label">Citologias</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="<?php echo e(isActiveRoute('citologias')); ?>">
                <a href="<?php echo e(url('/citologia')); ?>">Ver citologías</a>
            </li>
            <li class="<?php echo e(isActiveRoute('citologia_add')); ?>">
                <a href="<?php echo e(url('/citologia/create')); ?>">Solicitud citología</a>
            </li>
            <li class="<?php echo e(isActiveRoute('citologia_report')); ?>">
                <a href="<?php echo e(url('/citologia-report')); ?>">Reportes citología</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-industry"></i> <span class="nav-label">Grupos</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="<?php echo e(isActiveRoute('grupos')); ?>">
                <a href="<?php echo e(url('/grupos')); ?>">Ver grupos</a>
            </li>
            <li class="<?php echo e(isActiveRoute('grupos.create')); ?>">
                <a href="<?php echo e(url('/grupos/create')); ?>">Nuevo grupo</a>
            </li>
            <li class="<?php echo e(isActiveRoute('grupo_biopsia')); ?>">
                <a href="<?php echo e(url('/grupo-biopsia')); ?>">Biopsias de grupos</a>
            </li>
            <li class="<?php echo e(isActiveRoute('grupo_citologia')); ?>">
                <a href="<?php echo e(url('/grupo-citologia')); ?>">Citologías de grupos</a>
            </li>
          </ul>
        </li>
        <?php if( Auth::user()->rol == 'A'): ?>
          <li>
            <a href="#"><i class="fa fa-cog"></i> <span class="nav-label">Ajustes</span> </a>
            <ul class="nav nav-second-level collapse">
              <li class="<?php echo e(isActiveRoute('usuarios')); ?>">
                  <a href="<?php echo e(url('/usuario')); ?>">Ver usuarios</a>
              </li>
              <li class="<?php echo e(isActiveRoute('usuario_add')); ?>">
                  <a href="<?php echo e(url('/usuario/create')); ?>">Nuevo usuarios</a>
              </li>
              <li class="<?php echo e(isActiveRoute('diagnosticos')); ?>">
                  <a href="<?php echo e(url('/diagnosticos')); ?>">lista de diagnósticos</a>
              </li>
              <li class="<?php echo e(isActiveRoute('diagnosticos.create')); ?>">
                  <a href="<?php echo e(url('/diagnosticos.create')); ?>">Nuevo diagnóstico</a>
              </li>
              <li class="<?php echo e(isActiveRoute('frases')); ?>">
                  <a href="<?php echo e(url('/frases')); ?>">lista de frases</a>
              </li>
              <li class="<?php echo e(isActiveRoute('frases.create')); ?>">
                  <a href="<?php echo e(url('/frases/create')); ?>">Nueva frase</a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
</nav>
