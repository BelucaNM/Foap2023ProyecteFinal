
<?php

    // Definir la primera clase con constantes
    class SistemaOperativo {

    }
    
    // Definir otra clase que acceda a las constantes de SistemaOperativo
    class EjecutarComando {
        public function ejecutarPorSistema($sistema) {
            switch ($sistema) {
                case SistemaOperativo::WINDOWS:
                    echo "Ejecutando en Windows" . PHP_EOL;
                    break;
                case SistemaOperativo::LINUX:
                    echo "Ejecutando en Linux" . PHP_EOL;
                    break;
                case SistemaOperativo::MAC:
                    echo "Ejecutando en macOS" . PHP_EOL;
                    break;
                default:
                    echo "Sistema operativo no soportado" . PHP_EOL;
            }
        }
    }
    
    // Ejemplo de uso
    $comando = new EjecutarComando();
    $comando->ejecutarPorSistema(SistemaOperativo::WINDOWS); // Ejecutando en Windows
    $comando->ejecutarPorSistema(SistemaOperativo::LINUX);   // Ejecutando en Linux
    
    ?>
    NombreClase::NOMBRE_CONSTANTE;
    
    
}