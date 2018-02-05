<?php $__env->startSection('title'); ?> Login <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
          <img alt="image" class="img-circle" src="<?php echo e(asset('img/astartelogo.png')); ?>" style="width:  200px; height: auto;">
          </div>
          <h3>Astarté</h3>
          <p>Inicie sesión con sus credenciales.</p>
        <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
          <?php echo e(csrf_field()); ?>


          <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <input type="email" class="form-control" placeholder="Correo" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
              <?php if($errors->has('email')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('email')); ?></strong>
                  </span>
              <?php endif; ?>
          </div>
          <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
              <?php if($errors->has('password')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('password')); ?></strong>
                  </span>
              <?php endif; ?>
          </div>

          <div class="form-group">
              <div class="col-md-12">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Recuerdame
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
      <p class="m-t"> <small>Astarté laboratorio de patologías</small> </p>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sessionsLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>