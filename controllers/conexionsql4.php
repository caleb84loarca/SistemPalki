<?php

$dbServer = "localhost"; //Name of the server/instance, including optional port number (default is 1433)
$dbName = "prueba"; //Name of the database
$dbUser = "Admin_caleb"; //Name of the user
$dbPassword = "admin123"; //DB Password of that user

$conn_array = array (   
		"Database" => $dbName, 
	    "UID" => $dbUser,
	    "PWD" => $dbPassword	
);

$conn = sqlsrv_connect($dbServer, $conn_array);

if ($conn){
    echo "conexion exitosa!!";
    if(($result = sqlsrv_query($conn,"SELECT * FROM usuarios where usuario='admin' and contrasena = 'admin'")) !== false){

       
        while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ) {
            echo $row['usuario'].", ".$row['contrasena']."<br />";
            print "<script> window.location='../view/home.php'; </script>";
        }

    }
}else{
    print "<script> window.location='../sistempalki/index.php'; </script>";
    die(print_r(sqlsrv_errors(), true));
}
sqlsrv_close($conn);
?>