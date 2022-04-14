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
        <link rel="stylesheet" href="../estilos/estilospanelveterinario1.css">
        
        <title>Panel Veterinario</title>
    </head>
    

    <body>

        <div class="superior">
            <header>
                <div class="fila">
                    <div class="fila1">
                        <a href="cerrarsesion.php"><img id="cerrarsesion" src="../imagenes/cerrarsesion.png" alt=""></a>
                    </div>
                    <div class="fila1">
                        <h1 > <?php  echo $_SESSION["usuario"];?></h1>
                    </div>

                </div>

            </header>
        </div>
        <div class="fila">
                    <h1>Bienvenido <?php  echo $_SESSION["nombre"];?></h1>
        </div>
        <div id="contenedor">
            <div class="zona"> 
                <div class="logos">
                    <a href="FormRegistrarPerro.php"><img id="registrarperro"src="../imagenes/registroperro.png" alt="Registro de perros"></a>
                </div>
                <div class="enunciado">
                    <h2>Registrar mascota</h2>
                </div>
            </div>
            <div class="zona">
                <div class="logos">
                    <a href="FormConsultarPerro.php"><img id="consultarperro"src="../imagenes/buscar.png" alt="Consulta de perros"></a>
                </div>
                <div class="enunciado">
                    <h2>Consultar mascota</h2>
                </div>
            </div>
            <div class="zona">
                <div class="logos">
                    <a href="FormConsulta.php"><img id="consultarperro"src="../imagenes/consulta.png" alt="Consulta de perros"></a>
                </div>
                <div class="enunciado">
                    <h2>Atender mascota</h2>
                </div>
            </div>  
            
            <footer>
                <h3>VeterinariaMunicipal - Lima 2022 all right reserverd </h3>
            </footer>                       
        </div>

    
    </body>
</html>
