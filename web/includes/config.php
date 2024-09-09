<?php

$config = [];

// Detectar el sistema operativo
$os = PHP_OS;

// Configuración para Windows
if (stripos($os, 'WIN') !== false) {
    $config['db_name'] = 'mysql:host=localhost;dbname=tienda';
    $config['db_user'] = 'root';
    $config['db_pass'] = '';
    
    $config['linkEmail'] = 'http://localhost/FOAP2023PROYECTEFINAL';
    $config['emailVentas'] = 'isabel.navarrina@gmail.com';
    
}

// Configuración para Linux
elseif (stripos($os, 'Linux') !== false) {
    $config['db_name'] = 'mysql:host=localhost;dbname=objetivos';
    $config['db_user'] = 'root';
    $config['db_pass'] = 'Mazinger72';
    
    $config['linkEmail'] = 'http://147.83.7.203/objetivos';
    $config['emailVentas'] = 'isabel.navarrina@gmail.com';
};

// Retornar o usar la configuración
return $config;

?>
