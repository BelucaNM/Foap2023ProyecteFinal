
<?PHP

class Prueba extends Connection {

private $tableName = 'prueba';
private $id ;
private $fotos;
private $f0; // hasta 6 fotos
private $f1;
private $f2;
private $f3;
private $f4;
private $f5;


public function __construct($id='',$fotos='') {
    $this->id = $id;     
    $this->fotos = $fotos;  
    $this->explodeArray($fotos);
}
public function getFotos() { return $this->fotos;}
public function getf0() { return $this->f0;}
public function getf1() { return $this->f1;}
public function getf2() { return $this->f2;}
public function getf3() { return $this->f3;}
public function getf4() { return $this->f4;}
public function getf5() { return $this->f5;}


public function setFotos ($fotos) { 
            $this->fotos = $fotos;
            $this->explodeArray ($fotos);
        }

public function explodeArray($fotos) {
    if ($fotos != '') {
        $arrValues=explode(",",$fotos);
        if (isset ($arrValues[0])){ $this->f0 = $arrValues[0];};
        if (isset ($arrValues[1])){ $this->f1 = $arrValues[1];};
        if (isset ($arrValues[2])){ $this->f2 = $arrValues[2];};
        if (isset ($arrValues[3])){ $this->f3 = $arrValues[3];};
        if (isset ($arrValues[4])){ $this->f4 = $arrValues[4];};
        if (isset ($arrValues[5])){ $this->f5 = $arrValues[5];};
    };

}


}
?>
