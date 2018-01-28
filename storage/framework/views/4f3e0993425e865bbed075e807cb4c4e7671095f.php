<?php $__env->startSection('title'); ?> Recuperar contraseña <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="passwordBox animated fadeInDown">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox-content">
                <h2 class="font-bold">Recuperar contraseña</h2>
                <p>
                    Escribe tu correo, se te enviará un correo de reinicio.
                </p>
                  <div class="row">

                    <div class="col-lg-12">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal" method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar enlace
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <hr/>
  <div class="row">
      <div class="col-md-6">
          Laboratorios...
      </div>
      <div class="col-md-6 text-right">
         <small>2018</small>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sessionsLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>