<?php
session_start();

// Verificamos si el usuario está logueado
if (!isset($_SESSION["nombre_usuario"])) {
    // Si no está logueado, redirigir a la página de inicio de sesión
    header("Location: inicio_sesion.php");
    exit();
}

// Obtener el nombre de usuario desde la sesión
$nombre_usuario = $_SESSION["nombre_usuario"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzon de sugerencias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/buzon.css">
    <style>      
        body{
        background-image: url(img/bu.png);
        background-size: cover;
        }
        input{
    color: white;
}
.k{
width: 900px;
height: 50px;
color: white;
background-color: #171717;
border-radius: 10px;
border-color: white;


}
    </style>
</head>
<body>

<header>
        <a class="cs" href="cerrar.php">Cerrar Sesión</a>
        <a class="abrr" href="prin3.html" >Página principal</a>
        <button id="abrir" class="abrir-menu"><i class="bi bi-list"></i></button>
        <nav class="nav" id="nav">
            <button class="cerrar-menu" id="cerrar"><i class="bi bi-x"></i></button>
            <ul class="nav-list">
                <li><a href="historia.html">Historia</a></li>
                <li><a href="horario.html">Horarios </a></li>
                <li><a href="menu.html">Menú</a></li>
                <li><a href="buzon.php">Buzon de sugerencias</a></li>
                <li><a href="reseñas.php">Reseñas</a></li>
                <li><a href="ubi.html">Ubicación</a></li>
            </ul>
        </nav>
    </header>
    

    <img class="ima" src="img/logooo.png" alt="">

    <div class="container">
        <h1>B UZ Ó N  D E S UG E R E N C IA S </h1><br>



            
        <h2>¿ A l g o   n o    s u r g i ó   c o m o   e s p e r a b a s ?   C u é n t a n o s
            </h2>

    </div>
  


 
        <h1>Formulario de contacto</h1>
    

        <div class="con">
            <form action="registr e inicio de sesioon/enviar2.php" method="post">
                <label for="nombre_sugerencia">Nombre:</label>
                <input type="text" id="nombre_sugerencia" name="nombre_sugerencia" required class="k">
                <br>
                <input type="hidden" id="nombre_usuario" name="nombre_usuario" value="<?php echo htmlspecialchars($nombre_usuario); ?>">
                <label for="mensaje">Mensaje:</label>
                <input type="text" id="mensaje" name="mensaje" required class="k">
                <br>
                <input type="submit" value="Enviar" class="boton">
            </form>
        </div>
            
    

    <footer>
      

        <div class="dere">
            <small> &copy; 2024 <b>Taqueria Don Sirloin.</b> Todos los Derechos Reservados. Hecho con <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-balloon-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8.49 10.92C19.412 3.382 11.28-2.387 8 .986 4.719-2.387-3.413 3.382 7.51 10.92l-.234.468a.25.25 0 1 0 .448.224l.04-.08c.009.17.024.315.051.45.068.344.208.622.448 1.102l.013.028c.212.422.182.85.05 1.246-.135.402-.366.751-.534 1.003a.25.25 0 0 0 .416.278l.004-.007c.166-.248.431-.646.588-1.115.16-.479.212-1.051-.076-1.629-.258-.515-.365-.732-.419-1.004a2 2 0 0 1-.037-.289l.008.017a.25.25 0 1 0 .448-.224l-.235-.468ZM6.726 1.269c-1.167-.61-2.8-.142-3.454 1.135-.237.463-.36 1.08-.202 1.85.055.27.467.197.527-.071.285-1.256 1.177-2.462 2.989-2.528.234-.008.348-.278.14-.386"/>
              </svg>por WebSite </small>
        </div> 

  <img class="taq" src="img/taq2.png" alt="">

    </footer>
    <script src="js/historia.js"></script>
</body>
</html>