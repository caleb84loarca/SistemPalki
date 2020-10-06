
<?php

$server="C413BL04RK"; 
$database="prueba"; 
$user="Admin_caleb"; 
$password="admin123"; 

$cn=odbc_connect("Driver={SQL Server};Server=$server;Database=$database;", $user, $password); 

//tomamos los post del fromulario que seria para el login 
$usuario = $_POST["nombreusuario"];
$contrasena = $_POST["password"];

echo var_dump($usuario);
echo var_dump($contrasena);
//la consulta para verificar si existe el usuario 
//ejecutamos la consulta 
$SQL=odbc_exec($cn,"select * from usuarios where usuario='".$usuario."' and contrasena='".$contrasena."'"); 
//lo ejecutamos y lo pedidos que nos retorne los datos en array 
$row= odbc_fetch_array($SQL); 
//conteo de registro si ahi mas de 1 va a pasar 
if (odbc_num_rows($SQL))
{ 
$data[estado]="ok"; 
$_SESSION["id"]=$row["id"]; 
$_SESSION["usuario"]=$row["usuario"]; 
}
else 
{
$data[estado]="error"; 
} 