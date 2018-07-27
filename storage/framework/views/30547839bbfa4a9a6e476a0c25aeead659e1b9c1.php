<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<hr>
<table>
  <tr>
    <td>Informe:</td>
    <td><?php echo e($citologia->informe); ?></td>
    <td>Doctor(a):</td>
    <td><?php echo e($citologia->doctor); ?></td>
  </tr>
  <tr>
    <td>Paciente:</td>
    <td><?php echo e($citologia->paciente); ?></td>
  </tr>
  <tr>
    <td>Sexo:</td>
    <td><?php if($citologia->sexo == '1'): ?>
                        <p>M</p>
                        <?php else: ?>
                        <p>F</p>
                        <?php endif; ?></td>
    <td>Edad:</td>
    <td><?php echo e($citologia->edad); ?></td>
  </tr>
  <tr>
    <td>Diagnostico:</td>
    <td><?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($diagnostico->id == $citologia->diagnostico_id): ?>
                               <option value="<?php echo e($diagnostico->id); ?>" selected> <?php echo e($diagnostico->nombre); ?> </option>
                             <?php else: ?>
                              <option value="<?php echo e($diagnostico->id); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
                             <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
  </tr>
  <tr>
    <td>Recibido:</td>
    <td><?php echo e($citologia->recibido); ?></td>
    <td>Entregado: </td>
    <td><?php echo e($citologia->entregado); ?></td>
  
  </tr>
</table>
<hr>


<p align="center">Informe Citolopatologico</p>

<table>
  <tr>
    <td>Macro:</td>
    <td><?php echo e($macro->detalle); ?></td>
  </tr>
  <tr>
    <td>Micro:</td>
    <td><?php echo e($micro->detalle); ?> </td>
  </tr>
  <tr>
    <td>Diagnostico:</td>
    <td><?php echo e($preliminar->detalle); ?></td>
  </tr>
  <tr>
    <td>Informe Preliminar:</td>
    <td nowrap><?php if($citologia->informe_preliminar == '1'): ?>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="dpreliminar" checked>Si</label>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="dpreliminar">No</label>
                        <?php else: ?>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="dpreliminar">Si</label>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="dpreliminar" checked>No</label>
                        <?php endif; ?></td>
  </tr>
</table>
<hr>


<table>
  <tr>
    <td width="400px">Fin del Informe</td>
  </tr>
</table>
<script type="text/javascript"> 
      this.print(); 
</script> 
</body>

