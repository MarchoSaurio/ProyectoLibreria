<?php 
session_start();
header('Content-Type: text/html; charset=UTF-8');
include "../config.php";
include "../utils.php";
$dbConn = connect($db);

// Obtener datos del formulario
$variable = $_POST['username'];
$password = $_POST['password'];

// Buscar el usuario en la base de datos
$Query = "SELECT * FROM usuarios WHERE nombre_us =:nombre_us OR email=:email";
$statement = $dbConn->prepare($Query);
$statement->bindValue(':nombre_us', $_POST['username']);
$statement->bindValue(':email', $_POST['username']);
$statement->execute();

if ($statement === false) {
    die("Error al ejecutar la consulta: " . $mysql->error);
}

$array = $statement->fetch(PDO::FETCH_ASSOC);
if ($statement->rowCount() > 0) {
    if (($variable == $array['email'] && $password == $array['password']) || ($variable == $array['nombre_us'] && $password == $array['password'])) {
        if ($array['administrador'] == 1) {
            header("Location: ../admin/usuarios.html");
        } else {
            header("Location: ../html/inicioUsuario.html");
        }
        exit;
    } else { 
        echo '<script>Alert("Nombre de usuario o contraseña incorrectos.");</script>';
    }
    exit;
} else {
    echo '<script>Alert("No existe el usuario");</script>';
    exit; 
}
?>
