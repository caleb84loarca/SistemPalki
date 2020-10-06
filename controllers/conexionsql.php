<?php 

		try{

			$dbServidor = "localhost"; //Name of the server/instance, including optional port number (default is 1433)
			$dbNombre = "prueba"; //Name of the database
			$dbUsuario = "Admin_caleb"; //Name of the user
			$dbContrasena = "admin123"; //DB Password of that user

			$conn = new PDO("sqlsrv:Server=$dbServidor;Database=$dbNombre", $dbUsuario, $dbContrasena);

		}catch (PDOException $e) {
			 	
			 	die("Error al conectar a SQL Server: ".$e->getMessage());

			 } 

			 echo "Felicidades, conecto a SQL SERVER";
			

if (!$_POST["nombreusuario"] || !$_POST["password"]) {
	# code...
	print "<script>window.location='index.php';</script>";
}else{

				$usuario = $_POST["nombreusuario"];
				$contrasena = $_POST["password"];


				$query=$conn-> prepare("select * from usuarios where usuario='".$usuario."' and contrasena='".$contrasena."'");

				//$query="select * from usuarios where usuario='".$usuario."' and contrasena='".$contrasena."'";						
				

				$stmt = sqlsrv_query($conn, $query);

				
				//$found = false;


					while(sqlsrv_fetch_array($stmt)===true){
									
						//$found = true ;
						
												
						$userid = sqlsrv_get_field($stmt,0);

						
						echo $userid;
	}					

/*

							if($found==true) {

										$_SESSION['user_id']=$userid;

										print "Cargando ... $userid";
										
										print "<script>window.location='../view/home.php';</script>";
							}else 	{
										
											print "<script>window.location='index.php';</script>";
									}              */
					}   //cierra while

						

 ?>