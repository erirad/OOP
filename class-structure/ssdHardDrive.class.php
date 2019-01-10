<?php include 'hardDrive.class.php';

final class SSDHardDrive extends HardDrive{

  private $speed;

  public function setSpeed($speed) {
    $this->speed = $speed;
  }
  public function getCard() {
    //esu interface funkcija
  }
  public function getPrice() {
    //esu interface funkcija
  }
  public function setPrice(Device $spausdinam){
    echo $spausdinam->price;
  }
  public function __toString() {
    return "amount " . $this->amount;
  }
} //class

$new1 = new SSDHardDrive("FRT545", 567);
var_dump($new1);
