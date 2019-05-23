<?php
function bd(){
    $conexion = mysqli_connect("localhost","root","12345678") or die("No se ha podido conectar a la base de datos");
    mysqli_errno($conexion) . ": " . mysqli_error($conexion) . "\n";
    return $conexion;
}

function existeUsuario($dato){
	$link = bd();
	mysqli_select_db($link,"matlab");
	echo $query ="select * from usuarios where usuario='$dato'";
	echo $res = mysql_query($query) or die("Eraaaror");	
	return $query;
}

function menu(){
?>
    <nav>
        <ul class="listaMenu">
            <li><a href="region.php"> Seleccionar región </a> </li>
            <li><a href="algoritmos.php?op=canny"> Algortimos </a></li>
            <li><a href="contactos.php"> Buscar contáctos</a></li>
            <li><a href="plis.php">Ayuda</a></li>  
        </ul>
    </nav>
    <section id="cintaVerde"></section>
<?php
}

function cargaRegiones(){
    $l = bd();
    mysqli_select_db($l,"matlab");
    $q ="select id,nombre,PATH from proyectos where idUsuarios='$_SESSION[id]'";
    $res = mysqli_query($l,$q) or die("Error");
    ?>
        <select name="seleccionaRegion">
    <?
    while($datos=mysqli_fetch_row($res)){
    ?>
        <option value=<?php echo $datos[0];?> > <?php echo $datos[1]; ?> </option>        
    <?php
    }
    ?>
        </select>
    <?php
}

function regresaRegion($id){
    $l = bd();
    mysqli_select_db($l, "matlab");
    $q = "select nombre from proyectos where id='$id'";
    $res = mysqli_query($l,$q) or die("Error");
    $datos = mysqli_fetch_row($res);
    return $datos[0];
}


function cargaProyectos(){
    $l = bd();
    mysqli_select_db($l,"matlab");
    //$q ="select id,nombre, descripcion from proyectos where idUsuarios='$_SESSION[id]' order by id";
    $q ="select p.id, p.nombre, p.descripcion, r.lat1,r.lat2,r.lon1,r.lon2 from proyectos p INNER JOIN regiones r ON p.id = r.idProyectos";//where idUsuarios='$_SESSION[id]' order by id";
    $res = mysqli_query($l,$q) or die("Error");
    while($datos=mysqli_fetch_row($res)){
?>
        <tr>
            <td>  <?php echo $datos[0];  ?> </td>
            <td>  <?php echo $datos[1];  ?> </td>
            <td>  <?php echo $datos[2];  ?> </td>
            <td>  <?php echo "[".$datos[3]." ".$datos[4]."]"?> </td>
            <td>  <?php echo "[".$datos[5]." ".$datos[6]."]"?> </td>
        </tr>
<?php        
    }
}
?>