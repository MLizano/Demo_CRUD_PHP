
<?php
include_once '../db/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
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
      $consulta = "UPDATE usuarios SET usuario='$usuario', idRol='$idRol', password='$password'  WHERE id='$id' ";		
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