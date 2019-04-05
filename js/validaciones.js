/**
 * Created by Tuxurón on 15/09/2016.
 */

function validaRegistroUsuario() {
   var x=0;
   if($("#nombre").val()!="" && $("#usuario").val()!="" && $("#email").val()!="" && $("#emailR").val()!="" && $("#institucion").val()!="" && $("#pais").val()!="" && $("#ciudad").val()!="")
        x=1;

   return x;
}