<?php 

			$host = "localhost";
			$user = "root";
			$pass = "";
			$basedatos = "dbcontrolpalki";

		try {
				$conexion = mysqli_connect($host,$user,$pass,$basedatos);
								
				if (!$conexion) {

					echo "ERROR AL CONECTARSE A LA BASE DE DATOS ".mysql_error();
				
				} else {				
					
					$nombre = $_POST["nombreusuario"];
					$contrasena = $_POST["password"];

					$query = mysqli_query($conexion, "select * from usuario WHERE nombreusuario = '".$nombre."' and password = '".$contrasena."'");

					$found = false;

							while($r = $query->fetch_array()){
								$found = true ;
								$userid = $r['primernombre'];


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
	
	function conectarbd(){
		return $conexion;
	}
