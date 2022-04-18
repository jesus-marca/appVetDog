
<?php

    session_start();
    error_reporting(0);

    // Poner en cada archivo se necesite sesion activa
    $varsesion= $_SESSION['usuario'];

    if($varsesion==null || $varsesion==''){
        echo 'usted no tiene autorizacion';
        die();
    }

//conexion a la Base de datos (Servidor,usuario,password)
    include_once "db_datos.php";
    $conn = mysqli_connect($db_host, $db_user,$db_pass,$db_database);
    if (!$conn) {
        die("Error de conexion: " . mysqli_connect_error());
    }
    //(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
    //capturando datos
    $v1 = $_REQUEST['ID'];
    $v2 = $_REQUEST['Correo'];
    //BUsla tabla consulta
    $sql = "select * from consulta where consulta_id_perro like '".$v1."'and consulta_id_propietario 
            like '".$v2."'";
    $result = mysqli_query($conn, $sql);
    //cuantos reultados hay en la busqueda
    $num_resultados = mysqli_num_rows($result);

    //Consultar nombre de perro y propietario
    $sql1 = "SELECT  a.perro_foto ,a.perro_foto,a.perro_nombre ,a.perro_tipo_imagen,b.pro_nombres ,b.pro_apellidos
            from  perro a 
            inner join  propietario b on a.perro_id_pro = b.pro_id 
            where  a.perro_id='".$v1."'";

    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1) ;
    //echo '<body style="background-color: #e6b788;" ><a href="FormConsultarPerro.php" style="text-decoration:none;font-size:50px;  margin-left: 1000px;">Regresar</a>';
   
    //mostrando informacion de los perros y detalle

    echo '<link rel="stylesheet" href="estilos/estilohistorial.css">';
    
    echo '<body ><div class="contenedor">';
    
   

    echo '<div class="titulo0">';
    echo '<a href="FormConsultarPerro.php"><img id="volver" src="imagenes/volver.png" ></a></div>';
    echo "<p id='p1'><b>Número de consultas encontradas: </b>".$num_resultados."</p>";
    if($num_resultados==0){
        $row1["perro_foto"]="desconocido.png";
        $row1["perro_nombre"]="No disponible";
        $row1["pro_nombres"]="No disponible";
        $row1["pro_apellidos"]="";
    }
    echo '<div class="titulo1">';
    echo '<p><img width="50"'.' height="auto"' ."src='data:".$row1["perro_tipo_imagen"].";base64,".base64_encode($row1['perro_foto'])."'>"."</p></div>";
    //echo '<p><img width="100"'."src='data:" .$row["consulta_tipo_imagen"].";base64,".base64_encode($row['consulta_rayosx'])."'>"."</p></a></div>";
    echo '<div class="titulo1">';
   
    echo "<p>Nombre:<br> ".$row1["perro_nombre"]."</p></div>";

    echo '<div class="titulo1">';
    echo "<p>Propietario: <br>".$row1["pro_nombres"]." ".$row1["pro_apellidos"]."</p></div>";



    echo '<div class="titulo2">
            <p>Fecha de historial</p>
        </div>

        <div class="titulo2">
            <p>ID veterinario</p>
        </div>

        <div class="titulo2">
            <p>Placa</p>
        </div>

        <div class="titulo2">
            <p>Sangre</p>
        </div>

        <div class="titulo2">
            <p>Diagnostico</p>
        </div>
        <div class="titulo2">
            <p>Tratamiento</p>
        </div>';
  
    for ($i=0; $i <$num_resultados; $i++) {
        $row = mysqli_fetch_array($result)  ;
        echo '<div class="titulo2">';
        echo "<p>".$row["consulta_fecha"]."</p></div>";
        
        echo '<div class="titulo2">';
        echo "<p>".$row["consulta_id_veterinario"]."</p></div>";
        
        echo '<div class="titulo2">';
        echo "<a href='img' target='_blank' rel='noopener noreferrer '>";
        //echo '<p><img class="placa" '."src='data:" .$row["consulta_tipo_imagen"].";base64,".base64_encode($row['consulta_rayosx'])."'>"."</p></a></div>";
        echo "<a href='data:" .$row["consulta_tipo_imagen"].";base64,".base64_encode($row['consulta_rayosx'])."' target='_blank' rel='noopener noreferrer '>";
        echo '<div class="titulo2">';
        echo "<p>".$row["consulta_examen_sangre"]."</p></div>";

        echo '<div class="titulo2">';
        echo "<p>".$row["consulta_diagnostico"]."</p></div>";

        echo '<div class="titulo2">';
        echo "<p>".$row["consulta_tratamiento"]."</p></div>";

    } 

    echo"</body>";
    
    mysqli_close($conn);

?>

