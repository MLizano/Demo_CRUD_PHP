<?php 
session_start();

//Si nadie inció sesión vuelve a la pag de Login
if ($_SESSION["s_usuario"] === null){
	header("Location: ../index.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="#" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../css/estilos.css" >

    <link rel="stylesheet" href="../plugins/sweetalert2.min.css" >
    
    
    <title>Login</title>
</head>
<body>

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

<!-- /////////////////////////////////////////////////////////// -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="../jquery/jquery-3.6.0.min.js"></script>
<script src="../popper/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../plugins/sweetalert2.all.min.js"></script>
<script src="../js/codigo.js"></script>
</body>
</html>