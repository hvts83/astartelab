<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h2>Control Diario</h2>
    <?php if( isset($cpagos)): ?>
    
    <div class="row">
        <div class="ibox-content">
            <div class="table-responsive">
            <table id="tblcpago" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Fecha pago</th>
                    <th>Informe</th>
                    <th>Tipo</th>
                    <th>Estado de pago</th>
                    <th>Facturación</th>
                    <th>Monto</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $cpagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cpago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($cpago->created_at); ?></td>
                        <td><?php echo e($cpago->informe); ?></td>
                        <td><?php echo e($cpago->tipo === 'B' ? 'Biopsia' : 'Citolog&iacute;a'); ?></td>
                        <td>
                            <?php $__currentLoopData = $pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $espa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($espa['value'] == $cpago->estado_pago): ?>
                                  <?php echo e($espa['text']); ?>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                            <?php $__currentLoopData = $facturacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($factu['value'] == $cpago->facturacion): ?>
                                  <?php echo e($factu['text']); ?>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>$<?php echo e($cpago->monto); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                </tbody>
            </table>
           
            </div>
        </div>
    </div>
    <?php endif; ?>
    
</div>
</body>
</html>    
    
    
    
    
