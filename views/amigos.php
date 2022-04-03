<?php


require_once("./estilos.php");
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
$sqli = mysqli_query($conexion, "SELECT * FROM users ORDER BY id DESC LIMIT 100");




?>
<style>
    .contenedor {
        position: sticky;
        top: 8px;
        width: 100%;
        margin: 3;
        display: flex;
        align-items: center;
        flex-direction: column;

    }

    .__image_friend {
        width: 70px;
        height: 100%;
        border-radius: 60px;


    }

    .__info {

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .link_fiend {
        display: flex;


    }

    .link_fiend .gt {
        background: #5D5E5E;

    }

    .link_fiend .gt:hover {
        background: #707171;
    }

    .link_fiend a {

        text-decoration: none;
        font-family: sans-serif;
        background: #064F8E;
        border-radius: 6px;
        color: #fff;
        padding: 10px;
        display: block;
        margin-top: 10px;
        margin: 2px;


    }

    .link_fiend a:hover {

        background: #0E62AB;
    }
</style>

<div class="container coy text-center">
    <h5 class="text-center mt-3">Sugerencias</h5>
    <?php

    while ($row = mysqli_fetch_assoc($sqli)) { ?>

        <div class="contenedor">
            <div class="__info">
                <div class="imagen">
                    <?php
                    if ($row['foto']) { ?>
                        <img class="__image_friend" src="data:image/jpej;base64,<?php echo base64_encode($row['foto']); ?>" alt=" <?php echo $row['name'] ?>" title=" <?php echo $row['name'] ?>">

                    <?php } else { ?>
                        <img class="__image_friend" src="./img/avatar.png" alt=" <?php echo $row['name'] ?>" title=" <?php echo $row['name'] ?>">
                    <?php    }
                    ?>

                </div>
                <div class="name">
                    <?php echo $row['name'] ?>
                </div>

            </div>
            <div class="link_fiend">

                <a href="./amigosseger.php">Añadir</a>
                <a class="gt" href="./amigosseger.php">Eliminar</a>
            </div>

        </div>

    <?php }

    ?>
</div>




<?php require_once("./footer.php"); ?>