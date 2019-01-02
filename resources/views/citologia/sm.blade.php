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
        <td>{{$citologia->informe}}</td>
        <td>Doctor(a): {{$citologia->doctor}}</td>
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
        <td>Edad: {{ $citologia->edad }} a&ntilde;os {{ $citologia->meses }} mesess</td>
        <td> </td>
      </tr>
      <tr>
        <td valign="top">Diagnostico:</td>
        <td colspan="3">{!! nl2br(e($citologia->diagnostico )) !!} </td>
      </tr>
      <tr>
        <td>Recibido:</td>
        <td>{{ $citologia->recibido }}</td>
        <td>Entregado: {{ $citologia->entregado }}</td>
      </tr>
    </table>
    <hr>

    <p align="center"><u>Informe Citopatologico</u></p>

    <table>
         
      <tr class="spaceUnder">
        <td valign="top" width="100px"><strong>Micro:</strong></td>
        <td>{!! nl2br(e($citologia->micro  )) !!}</td>
      </tr>
      <tr class="spaceUnder">
        <td valign="top" width="100px"><strong>Diagnostico <br> Citopatologico:</strong></td>
        <td>{!! nl2br(e($citologia->dxlab )) !!}</td>
      </tr>
      <tr class="spaceUnder">
        <td valign="top" width="100px"><strong>Informe <br> Preliminar:</strong></td>
        <td> {!! nl2br(e($citologia->preliminar)) !!}</td>
      </tr>
    </table>
    <p>&nbsp;</p>
      <table>
        
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
