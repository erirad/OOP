<?php include 'device.php';

final class Procesor extends Device {
   private $socket;
   private $speed;
   private $cores;



   public function setSocket($type) {
     $this->socket = $type;
   }
   public function setSpeed($speed) {
     $this->speed = $speed;
   }
   public function setCores($cores) {
     $this->cores = $cores;
   }
   public function __toString() {
     return "Socket " . $this->socket . " speed " . $this->speed . " cores " . $this->cores;
   }

} //class
