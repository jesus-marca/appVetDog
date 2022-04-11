<?php
//conexion a la Base de datos (Servidor,usuario,password)
    $conn = mysqli_connect("localhost", "root","", "RelocaDB");
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
    //capturando datos
    $v2 = $_REQUEST['Nombre'];
    //BUsca tabla consulta
    $sql = "select * from Perro where Nombre like '".$v2."'";
    $result = mysqli_query($conn, $sql);
    //cuantos reultados hay en la busqueda
    $num_resultados = mysqli_num_rows($result);
    echo '<body style="background-color: #e6b788;" ><a href="FormConsultarPerro.php" style="text-decoration:none;font-size:50px;  margin-left: 1000px;">Regresar</a>';
    echo "<center><p><b>Número de perros encontrados: </b>".$num_resultados."</p>";
    
   
    //mostrando informacion de los perros y detalle
    for ($i=0; $i <$num_resultados; $i++) {
        $row = mysqli_fetch_array($result); echo ($i+1);
        
        echo "</br>";
        echo " DNI : ".$row["DNI"];
        echo " </br>Nombre : ".$row["Nombre"];
        echo " </br>Raza : ".$row["Raza"];
        echo " </br>Genero : ".$row["Genero"];
        echo " </br>Nacio en : ".$row["FechaNacimiento"];
        echo "  </br><img src='../pacientes/".$row["Foto"]."' width='200' height='200'>";
        echo "</p></body>";
    }
    echo "</center>";
?>
