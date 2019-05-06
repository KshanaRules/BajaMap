<?php 
    @session_start(); 
    include ("funciones.php");
    echo $_SESSION[usuario];
?>    
<html>
<head>
  <title>BajaMap 0.1</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <link rel="stylesheet"  type="text/css" href="estilo.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="css/formulario.css"> 
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 

  <script> 
    $( function() {
      $(".datepicker" ).datepicker();
    });
  </script>
  <script src="funciones.js"></script>
  <script src="js/proyecto.js"> </script>  
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
      <?php 
    }
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
    <?php echo menu(); ?>
  </section>
  <section id="cintaVerde"></section>
  <div class="muestraProyectos">
  <br/>
    <table width= "90%" border="1">
      <tr>
        <th> Clave </th>
        <th> Proyecto </th>
        <th> Descripción </th>
        <th> Latitud </th>
        <th> Longitud </th>
        <th> Ver imágenes </th>
        <th> Descargar imágenes </th>
        <th> Descarga archivo .MAT </th>
      </tr>
      <?php cargaProyectos(); ?>
    </table> 
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