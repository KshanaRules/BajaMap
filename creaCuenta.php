<?php
    include("funciones.php");
?>

<html>
<head>
    <title>BajaMap 0.1</title>
    <meta charset="utf-8">
    <link rel="stylesheet"  type="text/css" href="estilo.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/validaciones.js"></script>
    <script src="js/funciones.js"></script>
    <script type="text/javascript">
        window.onload = inicio;
    </script>
</head>
<body>
<section id="wrap">
    <section id="cabeza">
        <img src="img/local.png" class="logo">
        <section id="usuarioLogin">
           <a href="iniciarSesion.php"> <img src="img/usuario.png" class="usuarioImgHidden">
            <img src="img/usuario.png" class="usuarioImg">
            <span> Iniciar sesión </span>
           </a>
           <p>&nbsp;</p>
            <a href="creaCuenta.php" class="creaCuenta"> <span> Crear cuenta</span></a>

        </section>
    </section>
    <section id="main">
     <div id="cajaRegistro">
        <form action="#" class="formulario">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" autofocus>
            <input type="text" name="usuario" id="usuario" placeholder="Usuario" >
            <input type="password" name="pass" id="pass" placeholder="Contraseña">
            <input type="email" name="email"  id="email" placeholder="Correo electónico">
            <input type="email" name="emailR" id="emailR" placeholder="Repetir correo electónico">
            <hr/>
            <input type="text" name="institucion" id="institucion" placeholder="Institución">
            <input type="text" name="pais"  id="pais" placeholder="País">
            <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad">
            <hr/>
            <input type="button" value="Registrar" class="submit" id="registraUsuario">
        </form>

     </div>
    </section>
    <section id="socialMedia">
        <a href="https://www.twitter.com/" target="_blank"><img src="img/gorjeo.png" class="redes"> </a>
        <a href="https://www.facebook.com/" target="_blank"><img src="img/facebook.png" class="redes"></a>
    </section>
    <footer>
        BajaMap v0.1 <br/>
        2016

    </footer>
</section>
</body>
</html>
