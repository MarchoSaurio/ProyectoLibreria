<?php 

$servidor="localhost";
$clave="";
$base="libros";
$conn = new mysqli($servidor, "root", $clave);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$db = mysqli_select_db( $conn, $base ) or die ( "Upps! Pues va a ser que no se ha encontrado la base ");
$titulo= utf8_decode($_POST['titulo']);
$autores=utf8_decode($_POST['autores']);
$apublicacion=utf8_decode($_POST['apublicacion']);
$generos=utf8_decode($_POST['generos']);
$sinopsis=utf8_decode($_POST['sinopsis']);
$resenas=utf8_decode($_POST['resenas']);
//$Cantidad=utf8_decode($_POST['CANTIDAD']);
$portada=addslashes(file_get_contents($_FILES['portada']['tmp_name']));
$archivo = $_FILES["contenido"]["tmp_name"]; 
$tipo    = $_FILES["contenido"]["type"];

$sql ="INSERT INTO libros(titulo,autores,apublicacion,generos,sinopsis,resenas,portada) VALUES ('$titulo','$autores','$apublicacion','$generos','$sinopsis','$resenas','$portada');";
if (mysqli_query($conn, $sql)) {
  header("HTTP/1.1 200 OK");
      echo $conn->insert_id;
      exit();

}
?>