<?php
session_start();
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// print_r($conexion);

// Recepción de los datos enviados mediante POST desde el JS   
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

// $password = md5($password);   //criptografia con 128 bits / 32 valores exadecimales
// insert into usuarios (usuario, password) values ('admin', MD5('admin'));

$consulta = "SELECT usuarios.idRol AS idRol, roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol = roles.id WHERE usuario='$usuario' AND password='$password' ";	
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 


if($resultado->rowCount() >= 1){ 
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);    
    $_SESSION["s_usuario"] = $usuario;    
    $_SESSION["s_idRol"] = $data[0]["idRol"];
    $_SESSION["s_rol_descripcion"] = $data[0]["rol"];
}else{
    $_SESSION["s_usuario"] = null;  
    $data=null;
}

print json_encode($data);//envio el array final el formato json a AJAX
$conexion=null;