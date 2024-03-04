<?php 

require_once "../controllers/BaseDatos.php"; 

	$base = new BaseDatos();    
	$conexion = $base->getCon();

if (!$conexion){
   
  echo "error en conexion <br>";       
    die(print_r(sqlsrv_errors(), true)); 
}else{   

    
    $nombre= $_POST['nombreusuario'];
    $pass= $_POST['password'];

    $sql = "SELECT * FROM usuario where nombre1='$nombre' and contrasena = '$pass'";

    if(($result = sqlsrv_query($conexion,$sql)) !== false){
       
        while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ) {

            echo "conexion exitosa!!";
            echo $row['id_usuario']." - ".$row['nombre1'].", ".$row['apellido1'].", ".$row['tipo_usario_id_tipousuario']."<br />";

            session_start();
            $_SESSION['nombre'] = $row['nombre1'];
            $_SESSION['apellido'] = $row['apellido1'];
            $_SESSION['idusuario'] = $row['id_usuario'];
            $_SESSION['tipoUsuario'] = $row['tipo_usario_id_tipousuario'];
            
            print "<script> window.location='../view/home.php'; </script>";

        }        
    }
    echo "Usuario no encontrado, conexion fallida!!";

    print "<script> window.location='../index.php'; </script>";

}

 ?>