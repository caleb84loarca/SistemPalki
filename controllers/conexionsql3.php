<?php 

require_once "../controllers/BaseDatos.php"; 

	$base = new BaseDatos();    
	$conexion = $base->getCon();

if (!$conexion){
   
  echo "error en conexion <br>";       
    die(print_r(sqlsrv_errors(), true)); 
}else{   

    echo "conexion exitosa!!";

    $nombre= $_POST['nombreusuario'];
    $pass= $_POST['password'];

    $sql = "SELECT * FROM usuarios where usuario='$nombre' and contrasena = '$pass'";

    if(($result = sqlsrv_query($conexion,$sql)) !== false){
       
        while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ) {

            echo $row['usuario'].", ".$row['contrasena']."<br />";
            print "<script> window.location='../view/home.php'; </script>";

        }
        
    }

    print "<script> window.location='../index.php'; </script>";

}

 ?>