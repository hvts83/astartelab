<?php $__env->startSection('titulo'); ?>
  Resultado de biopsia <?php echo e($biopsia->informe); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
  <tr>
    <td class="wrapper">
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <p>Hola <?php echo e($biopsia->nombrePaciente); ?> </p>
            <p>Los datos de su biopsia son los siguientes:</p>
            <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
              <tbody>
                <tr>
                  <td><strong>Doctor :</strong> <?php echo e($biopsia->nombreDoctor); ?></td>
                  <td><strong>Diagnóstico :</strong> <?php echo e($biopsia->diagnostico); ?></td>
                </tr>
                <tr>
                  <td align="right">
                    <table border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td> <a href="http://htmlemail.io" target="_blank">Descargar PDF</a> </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('mails/layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>