<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body{font-size:14px; margin:0px; font-family: Calibri,Candara,Segoe,Segoe UI,Optima, Arial,sans-serif;}
    h3{ margin:0px; font-family: Calibri,Candara,Segoe,Segoe UI,Optima, Arial,sans-serif;}
    h5{ margin:0px; font-family: Calibri,Candara,Segoe,Segoe UI,Optima, Arial,sans-serif;}
    p{ margin:0px; font-family: Calibri,Candara,Segoe,Segoe UI,Optima, Arial,sans-serif;}
    tr.spaceUnder>td {padding-bottom: 1em;}
  </style>
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
      <td><?php echo e($biopsia->informe); ?></td>
      <td>Doctor(a): <?php echo e($biopsia->doctor); ?></td>
    </tr>
    <tr>
      <td>Paciente:</td>
      <td><?php echo e($biopsia->paciente); ?></td>
    </tr>
    <tr>
        <td>Sexo:</td>
        <td>
          <?php if($biopsia->sexo == '1'): ?>
            <p>M</p>
          <?php else: ?>
            <p>F</p>
          <?php endif; ?>
        </td>
        <td>Edad: <?php echo e($biopsia->edad); ?> a&ntilde;os <?php echo e($biopsia->meses); ?> meses</td>
      </tr>
      <tr>
        <td valign="top">Diagnostico:</td>
        <td colspan="3"><?php echo nl2br(e($biopsia->diagnostico)); ?></td>
      </tr>
      <tr>
        <td>Recibido:</td>
        <td><?php echo e($biopsia->recibido); ?></td>
        <td>Entregado: <?php echo e($biopsia->entregado); ?> </td>
      </tr>
    </table>
    <hr>

    <p align="center"><strong><u>Informe Histopatologico</u></strong></p>
    <p>&nbsp;</p>

  <table>
      <tr class="spaceUnder">
        <td valign="top"><strong>Macro</strong></td>
        <td><?php echo nl2br(e($biopsia->macro)); ?></td>
      </tr>
      <tr class="spaceUnder">
        <td valign="top"><strong>Micro</strong></td>
        <td><?php echo nl2br(e($biopsia->micro )); ?></td>
      </tr>
      <tr class="spaceUnder">
        <td valign="top"><strong>Diagnostico</strong></td>
        <td><?php echo nl2br(e($biopsia->dxlab )); ?></td>
      </tr>
      <tr class="spaceUnder">
        <td valign="top"><strong>Informe Preliminar:</strong></td>
        <td> <?php echo nl2br(e($biopsia->preliminar )); ?></td>
      </tr>
    </table>
    <p>&nbsp;</p>
      <table>
        <tr>
          <td width="400px">Fin del Informe</td>
          <td><p align="center"><strong>DR. SALVADOR LOPEZ HERNANDEZ <br>MEDICO PATOLOGO - JVPM 1711</strong> </p></td>
        </tr>
      </table>

<script type="text/javascript">
      this.print();
    </script>
</body>
</html>
