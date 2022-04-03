<?php

session_start();
if(isset($_SESSION['uername'])){

    session_destroy();
    header("location: index.php");
}


?>