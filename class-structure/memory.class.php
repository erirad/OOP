<?php include 'device.php';

final class Memory extends Device implements Procuct{
  private $type;
  private $amount;
  private $speed;

  public function setType($type) {
    $this->type = $type;
  }
  public function setAmount($amount) {
    $this->amount = $amount;
  }
  public function setSpeed($speed) {
    $this->speed = $speed;
  }
  public function getCard() {
    //esu interface funkcija
  }
  public function getPrice() {
    //esu interface funkcija
  }
  public function __toString() {
    return "type " . $this->type . " amount " . $this->amount . " speed " . $this->speed;
  }

} //class
