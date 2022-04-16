
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
    <title>Consulta</title>
    <link rel="stylesheet" href="estilos/estilosconsultar1.css">
</head>

<a href="login.php"><img id="home2" src="imagenes/home.png" alt=""></a>
<!--<h1>CONSULTA DE PERROS</h1>-->
<br>



<body  style="background-image: url(imagenes/fondo2.jpg);">
    <div class="contenedor">
        <div class="consulta1">
            <div id="imagen1">
                
                <img id="globo" src="imagenes/dial.png" alt="">
            </div>
            <div id="imagen2">
                <img id="buscar" src="imagenes/buscar.png" alt="">
            </div>
        </div>
        <div class="consulta2" >
            </div id="form1">
                <form  id ="form2" action="Consulta_historial.php" method="post">
                    <!--<p>Sistema de Identificación Perrunos</p>-->
                    <p>Ingresar codigo de perro</p>   
                    <p><Input Type = Text name = "ID"  required></p>
                     <p>Ingresar correo del propietario</p> 
                    <p><Input Type = Text name = "Correo" required></p>
                    <p><Input Type = Submit value = "Buscar"></p>
                </form>
        </div>

    </div>


</body>
</html>
