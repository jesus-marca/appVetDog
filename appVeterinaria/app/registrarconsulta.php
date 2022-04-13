<?php
    //conexion a la Base de datos (Servidor,usuario,password)
    //$conn = mysqli_connect("localhost", "root","", "app");
    $conn = mysqli_connect("jtb9ia3h1pgevwb1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "uq2hk1qexkl7sepo","v4zzjfa34j0yra1f", "mmxkis2yga6v7kej");
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("Relocadb",$link);
    //capturando datos
    $v1 = $_REQUEST['Nro'];
    $v2 = $_REQUEST['Fecha'];
    $v3 = $_REQUEST['Veterinario'];
    $v4 = $_REQUEST['Perro'];
    $v5 = $_REQUEST['Propietario'];
    $v6 = $_FILES['RayosX']['name'];
    $v7 = $_REQUEST['Sangre'];
    $v8 = $_REQUEST['Diagnostico'];
    $v9 = $_REQUEST['Tratamiento'];
    $v10 = $_REQUEST['Costo'];
    $v = $_REQUEST['Pago'];

    
    if($v =="Contado"){
        $v11 = 1;
    }else{
        $v11 = 0;
    }
 
    //conuslta SQL
    $sql = "insert into consulta(consulta_id,consulta_fecha, consulta_id_veterinario,consulta_id_perro,
    consulta_id_propietario,consulta_rayosx,consulta_examen_sangre,consulta_diagnostico,
    consulta_tratamiento,consulta_costo,consulta_pagada) ";
    $sql .= "VALUES ('$v1', '$v2', '$v3','$v4', '$v5', '$v6','$v7','$v8', '$v9', '$v10','$v11')";
    if($v1==""|| $v2==""|| $v3==""|| $v4==""|| $v5==""||  $v6==NULL|| $v7==""|| $v8==""|| $v9==""|| $v10==""|| $v11==""){
        echo"fallo";
        //include("registrofallido.php");
        mysqli_close($conn);
        exit();
    }  
    
    //Subir imagen a una carpeta dentro del servidor

    $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/appVeterinaria/pacientes/';
    move_uploaded_file($_FILES['RayosX']['tmp_name'],$carpeta_destino.$_FILES['RayosX']['name']);
    

//Verifica que los datos se almacenen en la BD
    try{
        if (mysqli_query($conn, $sql)) {
            include("registroexitoso.php");

        } else {
            /*echo "Error: " . $sql . "<br>" . mysqli_error($conn);*/
            include("registrofallido.php"); 
        } 
    }
    catch(Exception $e) //capturamos un posible error
    {
    //mostramos el texto del error al usuario	  
        include("registrofallido.php");
 
  }
       
    mysqli_close($conn);
    //Mensaje de conformidad
?>