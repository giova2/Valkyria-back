<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>VALKYRIA</title>

    </head>

<body>

<div class="container">
	<div class="row" style="margin-top: 10%;">      
        <h1 class="title">El stock es insuficiente para el producto Numero {{ $id }}</h1>
        <a class="btn btn-success" href="{{config('app.front_url')}}/productos">Realizar nuevo producto</a>
	</div>
</div>
</body>
</html>
