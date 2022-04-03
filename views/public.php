<style>
    .containert {

        display: grid;
        width: 100%;

        gap: 5px;
        overflow: hidden;
        grid-template-columns: 20% 50% 20%;
    }

    .__main {

        display: flex;
        flex-direction: column;
        border: 1px solid #ccc;
        margin: 10px 0px 20px 0px;
        border-radius: 10px;
        overflow: hidden;

        box-shadow: 0px 0px 7px .4px #9E9E9E;
        font-family: sans-serif;


    }

    .__youkat {

        margin-top: 4px;
        margin-left: 4px;
        display: flex;
        align-items: center;
    }

    .datouser {

        width: 40px;
    }

    .__tj {

        margin-left: 10px;
    }

    ._l {
        margin-top: 9px;
    }

    .__ia {
        margin-bottom: 8px;
    }

    .__aciones {

        display: flex;
        justify-content: space-between;
        width: 80%;
        margin: 10px auto;
        font-family: 'Roboto', sans-serif;
        border-top: 1px solid #ccc;
        padding-top: 10px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;

    }

    .__views {
        padding: 4px;
        text-decoration: none;
        color: black;
        position: relative;
    }

    .__views::before {
        content: "";
        position: absolute;
        display: block;
        height: 2;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        transform: scaleX(0);
        background-color: black;
        transition: transform .2s ease-in;
        margin-top: 10px;

    }

    .__views:hover::before {
        transform: scaleX(1);
        color: #000;


    }

    .__imagre {
        width: 100%;
        margin: 3px;
        border-radius: 20px;
    }
</style>
<div class="containert">
    <div class="div">
        <?php

require_once("./amigos.php");

?>
    </div>
    <div class="__th">
        <?php

        require_once("../db/conexion.php");
        $sql = mysqli_query($conexion, "SELECT * FROM post p INNER JOIN users u ON
         p.idpost = u.id  ORDER BY p.idpost DESC LIMIT 100");
        while ($rowt = mysqli_fetch_array($sql)) { ?>
            <?php if (mysqli_num_rows($sql) > 0) { ?>
                <div class="__main">

                    <div class="__youkat">
                        <div class="datouser">
                            <?php

                            if ($rowt['foto']) { ?>
                                <img class="__imagre" src="data:image/jpej;base64,<?php echo base64_encode($rowt['foto']); ?>" alt="">

                            <?php } else { ?>
                                <img class="__imagre" src=" ./img/avatar.png" alt="...">

                            <?php    }

                            ?>
                        </div>
                        <div class="datos" style="margin: 4px;"><?php echo $rowt['name']; ?></div>
                        <div class="datos __tj "> Hace: <?php echo $rowt['fecha']; ?></div>
                    </div>
                    <div class="datos __tj _l"><?php echo $rowt['namepost']; ?></div>
                    <div class="datos __tj _l __ia"><?php echo $rowt['descripcion']; ?></div>
                    <div class="datos"><img style="width: 100%;" src="data:image/jpej;base64,<?php echo base64_encode($rowt['avatar']); ?>" alt=""></div>
                    <?php ?>
                    <style>
                        .cont {
                            display: block;
                            margin-right: 30px;
                        }
                    </style>
                    <?php
                    $id = $rowt['id'];
                    $datos = mysqli_query($conexion, "SELECT * FROM post  ");
                    $rowh = mysqli_fetch_assoc($datos);


                    ?>
                    <div class="__aciones">
                        <?php
                        if ($row == 0) { ?>
                            <div class="cont">Likes: <?php echo $rowt["likes"] ?></div>


                        <?php  } else { ?>

                            <div class="cont">Likes: <?php echo $rowt["likes"]; ?></div>
                        <?php }

                        ?>


                        <div class="coment __thenb">
                            <a href="" class="__views">Comentarios:</a>
                        </div>
                        <div class="share __thenb">
                            <a href="" class="__views">Compartidos</a>
                        </div>
                    </div>
                    <div class="__aciones">

                        <div class="like __thenb">
                            <a href="./like.php?id=<?php echo $rowt['idpost']; ?>" class="__views"><i class="bi bi-hand-thumbs-up"></i> Me gusta</a>
                        </div>
                        <div class="coment __thenb">
                            <a href="" class="__views"><i class="bi bi-chat-left"></i> Comentar</a>
                        </div>
                        <div class="share __thenb">
                            <a href="" class="__views"><i class="bi bi-reply"></i> Compartir</a>
                        </div>
                    </div>
                    <style>
                        .comentar {

                            width: 100%;
                            margin-bottom: 10px;
                        }

                        .__comentIcon {
                            width: 100%;
                            display: flex;
                            align-items: center;

                        }

                        .__comentIconq {
                            min-width: 600px;
                            border: none;
                            outline: none;
                            margin-left: 5px;
                        }

                        .__conect {
                            padding: 2px;
                            border: 1px solid #9E9E9E;
                            display: flex;
                            align-items: center;
                            border-radius: 20px;
                            margin-left: 4px;
                            padding: 3px;
                        }

                        .button button {

                            border: none;
                            background: #3a3a3a;
                            min-width: 30px;
                            min-height: 30px;
                            border-radius: 20px;
                        }

                        .button button i {
                            color: #fff;
                        }
                    </style>
                    <div class="comentar">
                        <form action="">
                            <div class="__comentIcon">
                                <div class="__userf datouser ">
                                    <?php

                                    if ($rowt['foto']) { ?>
                                        <img class="__imagre" src="data:image/jpej;base64,<?php echo base64_encode($rowt['foto']); ?>" alt="">

                                    <?php } else { ?>
                                        <img class="__imagre" src="./img/avatar.png" class="card-img-top" alt="...">

                                    <?php    }

                                    ?>
                                </div>
                                <div class="__conect">
                                    <div class="input">
                                        <input class="__comentIconq" type="text" name="comentar" id="comentar" placeholder="Escribe un comentario...">
                                    </div>
                                    <div class="button">
                                        <button><i class="bi bi-play-fill"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } else { ?>

                <h2 class="text-center m-3">No hay publicaciones</h2>

            <?php } ?>
        <?php }

        ?>
    </div>
    <div class="div">
        hola dded
    </div>

</div>