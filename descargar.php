<?php @session_start(); ?>
<html>
<head>
    <title>BajaMap 0.1</title>
    <meta charset="utf-8">
    <link rel="stylesheet"  type="text/css" href="estilo.css"
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $(".datepicker" ).datepicker();
        } );
    </script>

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
                    <span> Iniciar sesión </span    >
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
            <ul class="listaMenu">
                <li><a href="region.php" class="actual"> Seleccionar región </a> </li>
                <li><a href="verRegion.php">ver regiones</a></li>
                <li><a href="contactos.php"> Buscar contáctos</a></li>
                <li><a href="plis.php">Ayuda</a></li>
            </ul>
        </section>
        <section id="cintaVerde"></section>
        <div id="ubicacion">
            <form  action="matlab.php" method="post" class="formularioRegion">
                <table>
                <tr><td><label> Latitud  </label></td> <td><input type="text" name="La1" id="La1">  </td><td><input type="text" name="La2" id="La2">  </td></tr>
                <tr><td><label> Longitud </label></td> <td><input type="text" name="L1" id="L1"></td><td><input type="text" name="L2" id="L2"></td></td>
                <tr><td><label> Periodo  </label></td>
                        <td><input type="text" name="fechaI" class="datepicker"></td>
                        <td><input type="text" name="fechaF" class="datepicker"></td>
                </tr>
                <tr><td colspan="3"><input type="submit" class="enviaRegion" value="generar"/></td></tr>

                </table>
            </form>
        </div>
        <div id="despliegaImagen">
            <img src="admin/2015012.png" class="imagenRegion">
            <a href="descargar.php"> <img src="img/imagen.png" class="downImg" alt="Descargar imagen"> </a>
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
