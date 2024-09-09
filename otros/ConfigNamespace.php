<?php

namespace Config\Windows;

class Settings {
    public static function getConfig() {
        return [
            'db_name' => 'mysql:host=localhost;dbname=tienda',
            'db_user' => 'root',
            'db_password' => '',
        ];
    }
}

namespace Config\Linux;

class Settings {
    public static function getConfig() {
        return [
            'db_name' => 'mysql:host=localhost;dbname=objetivos',
            'db_user' => 'root',
            'db_password' => 'Mazinger72',
        ];
    }
}

// Detectar el sistema operativo
$os = PHP_OS;

if ($os === 'WINNT') {
    $config = \Config\Windows\Settings::getConfig();
} else {
    if ($os === 'Linux') {
        $config = \Config\Linux\Settings::getConfig();
    }
}

// Imprimir la configuración
print_r($config);
?>