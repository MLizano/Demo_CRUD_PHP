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
        
    </div>
</div>    
<!------------------------ ------- ------------------------>


<?php
include_once "bottom_part.php"
?>