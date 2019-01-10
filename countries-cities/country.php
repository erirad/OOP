<?php
class Country {
public static $conn;
protected $code;
protected $name;
protected $surfaceArea;
protected static $codeArray = [];

  function __construct($code){
    $this->code = $code;
    self::connectDatabase("savaite4");
    $this->selectorByCode();
  }

  public static function connectDatabase($dbName) {
    self::$conn = new mysqli("localhost", "root", "root", "{$dbName}");
    if(self::$conn->connect_errno) {
      die("Connection failed: " . self::$conn->connect_error);
    }
  }

  public function selectorByCode() {
    $sql = "SELECT * FROM countries WHERE code = '{$this->code}'";
    $result = self::$conn->query($sql);
    if(!$result) {
      die("Query failed " . self::$conn->error);
    }
    while($row = $result->fetch_assoc()) {
      $this->name = $row['name'];
      $this->surfaceArea = $row['surfaceArea'];

    }
  }

public static function selectAllCodes() {
$sql = "SELECT code FROM countries";
  $result = self::$conn->query($sql);
  if(!$result) {
    die("Query failed " . self::$conn->error);
  }
  while($row = $result->fetch_assoc()) {
    array_push(self::$codeArray, $row['code']);
  }
  return self::$codeArray;
}

  public function getName() {
    return $this->name;
  }
  public function getSurfaceArea() {
    return $this->surfaceArea;
  }
  public function getCode() {
    return $this->code;
  }

} //class

?>
