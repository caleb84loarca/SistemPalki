
<?php
		try{
			$dbServidor = "C413BL04RK"; //Name of the server/instance, including optional port number (default is 1433)
			$dbNombre = "prueba"; //Name of the database
			$dbUsuario = "Admin_caleb"; //Name of the user
			$dbContrasena = "admin123"; //DB Password of that user

			//$conexion = new PDO("sqlsrv:Server=$dbServidor;Database=$dbNombre", $dbUsuario, $dbContrasena);
			
			$connectionInfo = array(
				"Database" => $dbName, 
				"UID" => $dbUser,
				"PWD" => $dbPassword
			);

			$conn = sqlsrv_connect($dbServidor, $connectionInfo);

		}catch (PDOException $e) {
			 	
			 	die("Error al conectar a SQL Server: ".$e->getMessage());

			 } //cierra catch		

if (empty($_POST["nombreusuario"]) || empty($_POST["password"]) )  {

		print "<script>window.location='/sistempalki/index.php';</script>";

	}else{		

			echo "Felicidades, conecto a SQL SERVER";		
			$usuario = $_POST["nombreusuario"];
			$contrasena = $_POST["password"];

			//$consulta= "select * from usuarios where usuario=".$usuario." and contrasena=".$contrasena;

			$consulta="select usuario,contrasena from usuarios where usuario='".$usuario."' and contrasena='".$contrasena."'";


			$query = sqlsrv_query($conexion, $consulta);			
			

			while ($fila = sqlsrv_fetch_array($query)) {
				if ($fila['usuario']==$_POST['nombreusuario'] && $fila['contrasena']==$_POST['password']) { 		

			//if( $query === false ) {
			//if ($fila>0) {		
				//header("location:../vistas/home.php");
				print "<script> window.location='../view/home.php'; </script>";
				
			} else {
					//header("location:../login.php");
					print "<script> window.location='/sistempalki/index.php'; </script>";

					
				}
		}
	
	sqlsrv_free_result($query);
	sqlsrv_close($conexion);
	}?>