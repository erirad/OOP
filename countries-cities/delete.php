<?php include 'country.php'; ?>
<?php
  if(isset($_GET['id'])) {
  $id = $_GET['id'];
   $sql = "DELETE FROM cities WHERE id = $id";
   Country::connectDatabase("savaite4");
   $result = Country::$conn->query($sql);
   if(!$result) {
     die("Query failed " . Country::$conn->error);
   }
   header('Location: index.php');
  }


 ?>
