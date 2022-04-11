<?php
    //conexion a la Base de datos (Servidor,usuario,password)
    $conn = mysqli_connect("localhost", "root","", "app");
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
    $v1 = $_REQUEST['idraza'];
    $v2 = $_REQUEST['nombreraza'];


 
    //conuslta SQL
    $sql = "INSERT INTO razas (idraza, nombreraza) ";
    $sql .= "VALUES ('$v1', '$v2' )";
    if($v1==""|| $v2==""){
        include("registrofallido.php");
        mysqli_close($conn);
        exit();
    }  
    
    //Subir imagen a una carpeta dentro del servidor
    

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