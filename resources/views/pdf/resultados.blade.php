<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    @foreach($datos_proyecto as $datos)
        <div class="content">
            <div class="text-center" style="text-align: right">
                <p>{{ $datos->fecha }}</p>
            </div>
            <div class="text-center" style="text-align: center">
                <h3>{{ $datos->nombreproyecto }}</h3>
            </div>
            <div class="text-center" style="text-align: justify">
                <p>{{ $datos->descripción }}</p>
                <p>Nombre del Técnico: {{ $datos->promovente }} {{ $datos->appromovente }} {{ $datos->ampromovente }}</p>
                <p>Compañia: {{ $datos->nomcompania }}</p>
                <p>Dirección: {{ $datos->colonia }}, {{ $datos->municipio }}, {{ $datos->estado }}</p>
            </div>
        </div>
    @endforeach
    <table>
        <thead>
            <tr>
                <th>Factor</th>
                <th>Preparación</th>
            </tr>
            @foreach($factores as $fac )
                <tr>
                    <td>{{ $fac->nombre_factor }}</td>
                </tr>
            @endforeach
        </thead>
        <tbody>
            @foreach($preparacion as $prep )
                <tr>
                    <td>{{ $prep->preparación }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
