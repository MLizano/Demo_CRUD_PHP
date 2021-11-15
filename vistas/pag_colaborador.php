<?php 
session_start();

//Si nadie inció sesión vuelve a la pag de Login
if ($_SESSION["s_usuario"] === null){
	header("Location: ../index.php");
}

?>

<?php
include "top_part.php"
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <div class="jumbotron">

            <h1 class="display-4 text-center">Permisos</h1>

            <h2 class="text-center">Usuario: <span class="badge badge-success"><?php echo $_SESSION["s_usuario"];?></span></h2>  

            <p class="lead text-center">Usted NO tiene permisos de ADMINISTRADOR</p>

            <h2 class="text-center">Su permiso es: <span class="badge badge-warning"><?php echo $_SESSION["s_rol_descripcion"];?></span></h2>  
            <hr class="my-4">          
            <a class="btn btn-danger btn-lg" href="../db/logout.php" role="button">Cerrar Sesión</a>

        </div>
        </div>
    </div>
</div>      

<?php
include_once "bottom_part.php"
?>