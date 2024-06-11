<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];


    $sql_check = "SELECT * FROM usuario WHERE nombre_usuario='$usuario' OR email='$email'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo "El nombre de usuario o el correo ya están en uso. Por favor elige otro.";
    } else {
       
        $sql = "INSERT INTO usuario (email, nombre_usuario, contrasena) VALUES ('$email', '$usuario', '$password')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../inicio.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
