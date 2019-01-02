<?php $__env->startSection('title'); ?> <?php echo e($page_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
  <li><a href="<?php echo e(url('/biopsia')); ?>">Ver biopsias</a></li>
  <li class="active">
      <strong><?php echo e($page_title); ?></strong>
  </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="wrapper wrapper-content animated fadeInRight">
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
        <form role="form" method="post" action="<?php echo e(url('/biopsia')); ?>">
        <?php echo e(csrf_field()); ?>

        <hr>
        <h2>Datos de Consulta</h2>
        <hr>
        <div class="form-group col-md-6" id="fecha_nacimiento">
          <label class="font-normal">Recibido</label>
          <div class="input-group date">
            <span class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </span>
            <input type="text" name="recibido" class="form-control" value="<?php echo e(DATE("d-m-Y")); ?>">
          </div>
      </div>
      <div class="form-group col-md-6" id="fecha_nacimiento">
          <label class="font-normal">Entregado</label>
          <div class="input-group date">
            <span class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </span>
            <input type="text" name="entregado" class="form-control" value="<?php echo e(DATE("d-m-Y")); ?>">
          </div>
      </div>
      <div class="form-group col-md-12">
        <label class="control-label">Doctor</label>
        <select class="chosen-select"  name="doctor_id">
          <option disabled selected>Seleccione doctor</option>
          <?php $__currentLoopData = $doctores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($doctor->id); ?>"> <?php echo e($doctor->nombre); ?> </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label class="control-label">Grupo</label>
        <select class="chosen-select"  name="grupo_id">
          <option disabled selected>Seleccione grupo</option>
          <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($grupo->id); ?>"> <?php echo e($grupo->nombre); ?> </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label class="control-label">Paciente</label>
        <select class="chosen-select"  name="paciente_id">
          <option disabled selected>Seleccione paciente</option>
          <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($paciente->id); ?>"> <?php echo e($paciente->name); ?> </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="col-md-12">
          <div class="form-group">
            <label class="control-label">Diagnóstico</label>
            <select class="chosen-select form-control" data-placeholder="Seleccione diagnóstico" id="select_diagnostico_id">
              <?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($diagnostico->nombre); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <button type="button" id="add_diagnostico_id" class="btn btn-primary">Agregar</button>
          <div class="form-group">
              <textarea class="form-control" rows="5" id="diagnostico_id" name="diagnostico"></textarea>
          </div>
      </div>
      <hr>
      <h2>Reporte Macro</h2>
      <hr>
      <div class="form-group">
        <label class="control-label">Frases</label>
        <select class="chosen-select form-control" data-placeholder="Seleccione Frase" id="select_macro">
            <?php $__currentLoopData = $frases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($frase->tipo == "B" ): ?>
                <option value="<?php echo e($frase->nombre); ?>"> <?php echo e($frase->nombre); ?> </option>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <button type="button" id="add_macro" class="btn btn-primary">Agregar</button>
      <div class="form-group">
          <textarea class="form-control" rows="5" id="macro" name="macro"></textarea>
      </div>
      <hr>
      <h2>Reporte Micro</h2>
      <hr>
      <div class="form-group">
        <label class="control-label">Frases</label>
        <select class="chosen-select form-control" data-placeholder="Seleccione Frase" id="select_micro">
            <?php $__currentLoopData = $frases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($frase->tipo == "M"): ?>
                <option value="<?php echo e($frase->nombre); ?>"> <?php echo e($frase->nombre); ?> </option>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <button type="button" id="add_micro" class="btn btn-primary">Agregar</button>
      <div class="form-group">
          <textarea class="form-control" rows="5" id="micro" name="micro"></textarea>
      </div>
      <hr>
      <h2>Diagnostico Lab</h2>
      <hr>
      <div class="form-group">
        <label class="control-label">Diagnóstico Lab</label>
        <select class="chosen-select" data-placeholder="Seleccione Diagnostico" id="select_dxlab">
            <?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($diagnostico->nombre); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <button type="button" id="add_dxlab" class="btn btn-primary">Agregar</button>
      <div class="form-group">
        <textarea class="form-control" rows="5" id="dxlab" name="dxlab"></textarea>
      </div>
      <hr>
      <h2>Informe Preliminar</h2>
      <hr>
      <div class="form-group">
        <label class="control-label">Diagnóstico</label>
        <select class="chosen-select" data-placeholder="Seleccione frases" id="select_inmuno">
            <?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($diagnostico->nombre); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <button type="button" id="add_inmuno" class="btn btn-primary">Agregar</button>
      <div class="form-group">
            <textarea class="form-control" rows="5" id="inmuno" name="inmuno"></textarea>
      </div>
      <div class="div-btn">
        <button class="btn btn-primary m-t-n-xs pull-right" type="submit"><strong>Guardar</strong></button>
        <a href="<?php echo e(url('biopsias/')); ?>" class="btn m-t-n-xs pull-right"><strong>Cancelar</strong></a>
    </div>
    </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(asset('css/chosen/bootstrap-chosen.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/iCheck/custom.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/datepicker/datepicker3.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script src="<?php echo e(asset('js/chosen/chosen.jquery.js')); ?>"></script>
  <script src="<?php echo e(asset('js/datepicker/bootstrap-datepicker.js')); ?>"></script>
  <script src="<?php echo e(asset('js/iCheck/icheck.min.js')); ?>"></script>
  <script>
      $(document).ready(function () {
          $('.i-checks').iCheck({
              radioClass: 'iradio_square-green',
          });
      });

    $('#fecha_nacimiento .input-group.date').datepicker({
        startView: 1,
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true,
        format: "dd-mm-yyyy"
    });
    $('.chosen-select').chosen({
      width: "100%",
      no_results_text: "No se encontró resultados"
    });
  </script>
  <script>
    $('#add_diagnostico_id').on('click', function(){
      $('#diagnostico_id').append( $('#select_diagnostico_id').val() );   
    });
     $('#add_macro').on('click', function(){
      $('#macro').append( $('#select_macro').val() );   
    });
    $('#add_micro').on('click', function(){
      $('#micro').append( $('#select_micro').val() );   
    });
    $('#add_dxlab').on('click', function(){
      $('#dxlab').append( $('#select_dxlab').val() );   
    });    
    $('#add_preliminar').on('click', function(){
      $('#preliminar').append( $('#select_preliminar').val() );   
    });
    $('#add_inmuno').on('click', function(){
      $('#inmuno').append( $('#select_inmuno').val() );   
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>