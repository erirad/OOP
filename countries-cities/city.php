<?php include 'country.php';
class City extends Country {

private $countryCode;
public $city;
public $population;

function __construct($code) {
$this->countryCode = $code;
self::connectDatabase("savaite4");
// $this->selectCitiesbyCountryCode();
}

public function selectCitiesbyCountryCode() {
  $sql = "SELECT countries.name, cities.city, cities.population FROM cities JOIN countries ON countries.code = cities.countryCode WHERE countryCode = '{$this->countryCode}'";
  $result = self::$conn->query($sql);
  if(!$result) {
    die("Query failed " . self::$conn->error);
  }
  $getResult = [];
  while($row = $result->fetch_assoc()) {
      array_push($getResult, $row);
  }
  return $getResult;
}


} //class
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>spaudinti</title>
  </head>
  <style>
   td, th {
     border: 1px solid #000;
   }
  </style>

  <body>
    <?php
      $code = strval($_GET['code']);
      $newCity = new City($code);
      $allCities = $newCity->selectCitiesbyCountryCode();

      echo "<h1>" . $allCities[0]["name"] . "</h1>";
      echo "<table> <tr><th>Miestas</th><th>Populiacija</th></tr>";
      foreach ($allCities as $key) {
        echo "<tr>";
        foreach (array_slice($key, 1) as $value) {
          echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
      }
      echo "</table>";
      echo "<a href='index.php'>Grizti atgal</a>";

  ?>

  </body>
</html>
