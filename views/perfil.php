<?php

require_once("./nav.php") ?>


<style>
    .__whOver {

        min-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .__statikFixed {

        position: sticky;
        top: 10px;

    }

    .userimg {

        width: 40px;
        border: 1px solid #eee;
        border-radius: 50px;
        background-position: center center;
        background-size: cover;
    }
</style>
<?php

require_once("../db/conexion.php");
$idperfil = $_GET['id'];
$sql = mysqli_query($conexion, "SELECT*FROM users WHERE id='$idperfil'");
$row = mysqli_fetch_array($sql);
$row['id'];


?>
<div class="container">
    <div class="row">

        <div class="col-4 mt-3 ">
            <div class="card shadow p-3 __statikFixed" style="width: 18rem;">
                <?php

                if ($row['foto']) { ?>
                    <img src="data:image/jpej;base64,<?php echo base64_encode($row['foto']); ?>" class="card-img-top" alt="...">

                <?php } else { ?>
                    <img src="./img/avatar.png" class="card-img-top" alt="...">

                <?php    }

                ?>
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo $row['name'] ?> </h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item __whOver">Email: <?php echo $row['email'] ?></li>
                    <li class="list-group-item __whOver">Telefono: <?php echo $row['telefono'] ?></li>
                    <li class="list-group-item __whOver">Estado civil: <?php echo $row['estadocivil'] ?></li>
                    <li class="list-group-item __whOver">Ciudad: <?php echo $row['ciudad'] ?></li>
                    <li class="list-group-item __whOver">Fecha de nacimiento: <?php echo $row['nacimiento'] ?></li>
                </ul>

            </div>


        </div>

        <div class="col-4">
            <h3 class="text-center me-5 me-5">Tus publicaciones</h3>
            <?php
            $idx = $row['id'];
            $sql = mysqli_query($conexion, "SELECT * FROM post p INNER JOIN users u ON
            p.idpost = u.id  WHERE id='$idx'");
            ?>

            <?php
            if (mysqli_num_rows($sql) > 0) { ?>
                <?php while ($datosUser = mysqli_fetch_array($sql)) { ?>

                    <div class="col-4 mt-3 ">

                        <div class="card-body shadow p-3  " style="width: 25rem;">

                            <div class="d-flex flex-row bd-highlight mb-3  rounded border border-1">
                                <div class="p-2 bd-highlight">

                                    <?php

                                    if ($row['foto']) { ?>
                                        <img class="img-fluid userimg" src="data:image/jpej;base64,<?php echo base64_encode($row['foto']); ?>" alt="">

                                    <?php } else { ?>
                                        <img src="./img/avatar.png" class="img-fluid userimg" alt="...">

                                    <?php    }

                                    ?>
                                    
                                </div>
                                <div class="p-2 bd-highlight"><?php echo $datosUser['name'] ?></div>
                                <div class="p-2 bd-highlight">° <i class="bi bi-globe2"></i></div>
                            </div>
                            <div class="card-body">
                            </div>

                            <ul class=" ">
                                <li class="list-group __whOver"><?php echo $datosUser['namepost'] ?> </li>
                                <li class="list-group __whOver"><?php echo $datosUser['descripcion'] ?></li>

                            </ul>
                            <img src="data:image/jpej;base64,<?php echo base64_encode($datosUser['avatar']); ?>" class="card-img-top " alt="...">

                        </div>
                    </div>
                <?php  } ?>

            <?php } else { ?>

                <h3 class="text-center">No tienes publicaciones</h3>
            <?php  }
            ?>

            <?php
            while ($datosUser = mysqli_fetch_array($sql)) { ?>
                <div class="col-4 mt-3 ">

                    <div class="card-body shadow p-3  " style="width: 25rem;">

                        <div class="d-flex flex-row bd-highlight mb-3  rounded border border-1">
                            <div class="p-2 bd-highlight"><img src="data:image/jpej;base64,<?php echo base64_encode($datosUser['foto']); ?> " class="img-fluid userimg" alt="..."></div>
                            <div class="p-2 bd-highlight"><?php echo $datosUser['name'] ?></div>
                            <div class="p-2 bd-highlight">° <i class="bi bi-globe2"></i></div>
                        </div>
                        <div class="card-body">
                        </div>

                        <ul class=" ">
                            <li class="list-group __whOver"><?php echo $datosUser['namepost'] ?> </li>
                            <li class="list-group __whOver"><?php echo $datosUser['descripcion'] ?></li>
                        </ul>
                        <img src="data:image/jpej;base64,<?php echo base64_encode($datosUser['avatar']); ?>" class="card-img-top" alt="...">

                    </div>
                </div>
            <?php  }

            ?>

        </div>
        <div class="col-4 shadow rounded rounded-2 mt-3 p-3">
            <form action="./updateperfil.php?id=<?php echo $row['id'] ?>" method="POST" enctype="multipart/form-data">
                <p class="text-center fs-2 fw-bold">Editar Perfil</p>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="foto" value="<?php echo base64_encode($row['foto']) ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">usuario:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $row['name'] ?>">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo:</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="correo" value="<?php echo $row['email'] ?>">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $row['telefono'] ?>">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="ciu" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="ciu" name="ciudad" value=" <?php echo $row['ciudad'] ?>">
                    <div id=" emailHelp" class="form-text">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="estci" class="form-label">Estado civil </label>
                    <input type="text" class="form-control" id="estci" name="escivil" value="<?php echo $row['estadocivil'] ?>">
                    <div id=" emailHelp" class="form-text">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="fna" class="form-label">Estado civil </label>
                    <input type="date" class="form-control" id="fna" name="fecha" value="<?php echo $row['nacimiento'] ?>">
                    <div id=" emailHelp" class="form-text">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="public">Guardar datos</button>
            </form>
        </div>


    </div>
</div>
<?php require_once("./footer.php") ?>