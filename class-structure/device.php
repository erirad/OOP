<?php include 'product.interface.php';

abstract class Device {
  protected $serialNumber;
  protected $manufacturer;
  protected $model;
  protected $sku;
  public $price;

  public function __construct($serialNumber, $sku) {
    $this->serialNumber = $serialNumber;
    $this->sku = $sku;
  }
  public function setManufacturer($name) {
    $this->manufacturer = $name;
  }
  public function setModel($name) {
    $this->model = $name;
  }
  public function getInventoryDetaild() {
    return $this->manufacturer . $this->model;
  }

} //class
