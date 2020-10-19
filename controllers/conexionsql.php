<?php 

		try{
			$dbServidor = "C413BL04RK"; //Name of the server/instance, including optional port number (default is 1433)
			$dbNombre = "prueba"; //Name of the database
			$dbUsuario = "Admin_caleb"; //Name of the user
			$dbContrasena = "admin123"; //DB Password of that user

			//$conn = sqlsrv_connect($dbServer, $connectionInfo);
			$conn = new PDO("sqlsrv:Server=$dbServidor;Database=$dbNombre", $dbUsuario, $dbContrasena);

		}catch (PDOException $e) {
			 	
			 	die("Error al conectar a SQL Server: ".$e->getMessage());

			 } //cierra catch		

if (empty($_POST["password"]) )  {

		print "<script>window.location='/sistempalki/index.php';</script>";

	}else{
 				echo "Felicidades, conecto a SQL SERVER";
 				
				$usuario = $_POST["nombreusuario"];
				$contrasena = $_POST["password"];

				$select="select * from usuarios where usuario='".$usuario."' and contrasena='".$contrasena."'";


				//$sql=sqlsrv_prepare($conn, $select);
				$sql=sqlsrv_query($conn, $select);
				$found = false;
																						
					if( sqlsrv_fetch_array($sql) ) {
						
						$found = true;

						//$_SESSION['nombre1']=$userid;
						
						//print "Cargando ... $userid";
										
						print "<script> window.location='../view/home.php'; </script>";
					}else {
							
							print "<script> window.location='/sistempalki/index.php'; </script>";
							 die( print_r( sqlsrv_errors(), true));
			    
						}              
							
		}//cierra else
 ?>