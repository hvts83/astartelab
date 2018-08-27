<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    h3{ margin:0px;}
    h5{ margin:0px;}
    tr{ margin:0px;}
    td{ margin:0px;}
    p{ margin:0px; }  
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
    <td>Doctor(a):</td>
    <td><?php echo e($biopsia->doctor); ?></td>
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
    <td>Edad:</td>
    <td><?php echo e($biopsia->edad); ?> a&ntilde;os</td>
  </tr>
  <tr>
    <td>Diagnostico:</td>
    <td><?php echo e($biopsia->diagnostico); ?></td>
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
      <td><?php echo e($biopsia->macro); ?></td>
    </tr>
    <tr>
      <td>Micro</td>
      <td><?php echo e($biopsia->micro); ?></td>
    </tr>
    <tr>
      <td>Diagnostico</td>
      <td><?php echo e($biopsia->preliminar); ?></td>
    </tr>
    <tr>
      <td>Informe Preliminar:</td>
      <td></td>
    </tr>
  </table>

<hr>


<table>
  <tr>
    <td width="400px">Fin del Informe</td>
    <td><p align="center">DR. SALVADOR LOPEZ HERNANDEZ <br>MEDICO PATOLOGO - JVPM 1711</p></td>
  </tr>
</table>
<script type="text/javascript"> 
      this.print(); 
    </script> 
</body>
</html>