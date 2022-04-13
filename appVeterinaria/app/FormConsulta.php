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
    <title>Formulario de registro</title>
    <link rel="stylesheet" href="../estilos/estiloregconsulta1.css">
    <script src="script.js"></script>
</head>
<a href="panelveterinario.php"><img id="home1" src="../imagenes/home.png" alt=""></a>

<body style="background-image: url(../imagenes/fondo.jpg);">
   
    <div id="cuadro" >
        <div id="titulo"><p>FORMULARIO DE ATENCION VETERINARIA</p></div>
        <div id="imagen">
            <img id="vet" src="../imagenes/atender.png" alt="perro" onpointerover="none">
        </div>
        <div id ="formulario">
            <div id="form">
            <form  action="registrarconsulta.php" method="Post" id="form2" enctype="multipart/form-data" >
                
                <div class="fila">
                    <div class="columna1">
                        <p>Numero de Consulta</p>
                    </div>
                    <div class="columna2">
                        <p><Input cñass="intput1" name = "Nro" Type ="Text" required></p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p>Fecha</p>
                    </div>
                    <div class="columna2">
                        <p><Input name= "Fecha" Type = "Date" required></p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p>Correo del veterinario</p>
                    </div>
                    <div class="columna2">
                        <p><Input  name = "Veterinario" Type="Text" required></p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p>Codigo del perro</p>
                    </div>
                    <div class="columna2">
                        <p><Input  name = "Perro" Type=" Text" required></p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p>Correo propietario</p>
                    </div>
                    <div class="columna2">
                        <p><Input  name = "Propietario" Type ="Text" required></p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p>Rayos X</p>
                    </div>
                    <div class="columna2">
                        <p><Input  type = "file" name = "RayosX" required></p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p>Examen de sangre </p>
                    </div>
                    <div class="columna2">
                        <p><Input  name = "Sangre" Type="Text" required></p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p>Diagnostico </p>
                    </div>
                    <div class="columna2">
                        <p><Input  name = "Diagnostico" Type="Text" required></p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p>Tratamiento </p>
                    </div>
                    <div class="columna2">
                        <p><Input  name = "Tratamiento" Type="Text" required></p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p>Costo </p>
                    </div>
                    <div class="columna2">
                        <p><Input  name = "Costo" Type="Text" required></p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p>Tipo de pago </p>
                    </div>
                    <div class="columna2">
                        <p> <Select name = "Pago">
                                <Option value = "Contado"> Contado
                                <Option value = "Credito"> Credito
                            </Select>
                        </p>
                    </div>
                </div>
                
    
                <div class="fila">
                    <div class="columna1">
                        <p><Input id="reg" name= "Registrar" Type = Submit value = "Registrar" ></p>
                    </div>
                    <div class="columna2">
                        <p><Input id="can" Type = reset value = "Cancelar"></p>
                    </div>
                </div>
           
            </form>
            </div>
        </div>

    </div>
  

</body>
</html>