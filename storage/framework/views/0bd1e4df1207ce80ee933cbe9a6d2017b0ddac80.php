<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<table align="center" width="80%">
  <tr>
    <td  width="100px"><img src="<?php echo e(asset('img/astartelogobn.jpg')); ?>" height="100px" width="100px"/></td>
    <td nowrrap><h3 align="center">ASTARTE LABORATORIO DE PATOLOGIA</h3>
        <p align="center">23 Calle Poniente #1249, Colonia Layco, San Salvador<br>
         Telefax: 2226-9229 E-mail: astartelaboratorio@gmail.com</p>
    </td>
  </tr>
</table>

<hr>
<table>
  <tr>
    <td>Informe:</td>
    <td><?php echo e($biopsia->informe); ?></td>
    <td>Doctor(a):</td>
    <td><?php echo e($biopsia->doctor); ?></td>
  </tr>
  <tr>
    <td>Paciente:</td>
    <td><?php echo e($biopsia->paciente); ?></td>
  </tr>
  <tr>
    <td>Sexo:</td>
    <td><?php if($biopsia->sexo == '1'): ?>
                        <p>M</p>
                        <?php else: ?>
                        <p>F</p>
                        <?php endif; ?></td>
    <td>Edad:</td>
    <td><?php echo e($biopsia->edad); ?> a&ntilde;os <?php echo e($biopsia->meses); ?> meses</td>
  </tr>
  <tr>
    <td>Diagnostico:</td>
    <td><?php $__currentLoopData = $diagnosticos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnostico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($diagnostico->id == $biopsia->diagnostico_id): ?>
                               <option value="<?php echo e($diagnostico->id); ?>" selected> <?php echo e($diagnostico->nombre); ?> </option>
                             <?php else: ?>
                              <option value="<?php echo e($diagnostico->id); ?>"> <?php echo e($diagnostico->nombre); ?> </option>
                             <?php endif; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
  </tr>
  <tr>
    <td>Recibido:</td>
    <td><?php echo e($biopsia->recibido); ?></td>
    <td>Entregado: </td>
    <td><?php echo e($biopsia->entregado); ?></td>
  
  </tr>
</table>
<hr>

<p align="center">Informe Histopatologico</p>

<table>
  <tr>
    <td>Macro</td>
    <td><?php echo e($macro->detalle); ?></td>
  </tr>
  <tr>
    <td>Micro</td>
    <td><?php echo e($micro->detalle); ?></td>
  </tr>
  <tr>
    <td>Diagnostico</td>
    <td><?php echo e($preliminar->detalle); ?></td>
  </tr>
  <tr>
    <td>Informe Preliminar:</td>
    <td><?php if($biopsia->informe_preliminar == '1'): ?>
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
    <td><p align="center">DR. SALVADOR LOPEZ HERNANDEZ <br>MEDICO PATOLOGO </p></td>
  </tr>
</table>
</body>
</html>