<?php
session_start();

$mensaje_error = ""; // Inicializamos la variable de mensaje de error

// Verificamos si se han enviado datos por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificamos si se han enviado los campos de correo y contraseña
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        // Aquí puedes realizar la conexión a la base de datos (debes reemplazar los valores con los de tu configuración)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "angy";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Recibimos los datos del formulario y eliminamos espacios en blanco
        $correo = trim($_POST["email"]);
        $contraseña = trim($_POST["password"]);

        // Preparamos la consulta SQL para buscar el correo y la contraseña en la tabla usuarios
        $consulta = "SELECT email, contrasena FROM usuario WHERE email = ?";

        // Preparamos la sentencia
        $sentencia = $conn->prepare($consulta);

        // Vinculamos los parámetros
        $sentencia->bind_param("s", $correo);

        // Ejecutamos la consulta
        $sentencia->execute();

        // Obtenemos el resultado
        $resultado = $sentencia->get_result();

        // Verificamos si hay al menos una fila en el resultado
        if ($resultado->num_rows > 0) {
            // Obtenemos la fila como un array asociativo
            $fila = $resultado->fetch_assoc();
            if ($contraseña == $fila["contrasena"]) {
                // Si la contraseña es válida, mostramos un mensaje de éxito

                $_SESSION["nombre_usuario"] = $correo;
                header('Location: prin3.html');
                exit();
            } else {
                // Si la contraseña no es válida, mostramos un mensaje de error
                $mensaje_error = "Correo o contraseña incorrectos. Por favor, inténtelo de nuevo.";
            }
        } else {
            // Si no se encontró ningún correo en la base de datos, mostramos un mensaje de error
            $mensaje_error = "Correo o contraseña incorrectos. Por favor, inténtelo de nuevo.";
        }

        // Cerramos la conexión
        $conn->close();
    } else {
        // Si no se enviaron los campos esperados, mostramos un mensaje de error
        $mensaje_error = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/inicio.css">
</head>
<body>

<main id="prin">
    <nav>
        <a href="registro.html" class="arriba">REGISTRARSE</a>
    </nav>

    <!-- Mostrar el mensaje de error o éxito -->
    <?php if ($mensaje_error): ?>
        <p><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="formu" method="post">
        <h4><b>¡Bienvenido!</b></h4>
        <p>Correo</p>
        <input class="control" type="email" name="email" id="Usuario" placeholder="Ingrese su correo">

        <p>Contraseña</p>
        <input class="control" type="password" name="password" id="Contra" placeholder="**********">

        <input type="submit" class="boton" value="Enviar">
    </form>

    <img src="img/logooo.png" class="logot" alt="">

    <video muted autoplay loop>
        <source src="videos/sallsa.mp4" type="video/mp4"> </video>
    <div class="capa"></div>
</main>
</body>
</html>
