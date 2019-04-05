<?php
    @session_start();

   $inputDir  = "C:\\AppServ\\www\\bajaMap";
   $outputDir = "C:\\AppServ\\www\\bajaMap\\admin";



    $command = "matlab -sd ".$inputDir." -r algoritmo($_REQUEST[algoritmo],$_REQUEST[usuario],$_REQUEST[proyecto])";
    exec($command);
 

?>