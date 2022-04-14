<?php 
    session_start();

    $_usuario=$_REQUEST['usuario'];
    $_clave=md5($_REQUEST['clave']);

    //$conn = mysqli_connect("localhost", "root","", "app");
    $conn = mysqli_connect("jtb9ia3h1pgevwb1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "uq2hk1qexkl7sepo","epvcime5dlhknb7g", "mmxkis2yga6v7kej");
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
    //capturando datos
    //conuslta SQL
    $sql = "select * from usuario where correo like '".$_usuario."'";
    $result = mysqli_query($conn, $sql);
    //Capturando resultado de la busqueda
    $row = mysqli_fetch_array($result);
    error_reporting(0);
    
    if($row['correo']==$_usuario && $row['clave']==$_clave){
        
        //Verifica si es administrador o veterinario
        if($row['tipousuario']=="administrador"){
            $_SESSION['usuario']=$_usuario;
            $_SESSION['tipo']="administrador";
            $_SESSION['nombre']=$row['nombres'];
            $_SESSION['apellidos']=$row['apellidos'];
            header("Location: paneladmin.php");
        }else{
            if($row['tipousuario']=="veterinario"){
                $_SESSION['usuario']=$_usuario;
                $_SESSION['tipo']="veterinario";
                $_SESSION['nombre']=$row['nombres'];
                $_SESSION['apellidos']=$row['apellidos'];
                header("Location: panelveterinario.php");
                }
            else {
                if($row['tipousuario']=="propietario"){
                    $_SESSION['usuario']=$_usuario;
                    $_SESSION['tipo']="propietario";
                    $_SESSION['nombre']=$row['nombres'];
                    $_SESSION['apellidos']=$row['apellidos'];
                    header("Location: panelpropietario.php");
                }
                else{  //Usuario no registrado
                    header("Location: index.php");
                }
            }
        }
    

    }
    else {
        if ($_usuario=="" || $_clave=="" || $_clave==null) {
           /* echo "
            <p>Error, debe ingresar usuario y clave</p>
            <a href='login.php'>Volver</a>";*/
            header("Location: login.php");
        }
        else {
            /*echo "
            <p>Error, usuario o clave incorrectos</p>
            <a href='login.php'>Volver</a>";*/
            header("Location: login.php");
        }
      /*  echo "Usuario o clave incorrectos";*/
    }

    // aqui se pone la condicion que debe cumplir con usuario y password ,luego la conexion a la bd

?>

