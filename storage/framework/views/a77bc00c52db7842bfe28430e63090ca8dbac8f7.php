<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body{ font-size: 14px; font-family: Calibri,Candara,Segoe,Segoe UI,Optima, Arial,sans-serif;}
    h3{ margin:0px; font-family: Calibri,Candara,Segoe,Segoe UI,Optima, Arial,sans-serif;}
    h5{margin:0px;  font-family: Calibri,Candara,Segoe,Segoe UI,Optima, Arial,sans-serif;}
    p{font-family: Calibri,Candara,Segoe,Segoe UI,Optima, Arial,sans-serif;}
    table{font-family: Calibri,Candara,Segoe,Segoe UI,Optima, Arial,sans-serif;}
    tr.spaceUnder>td {padding-bottom: 1em;}
  </style>
</head>
<body>

  <table align="center" width="100%">
    <tr>
      <td  width="100px"><img src="<?php echo e(asset('img/astartelogobn.jpg')); ?>" height="100px" width="100px"/></td>
       <td nowrrap align="center"><h3>ASTARTE LABORATORIO DE PATOLOGIA</h3>
          <p align="center">INSCRIPCI&Oacute;N C.S.S.P. Nº11</p>
          <p align="center">23 Calle Poniente #1249, Colonia Layco, San Salvador<br>
           Telefax: 2226-9229 E-mail: astartelaboratorio@gmail.com</p>
      </td>
    </tr>
  </table>
      <hr>
      <table>
          <tr>
            <td><strong>Informe:</strong></td>
            <td><?php echo e($citologia->informe); ?></td>
            <td nowrap><strong>Doctor(a): </strong> <?php echo e($citologia->doctor); ?></td>
          </tr>
          <tr>
            <td><strong>Paciente :</strong></td>
            <td nowrap><?php echo e($citologia->paciente); ?></td>
          </tr>
          <tr>
            <td><strong>Sexo: </strong></td>
            <td>
              <?php if($citologia->sexo == '1'): ?>
                <p>M</p>
              <?php else: ?>
                <p>F</p>
              <?php endif; ?>
            </td>
            <td><strong>Edad: </strong> <?php echo e($citologia->edad); ?> a&ntilde;os <?php echo e($citologia->meses); ?> mesess</td>
            <td> </td>
          </tr>
          <tr>
            <td valign="top"><strong>Diagnostico: </strong></td>
            <td colspan="3"><?php echo nl2br(e($citologia->diagnostico)); ?></td>
          </tr>
          <tr>
            <td><strong>Recibido: </strong></td>
            <td><?php echo e($citologia->recibido); ?></td>
            <td><strong>Entregado: </strong> <?php echo e($citologia->entregado); ?></td>
          </tr>
        </table>
        <hr>

        <p align="center"><strong> <u>Informe Citopatologico</u> </strong></p>
        <p>&nbsp;</p>

        <table>
         
          <tr class="spaceUnder">
            <td valign="top" width="100px"><strong>Micro:</strong></td>
            <td><?php echo nl2br(e($citologia->micro  )); ?></td>
          </tr>
          <tr class="spaceUnder">
            <td valign="top" width="100px"><strong>Diagnostico <br> Citopatologico:</strong></td>
            <td><?php echo nl2br(e($citologia->dxlab )); ?></td>
          </tr>
          <tr class="spaceUnder">
            <td valign="top" width="100px"><strong>Informe <br> Preliminar:</strong></td>
            <td> <?php echo nl2br(e($citologia->preliminar)); ?></td>
          </tr>
        </table>
        <p>&nbsp;</p>
          <table>

        <table>
          <tr>
            <td width="400px"><strong>Fin del Informe</strong></td>
            <td><p align="center"><strong>DR. SALVADOR LOPEZ HERNANDEZ <br>MEDICO PATOLOGO - JVPM 1711</strong> </p></td>
          </tr>
        </table>
  <script type="text/javascript">
        this.print();
  </script>
  </body>
