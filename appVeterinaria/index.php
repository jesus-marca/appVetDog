
<?php

    session_start();
    if (!isset($_SESSION['usuario'])) {
        header('location: login.php');
    }
    else {
        if($_SESSION['tipo']=='administrador'){
            header("Location: paneladmin.php");
        }else{
            header("Location: panelveterinario.php");
       
        }
    } 
?>



