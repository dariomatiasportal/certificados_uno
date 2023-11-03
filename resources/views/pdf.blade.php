<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->


        <link rel=”stylesheet” href=”{{ asset('css/app.css') }}">
                <link rel=”stylesheet” href=”https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Styles -->
        <style>



.bold {
  font-weight: bold;
}

.block {
  display: block;
}

.underline {
  border-bottom: 1px solid #777;
  padding: 5px;
  margin-bottom: 15px;
}

.margin-0 {
  margin: 0;
}

.padding-0 {
  padding: 0;
}

.pm-empty-space {
  height: 40px;
  width: 100%;
}

body {
  /*padding: 20px 0;
  background: #ccc;*/
  background-image: url('..\storage\app\public\fondo\fondo.png');
  background-size: 100%;
}


</style>
</head>
  <body>
    <table style="margin-top: 16%; margin-right: calc(30%); margin-left: calc(30%); width: 100%;">
        <tbody>
          {{--  <tr>
                <td colspan="2" style="width: 49.8452%;">logo1</td>
                <td colspan="2" style="width: 49.8452%;">
                    <div style="text-align: right;">logo2</div>
                </td>
            </tr>--}}
            <tr>
                <td colspan="4" style="text-align: left;">
                    <div style="text-align: left;">Por cuanto</div>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="background-color: rgb(0, 32, 96);">
                    <div style="text-align: center;"><strong><span style="color: rgb(255, 255, 255);">{{ $record->people->nombre }}, {{ $record->people->apellido }}  - DNI: {{ $record->people->dni }}</span>:</strong></div>
                </td>
            </tr>
            <tr>
                <td colspan="4"><div style="text-align: center;">{{ $record->courses->contenido }}</div></td>
            </tr>
            <tr>
                <td colspan="4">
                    <div style="text-align: center;"><strong><span style="color: rgb(0, 32, 96);">CERTIFICADO DE {{ $record->rol }}</span></strong></div>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: right;">***** de emicion *** Certificado</td>
            </tr>
            <tr>
                <td style="text-align: center;"><img src="public/{{ $record->courses->resolutions->firma }}" width="50"/></td>
                <td style="text-align: center;"><img src='{{storage_path("app/public/".$record->courses->resolutions->firma)}}' width="100"></td>
                <td style="text-align: center;">Firma 3</td>
                <td style="text-align: center;">Firma 4</td>
            </tr>
            <tr>
                <td style="text-align: center;">A y N<br>Titulo</td>
                <td style="text-align: center;">A y N<br>Titulo</td>
                <td style="text-align: center;">A y N<br>Titulo</td>
                <td style="text-align: center;">A y N<br>Titulo</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">CUV</td>
                <td colspan="2">QR</td>
            </tr>
        </tbody>
    </table>
  </body>
</html>
