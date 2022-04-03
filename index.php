<?php


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./public/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <h1 class="__titleH1 text-center fw-bold shadow m-3 pb-3">Chatbook</h1>


    </div>
    <div class="container  mt-5">
        <div class="col">
        </div>
        <div class="row align-items-start">
            <div class="col">
                <img src="./asses/img/d6bf0c928b5a.jpg" alt="" class="card">

            </div>
            <div class="col"> <img src="./asses/img/images.jpg" alt="" class="card"></div>
            <div class="col">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">

                            <form action="./loginse.php" method="POST">
                                <p class="text-center fs-2 fw-bold">Iniciar sesión</p>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                                    <div id="emailHelp" class="form-text"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">password</label>
                                    <input type="password" class="form-control" name="pass"">
                                </div>

                                <button type="submit" class="btn btn-primary" name="login">Submit</button>
                            </form>
                        </div>
                        <div class="card">
                            <p class="text-center fs-5 m-3">¿No tienes cuenta?<a href="./register.php">Registrate</a> </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <h3 class="text-center mt-3">Disfruta y diviertete Comienzá ahora</h3>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>