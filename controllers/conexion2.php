<?php 

	$dbServidor = "C413BL04RK"; //Name of the server/instance, including optional port number (default is 1433)
	$dbNombre = "prueba"; //Name of the database
	$dbUsuario = "Admin_caleb"; //Name of the user
	$dbContrasena = "admin123"; //DB Password of that user

	try {
		$conexion = new PDO("sqlsrv:Server=$dbServidor;Database=$dbNombre", $dbUsuario, $dbContrasena);
								
			if (!$conexion) {

				echo "ERROR AL CONECTARSE A LA BASE DE DATOS ".sqlsrv_error();
				
			} else {				
					
			$nombre = $_POST["nombreusuario"];
			$contrasena = $_POST["password"];

			$query = sqlsrv_query($conexion, "select * from usuarios WHERE usuario = '".$nombre."' and contrasena = '".$contrasena."'");

			$found = false;

			while($r = $query->sqlsrv_fetch_array()){
				$found = true ;
				$userid = $r['nombre1'];

					if($found==true) {

						$_SESSION['user_id']=$userid ;

						print "Cargando ... $userid";
								
						print "<script>window.location='../view/home.php';</script>";
					}else {
								
						print "<script>window.location='index.php';</script>";
									}
					}//cierra while				
				}// cierra else	
		}catch (Exception $e) {
				die('connection_aborted()'.$e);
			}