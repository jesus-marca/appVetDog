<?php
    //conexion a la Base de datos (Servidor,usuario,password)
    //$conn = mysqli_connect("localhost", "root","", "app");
    $conn = mysqli_connect("jtb9ia3h1pgevwb1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "uq2hk1qexkl7sepo","epvcime5dlhknb7g", "mmxkis2yga6v7kej");
    
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
    $v1 = $_REQUEST['Codigo'];
    $v2 = $_REQUEST['Propietario'];
    $v3 = $_REQUEST['Nombre'];
    $v4 = $_REQUEST['Raza'];
    $v5 = $_REQUEST['Genero'];
    $v6 = $_REQUEST['FechNac'];
    $v7 = $_FILES['Foto']['name'];

 
    //conuslta SQL
    $sql = "INSERT INTO perro (perro_id, perro_id_pro,perro_nombre, perro_raza,perro_genero, perro_nacimiento,perro_foto) ";
    $sql .= "VALUES ('$v1', '$v2', '$v3','$v4', '$v5', '$v6','$v7'  )";
    if($v1==""|| $v2==""|| $v3==""|| $v4==""|| $v5==""|| $v6==""|| $v7==NULL){
        include("registrofallido.php");
        mysqli_close($conn);
        exit();
    }  
    
    //Subir imagen a una carpeta dentro del servidor

    $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/appVeterinaria/pacientes/';
    move_uploaded_file($_FILES['Foto']['tmp_name'],$carpeta_destino.$_FILES['Foto']['name']);
    

//Verifica que los datos se almacenen en la BD
    if (mysqli_query($conn, $sql)) {
        include("registroexitoso.php");

    } else {
        /*echo "Error: " . $sql . "<br>" . mysqli_error($conn);*/
        include("registrofallido.php"); 
    }
        

    mysqli_close($conn);
    //Mensaje de conformidad
?>
