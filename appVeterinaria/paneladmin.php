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
    <link rel="stylesheet" type="text/css" href="estilos/panelusuario.css">
    <title>Panel de administracion</title>
    <a href="cerrarsesion.php"><img id="cerrarsesion" src="imagenes/cerrarsesion.png" alt=""></a>

</head>

<script>
  function mostrarContrasena(){
      var tipo1 = document.getElementById("clave");

      if(tipo1.type == "password" ){
          tipo1.type = "text";

      }else{
          tipo1.type = "password";

      }
  }
</script>
<body >
    <h1>Bienvenido:<?php  echo $_SESSION["usuario"];?>
</h1>
    <form action="registrarusuario.php" method="POST" class="form-register">
    <h2 class="form-titulo">CREA UN USUARIO</h2>
        <div class="contenedor-inputs">
            <input type="text" id="nombre" name="nombres" placeholder="Nombre" class="input-1" required>
            <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" class="input-1" required>
            <input type="email" id="correo" name="usuario" placeholder="Correo" class="input-3" required>
            <input type="password" id="clave" name="clave1" placeholder="Contraseña" class="input-3">
            
            
            <button class="btn btn-primary"  type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
            <p>Seleciona el tipo de usuario
                <Select name = "tipo" placeholder="Tipo usuario" class="input-2" required>
                    <Option value = "administrador"> Administrador
                    <Option value = "veterinario"> Veterinario
                    <Option value = "propietario"> Propietario
                </Select><br>

            </p>
            
            <input type="submit" name="registrar" value="Registrar" class="input-1">
            <input type="reset" value="Cancelar" class="input-1">
        </div>
    </form>
</body>
</html>

