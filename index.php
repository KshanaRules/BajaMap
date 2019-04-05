<?php 
    @session_start(); 
    include ("funciones.php");
?>
<html>
<head>
    <title>BajaMap 0.1</title>
    <meta charset="utf-8">
    <link rel="stylesheet"  type="text/css" href="estilo.css"
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="js/funciones.js"></script>
    <script>
        window.onload =inicio;
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
        <section id="menu">
            <?php 
                echo menu();
            ?>
        </section>
        <section id="cintaVerde"></section>
        <p>&nbsp;</p>
         <span class="mensajeInicio" >  Aplicación cliente-servidor para el tratamiento de imágenes de temperatura superficial del mar </span>
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
