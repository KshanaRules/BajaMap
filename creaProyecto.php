<?php

@session_start(); 
include ("funciones.php");

$PATH = "proyectos/".$_SESSION['usuario']."/".$_POST[proyecto];


if(!file_exists($PATH)) {
	mkdir("proyectos/".$_SESSION['usuario']."/".$_POST[proyecto]);

    $l = bd();
    mysqli_select_db($l,"matlab");

    $q ="insert into proyectos(idUsuarios,nombre,descripcion,PATH) values($_SESSION[id],'$_POST[proyecto]','$_POST[descripcion]','$PATH')";
    mysqli_query($l,$q) or die("Erroxxr");
	
	echo "proyectoOK";
}
else
	echo "proyectoExistente";

/*include ("funciones.php");

//echo $validaUsuario = existeUsuario($_POST[usuario]);

if (!$validaUsuario){
	$link = bd();
	mysqli_select_db($link,"matlab");
	$query="insert into usuarios(usuario,pass,correo,nombre,institucion,pais,ciudad) values('$_POST[usuario]','$_POST[pass]','$_POST[email]','$_POST[nombre]','$_POST[institucion]','$_POST[pais]','$_POST[ciudad]')";
	$carpeta = $_POST[usuario];

	if (!file_exists("proyectos/$carpeta"))
	mkdir("proyectos/$carpeta");

	$res = mysqli_query($link,$query) or die("Erroxxr");

	if($res)
		echo "Success";
}
else
	echo "El nombre de usuario ya existe";	*/
?>