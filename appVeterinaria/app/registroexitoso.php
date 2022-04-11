<?php
session_start();
error_reporting(0);

// Poner en cada archivo se necesite sesion activa
$varsesion= $_SESSION['usuario'];

if($varsesion==null || $varsesion==''){
    echo 'usted no tiene autorizacion';
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Exitoso</title>
        <link rel="stylesheet" href="../estilos/respuestaestilo.css">
    </head>
    <body >
        <div id="cuadro1">
                <a href="panelveterinario.php"><img id="casa" src="../imagenes/home.png" alt=""></a>
        </div>
        <div id="cuadro2">
            <p>Registro exitoso</p>
            <img id="perrofeliz"src="../imagenes/dog.gif" alt="">
        </div>

    </body>
</html>