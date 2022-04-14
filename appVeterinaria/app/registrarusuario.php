<?php
    session_start();
    error_reporting(0);
    //conexion a la Base de datos (Servidor,usuario,password)
    //$conn = mysqli_connect("localhost", "root","", "app");
    $conn = mysqli_connect("jtb9ia3h1pgevwb1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "uq2hk1qexkl7sepo","epvcime5dlhknb7g", "mmxkis2yga6v7kej");
    
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
    $v1 = $_REQUEST["usuario"];
    $v2 = $_REQUEST["nombres"];
    $v3 = $_REQUEST["apellidos"];
    /*$v41 = $_REQUEST["clave1"] ;
    $v42 = $_REQUEST["clave1"] ;*/
    $v4=$_REQUEST["clave1"] ;
    $v5 = $_REQUEST["tipo"];

    //Funcion para validar clave
    function validar_clave($clave,&$error_clave){
        if(strlen($clave) < 8){
            $error_clave = "La clave debe tener al menos 6 caracteres";
            return false;
        }
        if(strlen($clave) > 16){
            $error_clave = "La clave no puede tener más de 16 caracteres";
            return false;
        }
        if (!preg_match('`[a-z]`',$clave)){
            $error_clave = "La clave debe tener al menos una letra minúscula";
            return false;
        }
        if (!preg_match('`[A-Z]`',$clave)){
            $error_clave = "La clave debe tener al menos una letra mayúscula";
            return false;
        }
        if (!preg_match('`[0-9]`',$clave)){
            $error_clave = "La clave debe tener al menos 1 caracterer numéricos";
            return false;
        }
        if (!preg_match('/^[a-zA-Z0-9\.]*[@$!%*#?&]+[a-zA-Z0-9\.]*[@$!%*#?&]+([a-zA-Z0-9\.]*[@$!%*#?&]*[a-zA-Z0-9\.])*$/',$clave)){
            $error_clave = "La clave debe tener al menos 2 caracteres especiales";
            return false;
        }
        $error_clave = "";
        return true;
    } 
    //Funcion para validar correo

    function vallidaremail($email){
        $expresion = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
        if(preg_match($expresion, $email)){
            return true;
        }else{
            return false;
        }
    }

    //conuslta SQL
    
    if (vallidaremail($v1)){
        //echo "correo valido";
    }else{
        
        echo ' <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../estilos/errorregistro.css">
            <title>Error</title>
            <a href="paneladmin.php"><img id="image1" src="../imagenes/volver.png" alt=""></a>
        </head>
        <body style="background-image: url(../imagenes/fondoazul.jpg);
        background-repeat:no-repeat;background-size: cover;">
            <p>CORREO NO VÁLIDO:<br> </p>
            <a href="paneladmin.php">Regresar</a>
        </body>
        </html>';
        exit();
    }
    
    //valida la clave
    $error_encontrado="";
    if (validar_clave($v4, $error_encontrado)){
        //echo "PASSWORD VÁLIDO";
    }else{
        echo ' <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../estilos/errorregistro.css">
            <title>Error</title>
            <a href="paneladmin.php"><img id="image1" src="../imagenes/volver.png" alt=""></a>
        </head>
        <body style="background-image: url(../imagenes/fondoazul.jpg);
        background-repeat:no-repeat;background-size: cover;">
            <p>PASSWORD NO VÁLIDO:<br> ' . $error_encontrado.'</p>
        </body>
        </html>';
        exit(); 
    }

    //convierte hash la clave

    $pass = md5($v4);
    //inserta datos en la base de datos
    $sql = "INSERT INTO usuario (correo, nombres, apellidos, clave,tipousuario) ";
    $sql .= "VALUES ('$v1', '$v2', '$v3','$pass', '$v5')";
    
    if($v1==""|| $v2==""|| $v3==""|| $v4==""|| $v5==""){
        echo "hay algo raro aqui";
        mysqli_close($conn);
        exit();
    }   
  
     
    if (mysqli_query($conn, $sql)) {
        //include("registroexitoso.html");
     
        switch ($v5){
            case "veterinario":
                $sql1 = "INSERT INTO veterinario (vet_id, vet_nombres, vet_apellidos) ";
                $sql1 .= "VALUES ('$v1', '$v2', '$v3')"; 
                break;
            case "propietario":
                $sql1 = "INSERT INTO propietario (pro_id, pro_nombres, pro_apellidos) ";
                $sql1 .= "VALUES ('$v1', '$v2', '$v3')"; 
                break;
            default:
                break;    
        }
        mysqli_query($conn, $sql1);
        echo "
        <p>Ok, datos ingresados </p>";
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        
    }
        

    mysqli_close($conn);
    //Mensaje de conformidad
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/errorregistro.css">
    <title>Registro exitoso</title>
    <a href="paneladmin.php"><img id="image1" src="../imagenes/volver.png" alt=""></a>
</head>
<body style="background-image: url(../imagenes/exito.jpg);
        background-repeat:no-repeat;background-size: cover;">
    <p>Se registro con exito </p>
    
</body>
</html>
