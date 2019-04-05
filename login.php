<?php
    @session_start();
    include ("funciones.php");
    $l = bd();
    mysqli_select_db($l,"matlab");
    $q ="select id,usuario from usuarios where usuario='$_POST[usuario]' AND pass='$_POST[pass]'";
    $r = mysqli_query($l,$q);
    $d = mysqli_fetch_row($r);

    if(mysqli_affected_rows($l)){
        $_SESSION['id']=$d[0];
        $_SESSION['usuario']=$d[1];        
        echo "ksh";
    }
    else
        echo "Datos incorrectos";
?>