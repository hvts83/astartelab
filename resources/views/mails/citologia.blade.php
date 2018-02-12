@extends ('mails/layout')

@section('titulo')
  Resultado de Citología {{ $citologia->informe }}
@endsection

@section('mainContent')
  <tr>
    <td class="wrapper">
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <p>Hola {{$citologia->nombrePaciente}} </p>
            <p>Los datos de su citologia son los siguientes:</p>
            <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
              <tbody>
                <tr>
                  <td><strong>Doctor :</strong> {{$citologia->nombreDoctor}}</td>
                  <td><strong>Diagnóstico :</strong> {{$citologia->diagnostico}}</td>
                </tr>
                <tr>
                  <td align="left">
                    <table border="0" cellpadding="0" cellspacing="0">
                      <tbody>
                        <tr>
                          <td> <a href="http://htmlemail.io" target="_blank">Descargar PDF</a> </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
@endsection
