<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element">
            <span>
              <img alt="image" class="img-circle" src="https://picsum.photos/60/60/?random" />
              <strong class="font-bold"><?php echo e(Auth::user()->name); ?></strong>
            </span>
          </div>
            <div class="logo-element">
                L
            </div>
        </li>

        <li class="<?php echo e(isActiveRoute('main')); ?>">
            <a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Pacientes</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="<?php echo e(isActiveRoute('pacientes')); ?>">
                <a href="<?php echo e(url('/pacientes')); ?>">ver pacientes</a>
            </li>
            <li class="<?php echo e(isActiveRoute('paciente_add')); ?>">
                <a href="<?php echo e(url('/pacientes/create')); ?>">Nuevo paciente</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-user-md"></i> <span class="nav-label">Doctores</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="<?php echo e(isActiveRoute('doctores')); ?>">
                <a href="<?php echo e(url('/doctor')); ?>">ver doctores</a>
            </li>
            <li class="<?php echo e(isActiveRoute('doctor_add')); ?>">
                <a href="<?php echo e(url('/doctor/create')); ?>">Nuevo doctor</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-medkit"></i> <span class="nav-label">Biopsias</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="<?php echo e(isActiveRoute('biopsias')); ?>">
                <a href="<?php echo e(url('/biopsia')); ?>">ver biopsias</a>
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
                <a href="<?php echo e(url('/citologia')); ?>">ver citologias</a>
            </li>
            <li class="<?php echo e(isActiveRoute('citologia_add')); ?>">
                <a href="<?php echo e(url('/citologia/create')); ?>">Solicitud citologia</a>
            </li>
            <li class="<?php echo e(isActiveRoute('citologia_report')); ?>">
                <a href="<?php echo e(url('/citologia-report')); ?>">Reportes citologia</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-industry"></i> <span class="nav-label">Grupos</span> </a>
          <ul class="nav nav-second-level collapse">
            <li class="<?php echo e(isActiveRoute('grupo')); ?>">
                <a href="<?php echo e(url('/grupo')); ?>">ver grupos</a>
            </li>
            <li class="<?php echo e(isActiveRoute('grupo_add')); ?>">
                <a href="<?php echo e(url('/grupo/create')); ?>">Nuevo grupo</a>
            </li>
            <li class="<?php echo e(isActiveRoute('grupo_biopsia')); ?>">
                <a href="<?php echo e(url('/grupo-biopsia')); ?>">Biopsias de grupos</a>
            </li>
            <li class="<?php echo e(isActiveRoute('grupo_citologia')); ?>">
                <a href="<?php echo e(url('/grupo-citologia')); ?>">Citologias de grupos</a>
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
              <li class="<?php echo e(isActiveRoute('diagnostico')); ?>">
                  <a href="<?php echo e(url('/diagnostico')); ?>">lista de diagnosticos</a>
              </li>
              <li class="<?php echo e(isActiveRoute('diagnostico_add')); ?>">
                  <a href="<?php echo e(url('/diagnostico/create')); ?>">Nuevo diagnostico</a>
              </li>
              <li class="<?php echo e(isActiveRoute('frase')); ?>">
                  <a href="<?php echo e(url('/frase')); ?>">lista de frases</a>
              </li>
              <li class="<?php echo e(isActiveRoute('frase_add')); ?>">
                  <a href="<?php echo e(url('/frase/create')); ?>">Nueva frase</a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
</nav>
