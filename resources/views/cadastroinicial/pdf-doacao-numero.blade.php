<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Recibo de Doação</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div style="margin-bottom: 20px;">
        <div style="float: left; width: 20%;">
            <img src="{{ public_path('images/logo.jpg') }}" height="100" alt="logo">
        </div>
        <div style="float: left; width: 80%; text-align: center; line-height: 100px;">
            <h1 style="margin: 0;">Número da Sacola</h1>
        </div>
    </div>
   <div style="text-align: center; line-height: 1000px; font-size: 50px;">
        <h1 style="margin: 0;">{{ $documento->numero }}</h1>
    </div>
    <div style="text-align: center; line-height: 100px;">
        <h1 style="margin: 0;">{{ \Carbon\Carbon::parse($documento->dt_doc)->format('d/m/Y') }}</h1>
    </div>
   </div>
</body>
<script>
    window.onload = function() {
        window.print();
    };
</script>
</html>
 