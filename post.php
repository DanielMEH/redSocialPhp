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
    require_once("./db/conexion.php");
    $datos = $_SESSION['uername'];
    $sqli = mysqli_query($conexion, "SELECT * FROM users WHERE email='$datos'");
    $row = mysqli_fetch_array($sqli);
    
     $_SESSION['uername'];

    $name= $_POST["namepu"];
    $descg=  $_POST["descrip"];
    $img=  addslashes(file_get_contents($_FILES["image"]['tmp_name']));
    $idt = $row['id'];
    $likes=1;

        
      
    

        $sqlpublic = "INSERT INTO post(idpost,namepost,descripcion,avatar,likes)VALUES('$idt','$name','$descg','$img','$likes')";
        $verificarpublic = mysqli_query($conexion, $sqlpublic);
        if ($sqlpublic) {
            echo "
            <script>
            alert('Se subio tu piblicacion');
            window.location = 'views/home.php';
            </script>
            ";
            exit();
        } else {

            echo "
            <script>
            alert('Los datos no  se guardaron');
            window.location = 'views/home.php';
            </script>
            ";
            exit();
        }
    
}


?>