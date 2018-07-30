<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<table align="center" width="80%">
  <tr>
    <td  width="100px"><img src="{{ asset('img/astartelogobn.jpg') }}" height="100px" width="100px"/></td>
    <td nowrrap><h3 align="center">ASTARTE LABORATORIO DE PATOLOGIA</h3>
        <p align="center">23 Calle Poniente #1249, Colonia Layco, San Salvador<br>
         Telefax: 2226-9229 E-mail: astartelaboratorio@gmail.com</p>
    </td>
  </tr>
</table>
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
    <td>@if($citologia->sexo == '1')
                        <p>M</p>
                        @else
                        <p>F</p>
                        @endIf</td>
    <td>Edad:</td>
    <td>{{ $citologia->edad }}</td>
  </tr>
  <tr>
    <td>Diagnostico:</td>
    <td>@foreach ($diagnosticos as $diagnostico)
                             @if ($diagnostico->id == $citologia->diagnostico_id)
                               <option value="{{ $diagnostico->id }}" selected> {{  $diagnostico->nombre }} </option>
                             @else
                              <option value="{{ $diagnostico->id }}"> {{  $diagnostico->nombre }} </option>
                             @endif
                           @endforeach</td>
  </tr>
  <tr>
    <td>Recibido:</td>
    <td>{{ $citologia->recibido }}</td>
    <td>Entregado: </td>
    <td>{{ $citologia->entregado }}</td>
  
  </tr>
</table>
<hr>


<p align="center">Informe Citolopatologico</p>

<table>
  <tr>
    <td>Micro:</td>
    <td>{{ $micro->detalle }} </td>
  </tr>
  <tr>
    <td>Diagnostico:</td>
    <td>{{ $preliminar->detalle }}</td>
  </tr>
  <tr>
    <td>Informe Preliminar:</td>
    <td nowrap>@if($citologia->informe_preliminar == '1')
                        <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="dpreliminar" checked>Si</label>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="dpreliminar">No</label>
                        @else
                        <label class="checkbox-inline i-checks"> <input type="radio" value="1" name="dpreliminar">Si</label>
                        <label class="checkbox-inline i-checks"> <input type="radio" value="2" name="dpreliminar" checked>No</label>
                        @endIf</td>
  </tr>
</table>
<hr>


<table>
  <tr>
    <td width="400px">Fin del Informe</td>
    <td><p align="center">DR. SALVADOR LOPEZ HERNANDEZ <br>MEDICO PATOLOGO </p></td>
  </tr>
</table>
<script type="text/javascript"> 
      this.print(); 
</script> 
</body>

