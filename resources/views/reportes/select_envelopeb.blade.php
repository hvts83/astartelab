<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/print.css" rel="stylesheet" media="print" type="text/css">
  <title>Document</title>
  <style>
    body{ margin-top: 200px; margin-left:175px; font-size:14px;  margin-left:175px; font-size:14px;  font-family: Calibri,Candara,Segoe,Segoe UI,Optima, Arial,sans-serif; }
    .page_break { page-break-before: always; }
  </style>
</head>
<body>
    @php
        $last_key = count($biopsias);
    @endphp
    @foreach( $biopsias as $key => $biopsia)

    <table>
        <tr>
            <td width="125px"><img src="{{ asset('img/astartelogobn.jpg') }}" height="100px" width="100px"/></td>
            <td><p align="center">23 Calle Poniente #1249, Colonia Layco<br>San Salvador, Tel. 2226-9229</p></td>
        </tr>
        <tr>
          <td width="125px"></td>
          <td><p align="center"> <hr> <p> <strong>Dr(a) </strong> {{$biopsia->doctor}}</p> <hr> <p> {{$biopsia->paciente}}</p>  </td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p align="center"><i><strong>Nuestra Educaci&oacute;n e Investigaci&oacute;n  al Servicio de su Salud</strong></i></p>


        @if ( $key != ($last_key - 1))
            <div class="page_break"></div>
        @endif
    @endforeach
    <script type="text/javascript">
        this.print();
    </script>
</body>
</html>
