<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Customer</title>
  </head>
  <style>
    span {
    font-size: 12px;
    }
    .jumbotron {
      padding: 20px;
    }
  </style>
  <body>

    <?php
    $conn = new mysqli('localhost', 'root', 'root', 'draudimo_sistema');
    if($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error());
    }

    function connectQuery($sql) {
      global $conn;
      global $result;
      $result = $conn->query($sql);
      if(!$result) {
        die("Query failed " . $conn->error());
      }
    }
    ?>

    <?php
    // INFO APIE POLISA IR AUTO
      if(isset($_POST['submit'])){
        // is input gautas Valst. Nr.
        $license_plate = $_POST['license_plate'];
        //sukuriamas masyvas ir i ji talpiname visus DB turimus Valst Nr.
        $plateArray = array();
        $sql = "SELECT license_plate FROM auto";
        connectQuery($sql);
        while($row = $result->fetch_assoc()) {
          array_push($plateArray, $row['license_plate']);
        }
        // tikriname ar irasytas Valsr. Nr. egzistuoja masyve
        if(!in_array($license_plate, $plateArray)){
           header('Location: index.php');
           $_SESSION['false'] = "<p class='red'>* Tokio Valst. Nr. duomenu bazeje nera</p>";
        }

      $sql = "SELECT insurance_policy.id, owner.name, owner.surname, owner.telephone_number, owner.birthday, owner.driver_license, auto.license_plate, auto.brands, auto.year, auto.auto_type, insurance_policy.insurance_group, insurance_policy.price, insurance_policy.start_validity, insurance_policy.end_validity FROM auto JOIN insurance_policy ON auto.id = insurance_policy.auto_id JOIN owner ON auto.owner_id = owner.id WHERE auto.license_plate = '{$license_plate}'";
        connectQuery($sql);

          while ($row = $result->fetch_assoc()) {
             $policy_id = $row['id'];
             $owner_name = $row['name'];
             $owner_surname = $row['surname'];
             $owner_telephone = $row['telephone_number'];
             $owner_birthday = $row['birthday'];
             $owner_license = $row['driver_license'];
             $auto_brand = $row['brands'];
             $auto_plate = $row['license_plate'];
             $auto_year = $row['year'];
             $auto_type = $row['auto_type'];
             $policy_group = $row['insurance_group'];
             $policy_price = $row['price'];
             $policy_start = $row['start_validity'];
             $policy_end = $row['end_validity'];
           } //while


       //INFO APIE POLISA IR BROKERI
        $sql = "SELECT broker.id, broker.name, broker.surname, broker.telephone_number FROM insurance_policy JOIN broker ON insurance_policy.broker_id = broker.id WHERE insurance_policy.id = {$policy_id}";
        connectQuery($sql);

          while($row = $result->fetch_assoc()) {
            $broker_id = $row['id'];
            $broker_name = $row['name'];
            $broker_surname = $row['surname'];
            $broker_num = $row['telephone_number'];
          }



        // INFO APIE BROKERI IR KOMPANIJA
        $sql = "SELECT company.title, company.address FROM broker JOIN company ON broker.company_id = company.id WHERE broker.id = {$broker_id}";
        connectQuery($sql);

          while($row = $result->fetch_assoc()) {
             $company_title = $row['title'];
             $company_address = $row['address'];
          }
?>



<div class="container">

    <div class="jumbotron jumbotron-fluid text-center rounded border border-info">
    <div class="container">
      <h1 class="display-4"><?php echo $owner_name . " " . $owner_surname; ?></h1>
      <p class="lead">Tel. Nr. <?php echo $owner_telephone; ?>, gim.d. <?php echo $owner_birthday; ?>, driver lic. <?php echo $owner_license; ?></p>
    </div>
    </div>

<div class="row d-flex justify-content-around">

  <div class="ard text-white bg-info mb-3" style="min-width: 18rem;">
    <div class="card-header">Automobilis</div>
    <div class="card-body">
      <span>Valstybinis numeris</span>
      <h5 class="card-title"><?php echo $auto_plate; ?></h5>
      <span>Automobilio modelis</span>
      <h5 class="card-text"><?php echo $auto_brand; ?></h5>
      <span>Pagaminimo metai</span>
      <h5 class="card-text"><?php echo $auto_year; ?></h5>
      <span>Kebulo tipas</span>
      <h5 class="card-text"><?php echo $auto_type; ?></h5>
    </div>
  </div>


<div class="card  bg-light mb-3" style="min-width: 18rem;">
  <div class="card-header">
    Draudimo informacija
  </div>
  <ul class="list-group list-group-flush">
    <span>Draudimo tipas</span>
    <li class="list-group-item"><?php echo $policy_group; ?></li>
    <span>Draudimo galiojimo pradzia</span>
    <li class="list-group-item"><?php echo $policy_start; ?></li>
    <span>Draudimo galiojimo pabaiga</span>
    <li class="list-group-item"><?php echo $policy_end; ?></li>
    <span>Draudimo kaina</span>
    <li class="list-group-item"><?php echo $policy_price; ?></li>
  </ul>
</div>


<div class="card text-white bg-secondary mb-3" style="min-width: 18rem;">
  <div class="card-header">Draudikas</div>
  <div class="card-body">
    <span>Brokerio vardas</span>
    <h5 class="card-title"><?php echo $broker_name; ?></h5>
    <span>Brokerio pavarde</span>
    <h5 class="card-title"><?php echo $broker_surname; ?></h5>
    <span>Brokerio Tel. Nr.</span>
    <h5 class="card-title"><?php echo $broker_num; ?></h5>
    <span>Draudimo imone</span>
    <h5 class="card-title"><?php echo $company_title; ?></h5>
    <span>Draudimo imones adr.</span>
    <h5 class="card-title"><?php echo $company_address; ?></h5>
  </div>
</div>

<!-- row -->
</div>
<a href="index.php" class="btn btn-secondary btn-lg btn-block m-2">Grizti atgal</a>
<!-- container  -->
</div>

<?php     }//if isset ?>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
