<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tiempo Real</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ayde Solutions 2018">

    <link rel="icon" href="" type="image/x-icon">

    <style>
        body{font-family:sans-serif}.layout{text-align:center}.titulo{color:#4207cc}.titulo-menu{color:#b22222;margin:50px}ul{width:max-content;margin:auto;line-height:2;font-size:1.4em}li{text-align:left}.botonera{margin:50px auto;display:inline-block}button{margin:0 10px;float:left;font-size:.8em}
    </style>
</head>

<body class="layout">
    <h1 class="titulo">¿QUIÉN COME HOY?</h1>
    <h3 class="titulo-menu">Menú del día</h3>

    <p><?php echo $message?></p>
    <!-- <ul>
        <li>Pollo al horno con puré</li>
        <li>Sorrentinos de espinaca</li>
        <li>Ensalada de peras glaseadas</li>
    </ul> -->

    <div class="botonera">
        <a href="<?php echo $confirmation_url?>">
            <button class="btn-aceptar">Voy a comer</button>
        </a>
    </div>
</body>

</html>