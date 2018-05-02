<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
          <li><a href="#"><i class="fa fa-user"></i><?php echo e(Auth::user()->nombre . ' ' . Auth::user()->apellido); ?></a></li>
          <li>
              <a href="#" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out"></i> Cerrar sesión
              </a>
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                  <?php echo e(csrf_field()); ?>

              </form>
          </li>
        </ul>
    </nav>
</div>
