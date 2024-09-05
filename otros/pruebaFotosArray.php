
<?PHP
require "../model/Connection.php";
require "../model/FotosArray.php";
$fotos = "  C:\xampp\htdocs\Foap2023ProyecteFinal\web\imagenes\bob-brewer-dbK1lncRcWk-unsplash.jpg,
            C:\xampp\htdocs\Foap2023ProyecteFinal\web\imagenes\boo.jpeg,
            C:\xampp\htdocs\Foap2023ProyecteFinal\web\imagenes\chica.jpeg,
            C:\xampp\htdocs\Foap2023ProyecteFinal\web\imagenes\chico.jpeg ";

$prueba = new Prueba("",$fotos);

echo $prueba->getFotos();
echo "<br>";
echo $prueba->getf0(); echo "<br>";
echo $prueba->getf1(); echo "<br>";
echo $prueba->getf2(); echo "<br>";
echo $prueba->getf3(); echo "<br>";
echo $prueba->getf4(); echo "<br>";
echo $prueba->getf5(); echo "<br>";

?>
