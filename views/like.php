<?php
session_start();
if (!isset($_SESSION['uername'])) {


    echo "
            
            <script>
            alert('Debes Iniciar sesión');
            window.location = '../index.php';
            </script>
            ";
    session_destroy();
    exit();
} else {
    // echo "estas activo";

    $datos = $_SESSION['uername'];
}
require_once("../db/conexion.php");
$sqli = mysqli_query($conexion, "SELECT * FROM users WHERE email='$datos'");
$row = mysqli_fetch_array($sqli);
$idperfil = $row['id'];



$idp = $_GET['id'];


$sqlLikes = $conexion->query("SELECT* FROM likes WHERE iduser='$idperfil' AND idpost='$idp' ");
$rows = $sqlLikes->num_rows;

if ($rows == 0 ) {
    $likesql = mysqli_query($conexion, "INSERT INTO likes(iduser,idpost) VALUES('$idperfil ','$idp')");
    $tablaupdate = $conexion->query("UPDATE post SET likes= likes+1 WHERE idpost='$idp'");

    if ($likesql) {
        echo "
            
            <script>
            alert('Se guardo el like');
            window.location = './home.php';
            </script>
            ";
            exit();
    } else {
        echo "
            
            <script>
            alert('No se guardo el like');
            window.location = './home.php';
            </script>
            ";
            exit();
    }
} else {
    $likesql = mysqli_query($conexion, "DELETE FROM likes WHERE iduser='$idperfil' AND idpost='$idp'");

    $tablaupdate = $conexion->query("UPDATE post SET likes= likes-1 WHERE idpost='$idp'");
    if ($likesql) {
        echo "
            
            <script>
            alert('Se elimino el like');
            window.location = './home.php';
            </script>
            ";
        exit();
    
    }
}






