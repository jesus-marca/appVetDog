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
//$conn = mysqli_connect("localhost", "root","", "app");
 
$conn = mysqli_connect("jtb9ia3h1pgevwb1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "uq2hk1qexkl7sepo","epvcime5dlhknb7g", "mmxkis2yga6v7kej");

if (!$conn) {
    die("Error de conexion: " . mysqli_connect_error());
}
//(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
//capturando datos

$v1 = $varsesion;
//BUsla tabla consulta

$sql = "select  c.consulta_fecha ,b.perro_nombre ,c.consulta_id_veterinario,c.consulta_diagnostico,
        c.consulta_tratamiento
        from  consulta c
        inner join  perro b on c.consulta_id_perro=b.perro_id
        where  c.consulta_id_propietario='".$v1."'"; 

$result = mysqli_query($conn, $sql);
//cuantos reultados hay en la busqueda
$num_resultados = mysqli_num_rows($result);

echo '<link rel="stylesheet" href="../estilos/estilohistorialpropietario.css">';

echo '<body ><div class="contenedor">';



echo '<div class="titulo0">';
echo '<a href="panelpropietario.php"><img id="volver" src="../imagenes/volver.png" ></a></div>';
echo "<p id='p1'><b>Número de consultas encontradas: </b>".$num_resultados."</p>";

echo '<div class="titulo2">
        <p>Fecha de historial</p>
    </div>
    <div class="titulo2">
        <p>Nombre</p>
    </div>
    <div class="titulo2">
        <p>ID veterinario</p>
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
    echo "<p>".$row["perro_nombre"]."</p></div>";
    
    echo '<div class="titulo2">';
    echo "<p>".$row["consulta_id_veterinario"]."</p></div>";
    
    echo '<div class="titulo2">';
    echo "<p>".$row["consulta_diagnostico"]."</p></div>";

    echo '<div class="titulo2">';
    echo "<p>".$row["consulta_tratamiento"]."</p></div>";

} 

echo"</body>";

mysqli_close($conn);

?>
