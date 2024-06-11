<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "angy"; 

 
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recibir datos del formulario
    $nombre_sugerencia = $conn->real_escape_string(trim($_POST["nombre_sugerencia"]));
    $nombre_usuario = $conn->real_escape_string(trim($_POST["nombre_usuario"]));
    $mensaje = $conn->real_escape_string(trim($_POST["mensaje"]));

    // SQL para insertar los datos
    $sql = "INSERT INTO sugerencias (nombre_sugerencia, nombre_usuario, mensaje) VALUES ('$nombre_sugerencia', '$nombre_usuario', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../buzon.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
}
?>
