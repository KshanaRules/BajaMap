<?php @session_start(); ?>
<html>
<head>
    <title>BajaMap 0.1</title>
    <meta charset="utf-8">
    <link rel="stylesheet"  type="text/css" href="estilo.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <src="js/validaciones.js"></script>
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
            <?php
            if($_SESSION[usuario]==""){
            ?>
            <a href="iniciarSesion.php"> <img src="img/usuario.png" class="usuarioImgHidden">
                <img src="img/usuario.png" class="usuarioImg">
                <span> Iniciar sesión </span>
               </a>
               <p>&nbsp;</p>
                <a href="creaCuenta.php" class="creaCuenta"> <span> Crear cuenta</span></a>
            <?php }
             else{
             ?>
                <a href="cerrarSesion.php" class="creaCuenta"> <span> Cerrar sesión</span></a>
            <?php
             }
            ?>
        </section>
    </section>
    <section id="main">
     <div id="cajaLogin">
        <form action="#" class="formulario">
            <input type="email" name="usuario" id="usuario" placeholder="Usuario" autofocus>
            <input type="password" name="pass" id="pass" placeholder="Contraseña">
            <input type="button" value="iniciar" id="login" class="submit">
        </form>
        <a href="creaCuenta.php" class="creaCuenta"><span> Crear cuenta</span></a>

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