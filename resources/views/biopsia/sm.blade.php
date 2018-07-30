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
    <td>{{ $biopsia->edad }} a&ntilde;os</td>
  </tr>
  <tr>
    <td>Diagnostico:</td>
    <td>@foreach ($diagnosticos as $diagnostico)
                             @if ($diagnostico->id == $biopsia->diagnostico_id)
                               <option value="{{ $diagnostico->id }}" selected> {{  $diagnostico->nombre }} </option>
                             @else
                              <option value="{{ $diagnostico->id }}"> {{  $diagnostico->nombre }} </option>
                             @endif
                           @endforeach</td>
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
    <td>@if($biopsia->informe_preliminar == '1')
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
</html>