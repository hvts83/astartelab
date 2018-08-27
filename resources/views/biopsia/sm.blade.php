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
    <td>{{$biopsia->informe}}</td>
    <td>Doctor(a):</td>
    <td>{{$biopsia->doctor}}</td>
  </tr>
  <tr>
    <td>Paciente:</td>
    <td>{{$biopsia->paciente}}</td>
  </tr>
  <tr>
    <td>Sexo:</td>
    <td>
      @if($biopsia->sexo == '1')
        <p>M</p>
      @else
        <p>F</p>
      @endIf
    </td>
    <td>Edad:</td>
    <td>{{ $biopsia->edad }} a&ntilde;os</td>
  </tr>
  <tr>
    <td>Diagnostico:</td>
    <td>{{ $biopsia->diagnostico }}</td>
  </tr>
  <tr>
    <td>Recibido:</td>
    <td>{{ $biopsia->recibido }}</td>
    <td>Entregado: </td>
    <td>{{ $biopsia->entregado }}</td>
  </tr>
</table>
<hr>
<p align="center">Informe Histopatologico</p>

<table>
    <tr>
      <td>Macro</td>
      <td>{{ $biopsia->macro }}</td>
    </tr>
    <tr>
      <td>Micro</td>
      <td>{{ $biopsia->micro }}</td>
    </tr>
    <tr>
      <td>Diagnostico</td>
      <td>{{ $biopsia->preliminar }}</td>
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