<?php

if(count($_POST)>0){
	
	$usuario = new UsarioDatos();
	$usuario->primernombre = $_POST["nombre1"];
	$usuario->segundonombre = $_POST["nombre2"];
	$usuario->primerapellido = $_POST["apellido1"];
	$usuario->segundoapellido = $_POST["apellido2"];
	$usuario->puesto = $_POST["puesto"];
	$usuario->correo = $_POST["email"];	
	$usuario->telefono = $_POST["telefono"];	
	$usuario->fechaingreso = $_POST["fechaingreso"];	
	$usuario->nombreusuario = $_POST["nombreusuario"];
	$usuario->password = $_POST["contrasena"];
		
	$usuario->add();
	
print "<script>window.location='usuario.php';</script>";


}

?>



