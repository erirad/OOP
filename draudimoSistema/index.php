<?php session_start(); ?>
<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>draudimas</title>
  </head>
  <style>
    .red {
      color: rgb(207, 55, 21);
    }
    td, th {
      border: 1px solid #000;
    }
    .row {
      margin-top: 7%;
    }
  </style>
  <body>
    <p id="text"></p>
    <h1 class="display-3 text-center">Draudimo sistema</h1>
<div class="row align-middle d-flex justify-content-center">
  <div class="col-md-6 border border-info p-5">


  <form action="customer.php" method="post">
     <div class="form-group">
       <label for="formGroupExampleInput">Iveskite automobilio Valst. Nr.</label>
       <input type="text" name="license_plate" class="form-control" id="formGroupExampleInput" placeholder="GRT567" required>
     </div>
     <div class="form-group">
       <input type="submit" name="submit" class="form-control btn btn-outline-info" id="formGroupExampleInput2">
     </div>
   </form>
   <?php
   if(isset($_SESSION['false'])) {
     echo $_SESSION['false'];
     session_unset();
   } ?>
 </div>
 </div>



   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
