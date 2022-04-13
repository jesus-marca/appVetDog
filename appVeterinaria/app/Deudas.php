
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
$conn = mysqli_connect("jtb9ia3h1pgevwb1.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "uq2hk1qexkl7sepo","v4zzjfa34j0yra1f", "mmxkis2yga6v7kej");
if (!$conn) {
    die("Error de conexion: " . mysqli_connect_error());
}


$v1 = $varsesion;



//Consultar nombre de perro y propietario

$sql = "select  c.consulta_fecha ,b.perro_nombre ,c.consulta_id_veterinario,c.consulta_costo
        from  consulta c
        inner join  perro b on c.consulta_id_perro=b.perro_id
        where c.consulta_id_propietario = '".$v1."' and c.consulta_pagada = 0  ";



$result = mysqli_query($conn, $sql);
$num_resultados = mysqli_num_rows($result);


//mostrando informacion de los perros y detalle

echo '<link rel="stylesheet" href="../estilos/estilodeudas1.css">';

echo '<body ><div class="contenedor">';



echo '<div class="titulo0">';
echo '<a href="panelpropietario.php"><img id="volver" src="../imagenes/volver.png" ></a></div>';
echo "<p id='p1'><b>Número de consultas encontradas: </b>".$num_resultados."</p>";




echo '<div class="titulo2">
        <p>Fecha de historial</p>
    </div>

    
    <div class="titulo2">
        <p>Nombre </p>
    </div>
    
    <div class="titulo2">
        <p>ID veterinario</p>
    </div>


    <div class="titulo2">
        <p>Costo</p>
    </div>';
    $total=0;
    for ($i=0 ;$i <$num_resultados; $i++) {
        $row = mysqli_fetch_array($result)  ;
        echo '<div class="titulo2">';
        echo "<p>".$row["consulta_fecha"]."</p></div>";
        
        echo '<div class="titulo2">';
        echo "<p>".$row["perro_nombre"]."</p></div>";

        echo '<div class="titulo2">';
        echo "<p>".$row["consulta_id_veterinario"]."</p></div>";
        
        echo '<div class="titulo2">';
        echo "<p>".$row["consulta_costo"]."</p></div>";
        $total= $row["consulta_costo"]+$total;


    } 
    echo '<div class="titulo3">';
    echo "<p>Total deudas</p></div>";
    echo '<div class="titulo4">';
    echo "<p>".$total."</p></div>";
    echo"</body>";

    mysqli_close($conn);

?>

