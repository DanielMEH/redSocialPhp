<?php
session_start();
require_once("./db/conexion.php");

$correo = $_POST['email'];

$pass = md5($_POST['pass']);

$mysqSesion= mysqli_query($conexion,"SELECT *FROM users WHERE email='$correo' AND pass='$pass'");
if(mysqli_num_rows($mysqSesion)>0){
    
    $_SESSION['uername']=$correo;
    header("location: ./views/home.php");
    exit();

   
}else{
    echo "
            
            <script>
            alert('Este usuario no existe');
            window.location = 'index.php';
            </script>
            ";
    exit();
}




?>