<?php
// comprobamos si recibimos los datos del post//
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //capturamos las variables//
    $equipo = isset($_POST['equipo']) ? $_REQUEST['equipo'] :null;
    $ciudad = isset($_POST['ciudad']) ? $_REQUEST['ciudad'] :null;
    $estadio = isset($_POST['estadio']) ? $_REQUEST['estadio'] :null;
    //variables de conexion//
    $hostDB = 'localhost';
$nombreDB = 'futbol';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);


//preparar la consulta //

$miInsert  = $miPDO->prepare('INSERT INTO nacional (equipo, ciudad, estadio) values :equipo, :ciudad, :estadio');

//EJECUTAR LA CONSULTA//

$miInsert->execute(
    array(
        'equipo' => $equipo,
        'ciudad' => $ciudad,
        'estadio' => $estadio
        )
    );

    //redireccionamos hacia index.php

    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro Equipo</title>
</head>
<body>
    <form action="" method="post"
        <p>
            <label> Equipo</label>
            <input id="equipo" type="text" name="equipo">
        </p>
        <p>
            <label>Ciuedad</label>
            <input id="ciudad" type="text" name="ciudad">
        </p>
        <p>
            <label> Estadio</label>
            <input id="estadio" type="text" name="estadio">
        </p>
        <p>
            <input type="submit" value="guardar">
        </p>

    </form>
</body>
</html>