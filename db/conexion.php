<?php


try {
    $conexion = new mysqli("localhost", "root", "", "chatbook");
} catch (Exception $th) {
    echo " error".$th->getMessage();
}

?>