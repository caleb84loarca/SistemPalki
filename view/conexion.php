<?php 

$host = "localhost";
$user = "root";
$pass = "";
$basedatos = "dbcontrolpalki";


$con = mysqli($host,$user,$pass,$basedatos);

if (!$con) {

	die("No hay conexion".mysqli_error()) ;
}

$nombre = $_POST["nombreusuario"];
$contrasena = $_POST["password"];

$query = mysqli_query($conexion, "select * from usuario WHERE nombreusuario = '".$nombre."' and password = '".$contrasena."'");

$nr = mysql_num_rows($query);

if ($nr == 1) {
	
	header("window.location = '../view/home.php'");
	print "<script>window.location='../view/home.php';</script>";	

}


 ?>