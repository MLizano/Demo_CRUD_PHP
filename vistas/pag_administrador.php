<?php 
session_start();

//Si nadie inció sesión vuelve a la pag de Login
if ($_SESSION["s_usuario"] === null){
	header("Location: ../index.php");
}else{
    if($_SESSION["s_idRol"]!=1){
        header("Location: pag_colaborador.php");
    }
}
?>

<?php
include_once "top_part.php"
?>


<!------------------------ content ------------------------>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">

            <h1 class="display-4 text-center">¡Bienvenido!</h1>

            <h2 class="text-center">Usuario: <span class="badge badge-success"><?php echo $_SESSION["s_usuario"];?></span></h2>    

            <p class="lead text-center">Esta es la página de inicio, luego de un LOGIN correcto.</p>
            <hr class="my-4">
            </div>
        </div>
    </div>
</div> 
<!------------------------ ------- ------------------------>


<?php
include_once "bottom_part.php"
?>