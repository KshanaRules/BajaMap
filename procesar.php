<?php
    @session_start();
    include("funciones.php");

    echo $_REQUEST['algoritmo'];
    $usuario = $_SESSION[usuario];
    $inputDir  = "C:\\AppServ\\www\\bajaMap";
 
    $idUsuario = regresaIdUsuario($_SESSION[usuario]);
    $region = regresaRegion($_REQUEST[seleccionaRegion]);    
    $datos = datosRegiones($_REQUEST[seleccionaRegion],$idUsuario);
    echo $datos."-";

    echo $lat1 = $datos[3];
    echo "<br/>";
    echo $lat2 = $datos[4];
    echo "<br/>";
    echo $lon1 = $datos[5];
    echo "<br/>";
    echo $lon2 = $datos[6];
    echo "<br/>";
    echo $fechaI = $datos[7];
    echo "<br/>";
    echo $fechaF = $datos[8];
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";



    $fecha = explode('-',$fechaI);
    //$fechaI = $fecha[2]."-".$fecha[0]."-".$fecha[1];
    echo $fecha[0];
    echo $fecha[1];
    echo $fecha[2];
    if($fecha[0]==2016) $ban=1;
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    $fecha2 = explode('-',$fechaF);
    //$fechaF = $fecha2[2]."-".$fecha2[0]."-".$fecha2[1];
    echo $fecha2[0];
    echo $fecha2[1];
    echo "----------".$fecha2[2]."----------";
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";

    echo "<br/>";
    echo $fechaR = $fecha[0]."/01/01";
    echo "<br/>";
    echo $fecha= $fecha[0].'/'.$fecha[1].'/'.$fecha[2];
    echo $fecha2= $fecha2[0].'/'.$fecha2[1].'/'.$fecha2[2];

    echo "<br/>dias";
    echo   $dias = floor(((strtotime($fecha)-strtotime($fechaR))/86400)+1);  //Obtiene el número de día del año
    echo "D <br/>";
    echo   $dias2 = floor(((strtotime($fecha2)-strtotime($fecha))/86400)+1);  //Obtiene la diferencia de días entre dos fechas
    echo "Dif <br/>";

    if($ban)          #### Al parecer en los años bisiestos no considera el día 29 de febrero como sumatoria de día calendario
    echo $dias++;

    echo strlen($dias); echo "<br/>";

    if(strlen($dias)==1)
            echo $dias = "00".$dias;
    elseif(strlen($dias)==2)
        echo $dias = "0".$dias;    


    if ($_REQUEST['algoritmo']=="Canny"){
        $command = "matlab -sd ".$inputDir." -r cany($lat1,$lat2,$lon1,$lon2,'$fechaI','$dias',$dias2,'$usuario','$region')";  
        exec($command);
        echo $inputDir  = "C:\\output";
        echo $outputDir = "C:\\output";
        echo "The following command was run: ".$command."<br/>";
        echo $filename." was created in ".$outputDir."<br/>";        
    }
/*  

    echo "<br/>";
    echo $_REQUEST[fechaI];
    echo $_REQUEST[fechaF];
    echo "<br/>";

    $fecha = explode('/',$_REQUEST[fechaI]);
    $fechaI = $fecha[2]."-".$fecha[0]."-".$fecha[1];
    echo $fecha[0];
    echo $fecha[1];
    echo $fecha[2];
    if($fecha[2]==2016) $ban=1;
    echo "<br/>";

    $fecha2 = explode('/',$_REQUEST[fechaF]);
    $fechaF = $fecha2[2]."-".$fecha2[0]."-".$fecha2[1];
    echo $fecha2[0];
    echo $fecha2[1];
    echo "----------".$fecha2[2]."----------";

    echo "<br/>";
    echo $fechaR = $fecha[2]."/01/01";
    echo "<br/>";
    echo $fecha= $fecha[2].'/'.$fecha[0].'/'.$fecha[1];
    echo $fecha2= $fecha2[2].'/'.$fecha2[0].'/'.$fecha2[1];

    echo "<br/>dias";
    echo   $dias = floor(((strtotime($fecha)-strtotime($fechaR))/86400)+1);  //Obtiene el número de día del año
    echo "<br/>";
    echo   $dias2 = floor(((strtotime($fecha2)-strtotime($fecha))/86400)+1);  //Obtiene la diferencia de días entre dos fechas
    echo "<br/>";



    $l = bd();
    mysqli_select_db($l,"matlab");

    echo $q ="insert into regiones(idUsuarios,idProyectos,lat1,lat2,lon1,lon2,fechaI,fechaF) values($_SESSION[id],$_REQUEST[seleccionaRegion],'$_REQUEST[La1]','$_REQUEST[La2]','$_REQUEST[L1]','$_REQUEST[L2]','$fechaI','$fechaF')";
    echo mysqli_query($l,$q) or die("Erroxxr");
    

    
    if($ban)          #### Al parecer en los años bisiestos no considera el día 29 de febrero como sumatoria de día calendario
    echo $dias++;

    echo strlen($dias); echo "<br/>";

    if(strlen($dias)==1)
            echo $dias = "00".$dias;
    elseif(strlen($dias)==2)
        echo $dias = "0".$dias;

    //$interval = date_diff($_REQUEST[fechaI], $_REQUEST[fechaF]);
    //$datetime1 = date_create('2009-10-11');
    //$datetime2 = date_create('2009-10-13');
    //$interval = date_diff($datetime1, $datetime2);
    //echo $interval->format('%R%a días');

//20 32   -117 -105
/*    $command = "matlab -sd ".$inputDir." -r openDap($_REQUEST[La1],$_REQUEST[La2],$_REQUEST[L1],$_REQUEST[L2],'$_REQUEST[fechaI]','$dias',$dias2,'$usuario','$region')";
*/    
    /*$command = "matlab -sd ".$inputDir." -r crearProyecto($_REQUEST[La1],$_REQUEST[La2],$_REQUEST[L1],$_REQUEST[L2],'$_REQUEST[fechaI]','$dias',$dias2,'$usuario','$region')";
    
    exec($command);


    echo $inputDir  = "C:\\output";
    echo $outputDir = "C:\\output";
    //echo  $command = "matlab -sd ".$inputDir." -r phpcreatefile('".$outputDir."\\".$filename."')";
    //echo  $command = "matlab -sd ".$inputDir." -r phpcreatefile('prueba')";
  //  echo  $command = "matlab -sd ".$inputDir." -r openDap";
    //exec($command);
    echo "The following command was run: ".$command."<br/>";
    echo $filename." was created in ".$outputDir."<br/>";*/
?>