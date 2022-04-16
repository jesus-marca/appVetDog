<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        if($_SESSION['tipo']=='administrador'){
            header("Location: paneladmin.php");
        }else{
            if($_SESSION['tipo']=='propietrio'){
                header("Location: panelpropietario.php");
            }
            else{
                header("Location: panelveterinario.php");
            }
            
       
        }
    } 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <!-- Link hacia el archivo de estilos css -->
    <link rel="stylesheet" href="estilos/login1.css">
        
    <style type="text/css">

    </style>
        
    <script type="text/javascript">
        
    </script>
    <title>Login</title>
</head>
<body style="background">

    <div id="contenedor">
        <header >
            <h1>SISTEMA DE REGISTRO DE MASCOTAS</h1>
        </header >
        <div id="central">
                <div id ="titulo">
                        <h2>Bienvenido</h2>
                </div>
                <form action="validarpag.php" id="loginform" method="post">
                    <div class="sub1">
                        <input type="text" name="usuario" placeholder="Usuario" required>
                    </div>
                    <div class="sub1">
                        <input type="password"  name="clave" placeholder="Password"required>
                    </div>
                    
                    <div class="sub1">
                        <button type="submit"  name="Ingresar">Login</button>
                    </div>
                    
                    
                </form>
                <div class="pie-form">

                </div>
                </div>
                <div class="inferior">
                    
                </div>
            </div>
        </div>
            
</body>
</html>