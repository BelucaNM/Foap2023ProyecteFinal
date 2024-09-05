<?php 
// usando la constante predefinida para 
// obtener el nombre del sistema operativo, 
// con el cual el intérprete PHP fue compilado, 
// no necesariamente será la misma 
// plataforma donde PHP se encuentra ejecutándose:
//
echo PHP_OS;
echo "<br>";
//
// para obtener una información más confiable y detallada:
//
echo php_uname();
?>