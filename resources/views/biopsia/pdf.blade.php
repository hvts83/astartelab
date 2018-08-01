<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    h3{
      margin:0px;
    }
    h5{
      margin:0px;
    }
    tr{
      margin:0px;
    }
    td{
      margin:0px;
    }
    p{
      margin:0px;
    }  
  </style>
</head>
<body>

<table align="center" width="100%">
  <tr>
    <td  width="100px"><img src="{{ asset('img/astartelogobn.jpg') }}" height="100px" width="100px"/></td>
    <td nowrrap align="center"><h3>ASTARTE LABORATORIO DE PATOLOGIA</h3>
                <h5>INSCRIPCI&Oacute;N C.S.S.P. N° 11</h5>
                <h3>DR. SALVADOR LOPEZ HERNANDEZ</h3>
                <h5>MEDICO PATOLOGO - JVPM 1711<br>
                    PATOLOGIA GENERAL, PEDIATRICA Y NEONATAL <br>
                    CITOPATOLOGIA, CITOLOGIA POR ASPIRACION CON AGUJA FINA (CAAF)</h5>
        <p align="center">23 Calle Poniente #1249, Colonia Layco, San Salvador<br>
         Telefax: 2226-9229 E-mail: astartelaboratorio@gmail.com</p>
    </td>
  </tr>
</table>

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
    <td>@if($biopsia->sexo == '1')
                        <p>M</p>
                        @else
                        <p>F</p>
                        @endIf</td>
    <td>Edad:</td>
    <td>{{ $biopsia->edad }} a&ntilde;os {{ $biopsia->meses }} meses</td>
  </tr>
  <tr>
    <td>Diagnostico:</td>
    <td> </td>
  </tr>
  <tr>
    <td>Recibido:</td>
    <td>{{ $biopsia->recibido }}</td>
    <td></td>
    <td></td>
    <td>Entregado: </td>
    <td>{{ $biopsia->entregado }}</td>
  
  </tr>
</table>
<hr>

<p align="center">Informe Histopatologico</p>

<table>
  <tr>
    <td>Macro</td>
    <td>{{ $macro->detalle }}</td>
  </tr>
  <tr>
    <td>Micro</td>
    <td>{{ $micro->detalle }}</td>
  </tr>
  <tr>
    <td>Diagnostico</td>
    <td>{{ $preliminar->detalle }}</td>
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
</body>
</html>