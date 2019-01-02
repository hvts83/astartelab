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
      <td>{{$biopsia->informe}}</td>
      <td>Doctor(a): {{$biopsia->doctor}}</td>
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
        <td>Edad: {{ $biopsia->edad }} a&ntilde;os {{ $biopsia->meses }} meses</td>
      </tr>
      <tr>
        <td valign="top">Diagnostico:</td>
        <td colspan="3">{!! nl2br(e($biopsia->diagnostico)) !!}</td>
      </tr>
      <tr>
        <td>Recibido:</td>
        <td>{{ $biopsia->recibido }}</td>
        <td>Entregado: {{ $biopsia->entregado }} </td>
      </tr>
    </table>
    <hr>

    <p align="center"><strong><u>Informe Histopatologico</u></strong></p>
    <p>&nbsp;</p>

  <table>
      <tr class="spaceUnder">
        <td valign="top"><strong>Macro</strong></td>
        <td>{!! nl2br(e($biopsia->macro)) !!}</td>
      </tr>
      <tr class="spaceUnder">
        <td valign="top"><strong>Micro</strong></td>
        <td>{!! nl2br(e($biopsia->micro )) !!}</td>
      </tr>
      <tr class="spaceUnder">
        <td valign="top"><strong>Diagnostico</strong></td>
        <td>{!! nl2br(e($biopsia->dxlab )) !!}</td>
      </tr>
      <tr class="spaceUnder">
        <td valign="top"><strong>Informe Preliminar:</strong></td>
        <td> {!! nl2br(e($biopsia->preliminar )) !!}</td>
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
