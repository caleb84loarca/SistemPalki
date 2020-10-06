<?php 

session_start();


$nom = $_SESSION['nombre'];
$ape = $_SESSION['apellido'];


echo "variable de sesion : <br>";
echo "el nombre es : $nom <br> el apellido es: $ape";

echo "<a href='pagina3.php'> cerrar secion</a>";

 ?>