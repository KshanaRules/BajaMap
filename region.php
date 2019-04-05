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
  <div id="ubicacion">
    <button id="crearProyecto">Crear proyecto</button>
    <button id="verProyectos">Ver proyectos</button>
    <form  action="matlab.php" method="post" class="formularioRegion">
      <table>
        <tr>
          <td colspan="2"> Seleccionar proyecto <?php cargaRegiones(); ?> </td>
        </tr>
        <tr>
          <td><label> Latitud  </label></td> 
          <td><input type="text" name="La1" id="La1" value="20"> </td>
          <td><input type="text" name="La2" id="La2" value="25"> </td>
        </tr>
        <tr>
          <td><label> Longitud </label></td> 
          <td><input type="text" name="L1" id="L1" value="-110"></td>
          <td><input type="text" name="L2" id="L2" value="-100"></td>
        </tr>
        <tr>
          <td><label> Periodo  </label></td>
          <td><input type="text" name="fechaI" class="datepicker"></td>
          <td><input type="text" name="fechaF" class="datepicker"></td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" class="enviaRegion" value="generar"/>
          </td>
        </tr>
      </table>
    </form>
  </div>   
  <div id="despliegaImagen">
      <!--<img src="img/portada.png" class="imagenRegion">-->
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


<!-- INICIO: Ventana que se abre al presionar el botón crear proyecto -->
<div id="dialog-form" title="Crear nuevo proyecto">
  <p class="validateTips"> <span class="obligatorio"> * </span> Todos los campos son obligatorios</p>
   <form>
    <fieldset>
      <label for="name">Nombre</label>
      <input type="text" name="name" id="name" value="Bahía de La Paz" class="text ui-widget-content ui-corner-all">
      <label for="email">Descripción</label>
      <textarea rows="4" cols="35" name="email" id="email" class="text ui-widget-content ui-corner-all">
      </textarea> 
      <input type="button" id="prueba">
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>
<!-- FIN: Ventana que se abre al presionar el botón crear proyecto --> 
</body>
</html>