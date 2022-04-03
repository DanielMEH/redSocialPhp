<?php

require_once("../db/conexion.php");
$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
$id = $_GET['id'];
$name = $_POST['name'];
$email = $_POST['correo'];

$telefono = $_POST['tel'];
$ciudad = $_POST['ciudad'];
$ecivil = $_POST['escivil'];
$fecha = $_POST['fecha'];

$sqlUpdate = mysqli_query($conexion, "UPDATE users SET name='$name', email='$email',  foto='$foto', telefono='$telefono', ciudad='$ciudad', estadocivil='$ecivil', nacimiento='$fecha' WHERE id='$id'");
if ($sqlUpdate) { ?>
<style>
    .__navAlert{

        display: block;
        width: 50%;
        height: 130px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 4px;
        box-shadow: 0px 0px 10px .3px #ccc;
    }
    .__texth{
        display: block;
        text-align: center;
        margin: 5px;
        border-bottom: 1px solid #ccc;
    }
    .__link a{

        display: block;
        width: 20%;
        margin: auto 5px;
        background: #2a2a2a;
        text-align: center;
        color: white;
        font-size: 1.2rem;
        border-radius: 4px;
        cursor: pointer;

    }
</style>


    <div class="__navAlert">
        <div class="__texth">
            <h2>Tus datos de acrualizaron</h2>
        </div>
        <div class="__link">
            <a href="./perfil.php?id=<?php echo $id  ?>">Volver</a>
        </div>

    </div>
<?php } else {

    echo "
            <script>
            alert('Hubo un error intenta de nuevo');
            window.location = './perfil.php';
            </script>
            ";
    exit();
}







?>