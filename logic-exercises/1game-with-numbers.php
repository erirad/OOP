<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    body {
      background-color: rgb(235, 147, 133);
      font-family: cursive;
    }
    h1 {
      margin:1% auto;
      width: 30%;
    }
    p {
      margin:2% auto;
      width: 12%;
      color: rgb(117, 11, 11);
      font-weight: bold;
    }
    td {
      border: 1px solid #000;
      width: 45px;
      height: 45px;
      text-align: center;
    }
    .br {
      border-right: 5px solid #000;
      background-color: rgb(245, 238, 219);
    }
    .bb {
      border-bottom: 5px solid #000;
      background-color: rgb(245, 238, 219);
    }
    .col1 {
      background-color: rgb(153, 192, 188);
    }
    form {
      width: 20%;
      margin: 0.5% auto;
      padding: 15px;
      background-color: rgb(147, 119, 130);
      box-shadow: 5px 10px rgb(96, 96, 96);
    }
   input[type='submit'] {
     width: 100%;
     padding: 8px;
     border-radius: 4px;
     background-color: rgb(153, 192, 188);
   }
    table {
      margin: 0 auto;
    }

    </style>
  </head>
  <body>

<h1>Multiplication Table Worksheets</h1>

    <form action="" method="post">

       <label>Number set</label> <br />
       <input type="radio" name="lentelesDydis" value="5" />1 to 5 <br />
       <input type="radio" name="lentelesDydis" value="10" />1 to 10 <br />
       <input type="radio" name="lentelesDydis" value="12" />1 to 12 <br />
       <input type="radio" name="lentelesDydis" value="15" />1 to 15 <br /><br />


       <label>Difficulty</label> <br />
       <input type="radio" name="difficulty" value="10" />Easy <br />
       <input type="radio" name="difficulty" value="30" />Medium <br />
       <input type="radio" name="difficulty" value="50" />Hard <br />
       <input type="radio" name="difficulty" value="90" />Wow <br /><br />


       <input type="submit" name="submit" value="Zaisti" />
     </form>


    <?php
    if(isset($_POST['submit']) && !empty($_POST['lentelesDydis']) && !empty($_POST['difficulty'])) {
      $lentelesDydis = $_POST['lentelesDydis'];
      $difficulty = $_POST['difficulty'];


      // sukuriamas tuscias masyvas reiksmems saugot
        $masyvasM = array();
        for($i=0; $i<=$lentelesDydis; $i++) {
          $masyvasM[$i] = array();
        }
//  generuojam random skaicius, kurie nesikatoja ir sukeliam i masyvus du skirtingus
$RandomMasyvas1 = array();
$RandomMasyvas2 = array();
        for($i=0; $i<$lentelesDydis; $i++) {
          $rand = Rand(1, $lentelesDydis);
          $rand2 = Rand(1, $lentelesDydis);
          if(!in_array($rand, $RandomMasyvas1) && !in_array($rand2, $RandomMasyvas2)){
            array_push($RandomMasyvas1, $rand);
            array_push($RandomMasyvas2, $rand2);
          } else {
            while(in_array($rand, $RandomMasyvas1) || in_array($rand2, $RandomMasyvas2)) {
            $rand = Rand(1, $lentelesDydis);
            $rand2 = Rand(1, $lentelesDydis);
            if(!in_array($rand, $RandomMasyvas1) && !in_array($rand2, $RandomMasyvas2)){
              array_push($RandomMasyvas1, $rand);
              array_push($RandomMasyvas2, $rand2);
                break;
              } //if
            } //while
          } //if else
        } //for

        $masyvasM[0][0] = "<img src='https://www.mathfactcafe.com/images/smiley04.jpg' />";
       // pripildom masyvo daugiklius random skaiciais
        for($i=1; $i<=$lentelesDydis; $i++) {
          $masyvasM[0][$i] = $RandomMasyvas1[$i-1];
          $masyvasM[$i][0] = $RandomMasyvas2[$i-1];
        }



        // i tuscius langelius priskiriam sudaugintus daugiklius
        for($i=1; $i<=$lentelesDydis; $i++) {
           for($k=1; $k<=$lentelesDydis; $k++) {
             $masyvasM[$i][$k] = $masyvasM[0][$k] * $masyvasM[$i][0];
           }
        }
?>
<?php
// apskaiciuojama kiek pagal lenteles dydi procentaliai turi uzspalvinti reiksmes
   $langeliuSk = $lentelesDydis * $lentelesDydis;
   if($difficulty == 10)
   $proc = Round($langeliuSk * 0.1);
   if($difficulty == 30)
   $proc = Round($langeliuSk * 0.3);
   if($difficulty == 50)
   $proc = Round($langeliuSk * 0.5);
   if($difficulty == 90)
   $proc = Round($langeliuSk * 0.9);


// random uzspalvinam reiksmes
for($i=0; $i<$proc; $i++) {
        $random1 = Rand(1,$lentelesDydis);
        $random2 = Rand(1,$lentelesDydis);
        $masyvasM[$random1][$random2] = "";
      }

   ?>
   <!-- vizuolizacija is masyvo -->
       <table>
  <?php
         for($j=0; $j<=$lentelesDydis; $j++) { ?>
            <tr>
               <?php for($k=0; $k<=$lentelesDydis; $k++) {
                    if($j == 0) echo "<td class='bb'>";
                    elseif($k == 0) echo "<td class='br'>";
                    else echo "<td class='col1'>";
                       echo $masyvasM[$j][$k];
                         echo "</td>"; ?>

            <?php   } ?>
            </tr>
      <?php  } ?>

       </table>

<?php
       } //if isset submit
        else {
          echo "<p> Please fill your choice </p>";
        }




              ?>

  </body>
</html>
