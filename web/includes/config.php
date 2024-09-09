<?php


if (PHP_OS == 'WINNT') {
    $db_name = 'mysql:host=localhost;dbname=tienda';
    $db_user = 'root';
    $db_password = '';
    $linkEmail = 'http://localhost/FOAP2023PROYECTEFINAL';
}
if ($PHP_OS == 'Linux') {
    $db_name = 'objetivos';
    $db_user = 'root';
    $db_password = 'Mazinger72';
    $linkEmail = 'http://147.83.7.203/objetivos';
}
$emailVentas = 'isabel.navarrina@gmail.com';

?>