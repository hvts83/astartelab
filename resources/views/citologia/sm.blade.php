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
      <td>{{$citologia->informe}}</td>
      <td>Doctor(a):</td>
      <td>{{$citologia->doctor}}</td>
    </tr>
    <tr>
      <td>Paciente:</td>
      <td>{{$citologia->paciente}}</td>
    </tr>
    <tr>
      <td>Sexo:</td>
      <td>
        @if($citologia->sexo == '1')
          <p>M</p>
        @else
          <p>F</p>
        @endIf
      </td>
      <td>Edad:</td>
      <td>{{ $citologia->edad }}</td>
    </tr>
    <tr>
      <td>Diagnostico:</td>
      <td>{{ $citologia->diagnostico }} </td>
    </tr>
    <tr>
      <td>Recibido:</td>
      <td>{{ $citologia->recibido }}</td>
      <td></td>
      <td></td>
      <td>Entregado: </td>
      <td>{{ $citologia->entregado }}</td>
    </tr>
  </table>
  <hr>
  
  <p align="center">Informe Citolopatologico</p>
  
  <table>
    <tr>
      <td>Micro:</td>
      <td>{{ $citologia->micro }} </td>
    </tr>
    <tr>
      <td>Diagnostico:</td>
      <td>{{ $citologia->preliminar }}</td>
    </tr>
    <tr>
      <td>Informe Preliminar:</td>
      <td nowrap> </td>
    </tr> 
  </table>
  <hr>
  
  <table>
    <tr>
      <td width="400px">Fin del Informe</td>
      <td><p align="center">DR. SALVADOR LOPEZ HERNANDEZ <br>MEDICO PATOLOGO - JVPM 1711 </p></td>
    </tr>
  </table>
  <script type="text/javascript"> 
        this.print(); 
  </script> 
  </body>