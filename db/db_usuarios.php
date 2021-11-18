
<?php
include_once '../db/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
// $password = (isset($_POST['password']))&& $_POST['password'] != ''? $_POST['password']: null;
$idRol = (isset($_POST['idRol'])) ? $_POST['idRol'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
   //creacion ---------------------------------------------------
   case 1: 
      $consulta = "INSERT INTO usuarios (usuario, password, idRol) VALUES('$usuario', '$password', '$idRol') ";
      $resultado = $conexion->prepare($consulta);
      $resultado->execute();

      $consulta = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 1";
      $resultado = $conexion->prepare($consulta);
      $resultado->execute();
      $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
      break;

   //modificación ---------------------------------------------------
   case 2:
      
      if($idRol == 'Administrador' || $idRol == 1){
         $rol = 1;
      }else if($idRol == 'Colaborador' || $idRol == 2){
         $rol = 2;
      }

      if($password == ''){
         $consulta = "UPDATE usuarios SET usuario='$usuario', idRol='$rol'  WHERE id='$id' ";
      }else{
         $consulta = "UPDATE usuarios SET usuario='$usuario', password='$password', idRol='$rol'  WHERE id='$id' ";
      }

      $resultado = $conexion->prepare($consulta);
      $resultado->execute();
      
      $consulta = "SELECT * FROM usuarios WHERE id='$id' ";
      $resultado = $conexion->prepare($consulta);
      $resultado->execute();
      $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
      break;

   //eliminacion ---------------------------------------------------
   case 3:
      $consulta = "DELETE FROM usuarios WHERE id='$id' ";
      $resultado = $conexion->prepare($consulta);
      $resultado->execute();
      break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;

?>