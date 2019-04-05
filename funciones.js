/**
 * Created by Tuxurón on 15/09/2016.
 */
function iniciaAjax() {
    var xhttp;
    if (window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } 
    else {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xhttp;
}

function inicio() {
    $("#registraUsuario").click(registraUsuario);
    $("#login").click(login);
	$("#prueba").click(prueba);
	$("#submenu").hover(function(){
    $(".sub-menu").show();}, function(){ $(".sub-menu").hide();});
	$("#PP").click(prueba);			
 }


function prueba() {
    alert("ueps");
}

function prueba2() {
    alert("Hola, ¿qué hace?");
    prueba();
}

function crearProyecto(proyecto,descripcion){
    a = iniciaAjax();
    a.onreadystatechange = muestraContenido;
    a.open('POST', 'creaProyecto.php', true);
    a.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    a.send("proyecto="+proyecto+"&descripcion="+descripcion);
}

function cadena() {
    return "nombre=" + $("#nombre").val() +
        "&usuario=" + $("#usuario").val() +
        "&pass=" + $("#pass").val() +
        "&email=" + $("#email").val() +
        "&institucion=" + $("#institucion").val() +
        "&pais=" + $("#pais").val() +
        "&ciudad=" + $("#ciudad").val() +
        "&nocache=" + Math.random();
}

function cadenaLogin() {
    return "usuario=" + $("#usuario").val() +
        "&pass=" + $("#pass").val() +
        "&nocache=" + Math.random();
}

function registraUsuario() {
    if(validaRegistroUsuario()){
        a = iniciaAjax();
        a.onreadystatechange = muestraContenido;
        a.open('POST', 'alta.php', true);
        a.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var datos  = cadena();
        a.send(datos);
    }
    else{
        alert("Capture todo los campos");
    }
}

function  login() {
    a = iniciaAjax();
    a.onreadystatechange = traslada;
    a.open('POST','login.php',true);
    a.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var datos  = cadenaLogin();
    a.send(datos);
}

function muestraContenido() {
    if(a.readyState == 4) {
        if(a.status == 200) {			
 			if(a.responseText=="Success"){
				alert("Usuario registrado con éxito");
				$("#wrap").load("iniciarSesion.php");
			}
            else if(a.responseText=="proyectoOK"){
                alert("Proyecto creado con éxito");
                window.location.href="region.php";
            }
            else if(a.responseText=="proyectoExistente"){
                alert("El proyecto ya existe");
                window.location.href="region.php";
            }
            else
                alert(":O");
		}
    }
}

function traslada() {
    if(a.readyState == 4) {
        if(a.status == 200) {
            if(a.responseText=="ksh"){
                alert("Ingreso exitoso");
                //window.location.href('index.php');
                $("#wrap").load("index.php");
            }
            else
                alert("Datos incorrectos");
        }
    }
}

function cadenaLogin() {
    return "usuario=" + $("#usuario").val() +
        "&pass=" + $("#pass").val() +
        "&nocache=" + Math.random();
}

function submenu(){

}