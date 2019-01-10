<?php include 'device.php';

class HardDrive extends Device implements Product{
  protected $amount;

 public function setAmount($amount) {
   $this->amount = $amount;
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

$new = new HardDrive("GT345", 56);
var_dump($new);
