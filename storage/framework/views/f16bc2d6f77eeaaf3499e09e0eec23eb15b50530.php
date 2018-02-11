<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li><a href="<?php echo e(url('/cuentas')); ?>">Ver cuentas</a></li>
  <li><a href="<?php echo e(url('/cuentas/' . $cuenta->id . '/edit')); ?>"> <?php echo e($cuenta->nombre); ?></a></li>
  <li class="active">
      <strong><?php echo e($page_title); ?></strong>
  </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="ibox-content">
          <h5>Fondos de <?php echo e($cuenta->nombre); ?></h5>
          <h1 class="no-margins">$ <?php echo e($cuenta->fondo); ?></h1>
          <small>Saldo actual</small>
      </div>
    </div>
    <?php if($transacciones->isEmpty() == false  ): ?>
      <div class="row">
        <div class="table-responsive">
          <table id="tblcuenta" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Cheque</th>
                <th>Concepto</th>
                <th>Ingreso</th>
                <th>Egreso</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $transacciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($trans->created_at); ?></td>
                  <td><?php echo e($trans->cheque); ?></td>
                  <td><?php echo e($trans->concepto); ?> </td>
                  <td>
                    <?php if($trans->tipo == "I"): ?>
                      $ <?php echo e($trans->monto); ?>

                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if($trans->tipo == "E"): ?>
                       -$(<?php echo e($trans->monto); ?>)
                    <?php else: ?>
                      -
                    <?php endif; ?>
                  </td>
                  <td><?php echo e($trans->actual); ?></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif; ?>
    <div class="row">
    <div class="ibox-content">

      <?php if($errors->any()): ?>
          <div class="alert alert-danger">
              <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      <?php endif; ?>
      <form role="form" method="post" action="<?php echo e(url('/cuenta-account/'. $cuenta->id )); ?>">
          <legend>Cheque</legend>
           <?php echo e(csrf_field()); ?>

           <div class="row">
             <div class="form-group col-md-4">
               <label>Número</label>
               <input type="number" class="form-control" name="numero">
             </div>
             <div class="form-group col-md-4" id="fecha_realizacion">
               <label class="font-normal">Fecha realización</label>
               <div class="input-group date">
                 <span class="input-group-addon">
                   <i class="fa fa-calendar"></i>
                 </span>
                 <input type="text" name="fecha_realizacion" class="form-control" value="01-01-2018">
               </div>
             </div>
             <div class="form-group col-md-4">
               <label>Lugar</label>
               <input type="text" placeholder="Lugar" class="form-control" name="lugar">
             </div>
             <div class="form-group col-md-12">
               <label>Concepto</label>
               <input type="text" placeholder="concepto" class="form-control" name="concepto">
             </div>
             <div class="form-group col-md-6">
               <label>Monto</label>
               <div class="input-group m-b">
                 <span class="input-group-addon">$</span>
                 <input type="number" placeholder="$" class="form-control" name="monto" step="0.01" min="0.01">
               </div>
             </div>
             <div class="form-group col-md-6">
               <label class="control-label">Tipo</label>
               <br>
               <label class="checkbox-inline i-checks"> <input type="radio" value="E" name="tipo">Egreso</label>
               <label class="checkbox-inline i-checks"> <input type="radio" value="I" name="tipo">Ingreso</label>
             </div>
             <div class="form-group col-md-12">
               <label>Paguese a</label>
               <input type="text" placeholder="Paguese a" class="form-control" name="paguese">
             </div>
             <div class="col-md-12">
               <button class="btn btn-primary m-t-n-xs" type="submit"><strong>Guardar</strong></button>
             </div>

           </div>
      </form>
    </div>
  </div>
  </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" href="<?php echo e(asset('css/dataTables/datatables.min.css')); ?>">
  <link href="<?php echo e(asset('css/iCheck/custom.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/datepicker/datepicker3.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script src="<?php echo e(asset('js/dataTables/datatables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/datepicker/bootstrap-datepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('js/iCheck/icheck.min.js')); ?>"></script>
	<script>
    //Datatable
    var tabla = $('#tblcuenta').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    $(document).ready(function () {
      $('.i-checks').iCheck({
        radioClass: 'iradio_square-green',
      });
    });

    $('#fecha_realizacion .input-group.date').datepicker({
      startView: 1,
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true,
      format: "dd-mm-yyyy"
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>