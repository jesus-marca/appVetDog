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
    <link rel="stylesheet" href="estilos/estiloregconsulta1.css">
    <script src="script.js"></script>
</head>
<a href="panelveterinario.php"><img id="home1" src="imagenes/home.png" alt=""></a>

<body style="background-image: url(imagenes/fondo.jpg);">
   
    <div id="cuadro" >
        <div id="titulo"><p>FORMULARIO DE REGISTRO PERRUNO</p></div>
        <div id="imagen">
            <img  id="dog" src="imagenes/perroslogo.png" alt="perro" onpointerover="none"> 
            
        </div>
        <div id ="formulario">
            <div id="form">
            <form  action="Registrar_perro.php" method="Post" id="form2" enctype="multipart/form-data" >
                <div class="fila">
                    <div class="columna1">
                        <p>Ingresar Codigo </p>
                    </div>
                    <div class="columna2">
                        <p><Input  name = "Codigo" Type Text required></p>
                    </div>
                </div>

                
                <div class="fila">
                    <div class="columna1">
                        <p>Correo propietario</p>
                    </div>
                    <div class="columna2">
                        <p><Input  name = "Propietario" Type Text required></p>
                    </div>
                </div>


        
                <div class="fila">
                    <div class="columna1">
                        <p>Ingresar Nombre </p>
                    </div>
                    <div class="columna2">
                        <p><Input  name = "Nombre" Type Text required></p>
                    </div>
                </div>


                <div class="fila">
                    <div class="columna1">
                        <p>Fecha de Nacimiento</p>
                    </div>
                    <div class="columna2">
                        <p><Input name= "FechNac" Type = "Date" required></p>
                    </div>
                </div>


                <div class="fila">
                    <div class="columna1">
                        <p>Genero</p>
                    </div>
                    <div class="columna2">
                        <p><Input  name="Genero" Type = "Radio" > Macho
                            <Input   name= "Genero" Type = "Radio"> Hembra
                        </p>
                    </div>
                </div>


                <div class="fila">
                    <div class="columna1">
                        <p>Seleccione Raza </p>
                    </div>
                    <div class="columna2">
                        <p>
                            <Select name = "Raza" required>
                                <Option value = "Pitbull"> Pitbull
                                <Option value = "Bulldog"> Bulldog
                                <Option value = "Shichu"> Shichu
                                <Option value = "Pequines"> Pequines
                                <Option value = "San Bernardo"> San Bernardo
                                <Option value = "Chiguahua"> Chiguahua
                            </Select>
                        </p>
                    </div>
                </div>
                
                <div class="fila">
                    <div class="columna1">
                        <p>Foto </p>
                    </div>
                    <div class="columna2">
                        <p>
                            <input type="file" name="Foto" accept="image/*" required>
                        </p>
                    </div>
                </div>
                <div class="fila">
                    <div class="columna1">
                        <p> <Input id="reg" name= "Registrar" Type = Submit value = "Registrar"  ></p>
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