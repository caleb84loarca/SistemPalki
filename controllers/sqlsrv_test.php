<?php 

try{

	$dbServer = "localhost"; //Name of the server/instance, including optional port number (default is 1433)
	$dbName = "prueba"; //Name of the database
	$dbUser = "Admin_caleb"; //Name of the user
	$dbPassword = "admin123"; //DB Password of that user

	$connectionInfo = array(
		"Database" => $dbName, 
	    "UID" => $dbUser,
	    "PWD" => $dbPassword
	);

	$conn = sqlsrv_connect($dbServer, $connectionInfo);
	//$conn = new PDO("sqlsrv:Server=$dbServer;Database=$dbName", $dbUser, $dbPassword);

}catch (PDOException $e) {
	 	
	 	die("Error al conectar a SQL Server: ".$e->getMessage());
	 } 

	 echo "Felicidades, conecto a SQL SERVER";

	
		$usuario = $_POST["nombreusuario"];
		$contrasena = $_POST["password"];

		$query ="select * from usuarios where usuario ='".$usuario."' and contrasena='".$contrasena."'";
		
$stmt = sqlsrv_query($conn, $query);

echo "<br>";
var_dump($stmt);

echo "<br>".$stmt;

if( $stmt === false ) {
	die( print_r( sqlsrv_errors(), true));
}

print "<script> window.location='../view/home.php'; </script>";


 ?>