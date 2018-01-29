<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="container">
    <div class="row">
      <?php if(session('status')): ?>
          <div class="alert alert-success">
              <?php echo e(session('status')); ?>

          </div>
      <?php endif; ?>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <a href="<?php echo e(url('/pacientes')); ?>">
          <div class="widget style1 blue-bg">
            <div class="row">
              <div class="col-xs-4">
                <i class="fa fa-user fa-5x"></i>
              </div>
              <div class="col-xs-8 text-right">
                <h2 class="font-bold">Pacientes</h2>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="<?php echo e(url('/doctores')); ?>">
          <div class="widget style1 blue-bg">
            <div class="row">
              <div class="col-xs-4">
                <i class="fa fa-user-md fa-5x"></i>
              </div>
              <div class="col-xs-8 text-right">
                <h2 class="font-bold">Doctores</h2>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="<?php echo e(url('/grupos')); ?>">
          <div class="widget style1 blue-bg">
            <div class="row">
              <div class="col-xs-4">
                <i class="fa fa-industry fa-5x"></i>
              </div>
              <div class="col-xs-8 text-right">
                <h2 class="font-bold">Grupos</h2>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="<?php echo e(url('/biopsia')); ?>">
          <div class="widget style1 navy-bg">
            <div class="row">
              <div class="col-xs-4">
                <i class="fa fa-medkit fa-5x"></i>
              </div>
              <div class="col-xs-8 text-right">
                <h2 class="font-bold">Biopsias</h2>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="<?php echo e(url('/biopsia/create')); ?>">
          <div class="widget style1 lazur-bg">
            <div class="row">
              <div class="col-xs-4">
                <i class="fa fa-medkit fa-5x"></i>
              </div>
              <div class="col-xs-8 text-right">
                <h2 class="font-bold">Nueva biopsia</h2>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="<?php echo e(url('/biopsia_report.index')); ?>">
          <div class="widget style1 navy-bg">
            <div class="row">
              <div class="col-xs-4">
                <i class="fa fa-medkit fa-5x"></i>
              </div>
              <div class="col-xs-8 text-right">
                <h2 class="font-bold">Reportes de biopsias</h2>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="<?php echo e(url('/citologia')); ?>">
          <div class="widget style1 navy-bg">
            <div class="row">
              <div class="col-xs-4">
                <i class="fa fa-heartbeat fa-5x"></i>
              </div>
              <div class="col-xs-8 text-right">
                <h2 class="font-bold">Citologías</h2>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="<?php echo e(url('/citologia/create')); ?>">
          <div class="widget style1 lazur-bg">
            <div class="row">
              <div class="col-xs-4">
                <i class="fa fa-heartbeat fa-5x"></i>
              </div>
              <div class="col-xs-8 text-right">
                <h2 class="font-bold">Nueva citología</h2>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6">
        <a href="<?php echo e(url('/citologia_report.index')); ?>">
          <div class="widget style1 navy-bg">
            <div class="row">
              <div class="col-xs-4">
                <i class="fa fa-heartbeat fa-5x"></i>
              </div>
              <div class="col-xs-8 text-right">
                <h2 class="font-bold">Reportes de citologías</h2>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>