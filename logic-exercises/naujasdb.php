<?php include("db.php")?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ar teisingas</title>
    <style>
        form {
          width: 30%;
          border: 1px solid #000;
          padding: 2%;
          margin: 1% auto;
        }
        p {
        font-weight: bold;
        width: 35%;
        display: inline-block;
        }
        div{
          text-align: center;
          border-radius: 4px;
          font-weight: bold;
        }

        .green {
          color: rgb(23, 166, 102);
        }
        .red {
          color: rgb(193, 25, 25);
        }
      img {
        padding: 2%;
      }
      input[type='submit'] {
        width: 100%;
      }
      .float-left {
        float: left;
      }
      .clean-float {
        clear: both;
      }


    </style>
  </head>
  <body>

    <form class= action="" method="post">
      <?php
      //uzpildom masyvo ilgi DB klausimu kiekiu,norint cikle keisti WHERE
      $questionsName = array();
      $sql = "SELECT * FROM quizAnimal";
      $result = $conn->query($sql);
       while($row = $result->fetch_assoc()) {
         array_push($questionsName, $row['questionName']);
    }
      $scores = 0;
      for($i=0; $i<count($questionsName); $i++) {

          $sql = "SELECT * FROM quizAnimal WHERE questionName = '{$questionsName[$i]}'";
          $result = $conn->query($sql);
           while($row = $result->fetch_assoc()) {
    ?>
                <img src="<?php echo $row['imgAdress'];?>" class="float-left" height="200" width="250"><br />
                <label>Koks tai gyvunas?</label><br />
                <input type="radio" name="<?php echo $row['questionName'];?>" value="<?php echo $row['suggestion1'];?>"/><?php echo $row['suggestion1'];?> <br />
                <input type="radio" name="<?php echo $row['questionName'];?>" value="<?php echo $row['suggestion2'];?>"/><?php echo $row['suggestion2'];?> <br />
                <input type="radio" name="<?php echo $row['questionName'];?>" value="<?php echo $row['suggestion3'];?>"/><?php echo $row['suggestion3'];?> <br />
                <input type="radio" name="<?php echo $row['questionName'];?>" value="<?php echo $row['suggestion4'];?>"/><?php echo $row['suggestion4'];?> <br /><br />
    <?php
                // tikrinam teisingus atsakymus
                $customAnswers = array();
                if(isset($_POST['submit'])) {
                  if(!empty($_POST['deer']) && !empty($_POST['dog']) && !empty($_POST['cat'])) {
                    $deerAnswer = $_POST['deer'];
                    $dogAnswer = $_POST['dog'];
                    $catAnswer = $_POST['cat'];
                    $begottenAnswer = $_POST['begotten'];
                      // sukuriam atsakymu pasirinkimu masyva
                      array_push($customAnswers, $deerAnswer, $dogAnswer, $catAnswer, $begottenAnswer);
                      // tikrinam ar pasirinkimai sutampa su teisingais ats is db
                        if($customAnswers[$i] == $row["answer"]) {
                          echo "<p class='green'>Atsakymas teisingas</p>";
                          $scores++;
                        } else {
                          echo "<p class='red'>Atsakymas neteisingas</p>";
                        }
                  // jeigu lieka nepazymetas burbuliukas
                  } else {
                    echo "<div class='red center'> Uzpildykite pasirinkimus </div>";
                  } // if not empty
                } // if isset submit
                ?>
                <div class="clean-float"></div>
           <!-- uzdarome while cikla -->
           <?php } ?>
        <!-- uzdarome forcikla -->
        <?php } ?>
              <!-- paskaiciuojam kiek procentaliai surinko tasku ir ispausdinam -->
              <?php $rez = Round($scores * 100 / count($questionsName), 1); ?>
              <div class='center'>Jus atsakete teisingai i <?php echo $scores; ?>  klausimus is <?php echo count($questionsName); ?> ir surinkote <?php echo $rez;?> % </div><br />

      <input type="submit" name="submit" value="Speti"/> <br />
    </form>

  </body>
</html>
