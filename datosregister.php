<?php
require_once("./db/conexion.php");

if (isset($_POST['registrar'])) {

    $name = $_POST['name'];
    $correo = $_POST['correo'];
    $pass = md5($_POST['pass']);

    if ($name !== "" && $correo !== "" && $pass !== "") {

        if (!preg_match('/^[a-zA-ZÀ-ÿ\s]{1,40}$/', $_POST['name'])) {
            echo "
            
            <script>
            alert('Escriba un nombre adecuado');
            window.location = 'register.php';
            </script>
            ";
            exit();
        }

        if (!preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST['correo'])) {
            echo "
            
            <script>
            alert('El correo no es valido');
            window.location = 'register.php';
            </script>
            ";
            exit();
        }
            
        

        $mysql = "INSERT INTO users(name,email,pass) VALUES('$name','$correo','$pass')";
        

        $consultarName= mysqli_query($conexion,"SELECT*FROM users WHERE email='$correo'");
        if(mysqli_num_rows($consultarName)>0){
            echo"
            
            <script>
            alert('Este Correo ya existe');
            window.location = 'register.php';
            </script>
            ";
            exit();
        }
        $consultarDB = mysqli_query($conexion, $mysql);
        if ($consultarDB) {
            echo "
            
            <script>
            alert('Los datos se guardaron');
            window.location = 'index.php';
            </script>
            ";
            exit();
        }else {
            echo "
            
            <script>
            alert('Los campos no pueden estar vacios');
            window.location = 'Los datos no se guardaron';
            </script>
            ";
            exit();
        }
    }else{
        echo "
            
            <script>
            alert('Los campos no pueden estar vacios');
            window.location = 'register.php';
            </script>
            ";
            exit();
    }
    

}else{
    echo "
            
            <script>
            alert('Hubo un error intenta de nuevo');
            window.location = 'register.php';
            </script>
            ";
    exit();
}

