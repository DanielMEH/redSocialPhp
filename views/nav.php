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

    ?>

 <?php require_once("./estilos.php") ?>
 <?php
    require_once("../db/conexion.php");
    $sqli = mysqli_query($conexion, "SELECT * FROM users WHERE email='$datos'");
    $row = mysqli_fetch_array($sqli);
    $idperfil = $row['id'];
    // echo $row['email'];
    // echo $row['name'];

    ?>
 <?php require_once("./nav.php") ?>
 <div class="container">
     <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-2">
         <div class="container-fluid">
             <a class="navbar-brand" href="home.php">
                 <h1 class="__titleH1 text-center fw-bold  m-3 pb-3">ChatBook</h1>
             </a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                     <li class="nav-item" title="Inicio">
                         <a href="./home.php?id=<?php echo $row['id']; ?>" class="nav-link active fs-3" aria-current="page" href="home.php"><i class="bi bi-house-door-fill" class=""></i></a>
                     </li>
                     <li class="nav-item" title="subir publicacion">
                         <a class="nav-link  fs-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                             <i class="bi bi-plus-circle-fill"></i></a>

                         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">chatBook</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">

                                         <form action="../post.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
                                             <p class="text-center fs-2 fw-bold">Publicacion</p>
                                             <div class="mb-3">
                                                 <input type="hidden" name="iduser" value="<?php echo $row['id']; ?>">
                                                 <label for="exampleInputEmail1" class="form-label">nombre</label>
                                                 <input type="text" class="form-control" id="exampleInputEmail1" name="namepu">
                                                 <div id="emailHelp" class="form-text"></div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="desc" class="form-label">Descripción</label>
                                                 <textarea class="form-control" placeholder="ingrese una descripcion" id="desc" name="descrip" style="height: 100px"></textarea>
                                                 <div id="emailHelp" class="form-text"></div>
                                             </div>
                                             <div class="mb-3">
                                                 <label for="exampleInputPassword1" class="form-label">Imagen</label>
                                                 <input type="file" class="form-control" id="exampleInputPassword1" name="image">
                                             </div>

                                             <button type="submit" class="btn btn-primary" name="public">publicar</button>
                                         </form>

                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                                     </div>
                                 </div>
                             </div>
                         </div>

                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             <h5>Hola: <?php echo $row['name'] ?></h5>
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <li><a class="dropdown-item fs-6" href="./perfil.php?id=<?php echo $row['id']; ?>"><i class="bi bi-person-check-fill"></i> Perfil</a></li>
                             <li><a class="dropdown-item fs-6" href="../cerrarsesion.php"><i class="bi bi-lock-fill"></i> Cerrar sesión</a></li>
                             <li>
                             <li><a class="dropdown-item fs-6" href="$"><i class="bi bi-bookmark-fill"></i> Guardado</a></li>
                             <li>
                                 <hr class="dropdown-divider">
                             </li>
                             <li><a class="dropdown-item fs-6" href="#"><i class="bi bi-arrow-left-right"></i> Cambiar cuenta</a></li>
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link disabled"></a>
                     </li>
                 </ul>
                 <form class="d-flex">
                     <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-success" type="submit">Search</button>
                 </form>
             </div>
         </div>
     </nav>
 </div>