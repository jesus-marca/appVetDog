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
    <link rel="stylesheet" href="estilos/estilospanelpropietario1.css">
    
    <title>Panel Propietario</title>
</head>

<body>
    <div class="superior">
        <header>
            <div class="fila">
                <div class="fila1">
                    <a href="cerrarsesion.php"><img id="cerrarsesion" src="imagenes/cerrarsesion.png" alt=""></a>
                </div>
                <div class="fila1">
                    <h1 > Tipo de usuario: <?php  echo $_SESSION["tipo"];?></h1>
                </div>

            </div>
            <div class="fila">
                <div class="fila2">
                    <h2 > Hola,<?php  echo $_SESSION["nombre"];?></h1>
                </div>
            </div>

        </header>
    </div>

    <div id="cuadro">
        <div id="cuadro1">
            <div class="imagen1">
                <a href="HistorialPropietario.php"><img id="historial"src="imagenes/historialperro.png" alt="Registro de perros"></a>
            </div>
            <div class="imagen1">
                <a href="Deudas.php"><img id="deudas"src="imagenes/deuda.png" alt="Consulta de perros"></a>
            </div>
            
        </div>
        
        <div class="reg">
            <p>Historial de mi mascota </p>
    
        </div>
        <div class="reg">
            <p> Mis deudas</p>
    
        </div>


    </div>

   
</body>
</html>