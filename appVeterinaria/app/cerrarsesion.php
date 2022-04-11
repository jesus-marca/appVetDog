<?php   
    session_start();
    error_reporting(0);

    // Poner en cada archivo se necesite sesion activa
    $varsesion= $_SESSION['usuario'];

    if($varsesion==null || $varsesion==''){
        echo 'usted no tiene autorizacion';
        die();
    }
    session_destroy();
    header ("Location: login.php");
?>