<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.ico') }}"/>
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.ico') }}"/>
  <title>Astarté </title>
  <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
  <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
</head>
<body class="gray-bg">

  @yield('content')

  <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>

  @section('scripts')
  @show

  </body>
  </html>
