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


    <?php
    $correntAnswers = array("firstQuestion"=>"deer", "secondQuestion"=> "dog", "thirdQuestion"=> "cat");
    $customAnswers = array();
    if(isset($_POST['submit'])) {
      if(!empty($_POST['deer']) && !empty($_POST['dog']) && !empty($_POST['cat'])) {
        $deerAnswer = $_POST['deer'];
        $dogAnswer = $_POST['dog'];
        $catAnswer = $_POST['cat'];
        $scores = 0;
        if($deerAnswer == $correntAnswers['firstQuestion']) {
          array_push($customAnswers, 1);
          $scores++;
        } else {
          array_push($customAnswers, -1);
        }
        if($dogAnswer == $correntAnswers['secondQuestion']){
          array_push($customAnswers, 1);
          $scores++;
        } else {
          array_push($customAnswers, -1);
        }
        if($catAnswer == $correntAnswers['thirdQuestion']){
          array_push($customAnswers, 1);
          $scores++;
        } else {
          array_push($customAnswers, -1);
        }

        $proc = Round($scores * 100 / 3, 1);
        echo "<div class='center'>Jus atsakete teisingai i " . $scores . " klausimus is 3 ir surinkote " . $proc . "% </div><br />";
      } else {
        echo "<div class='red center'> Pasirinkite kazka </div>";
      } // else end if not empty

    } // if isset submit

    ?>

    <form class= action="" method="post">

        <img src="https://g2.dcdn.lt/images/pix/elnias-71611900.jpg" class="float-left" height="200" width="250"><br />
        <label>Koks tai gyvunas?</label><br />
        <input type="radio" name="deer" value="deer"/>Elnias <br />
        <input type="radio" name="deer" value="dog"/>Suo <br />
        <input type="radio" name="deer" value="cat"/>Katinas <br />
        <input type="radio" name="deer" value="begotten"/>Begemotas <br /><br />
        <?php if(isset($_POST['submit']) && !empty($customAnswers)){
                  if($customAnswers[0] == 1) {
                    echo "<p class='green'>Atsakymas teisingas</p>";
                  } else {
                    echo "<p class='red'>Atsakymas neteisingas</p>";
                  }
              }
         ?>
        <div class="clean-float"></div>


        <img src="https://g3.dcdn.lt/images/pix/suo-panasus-i-lape-71473226.jpg" class="float-left" height="200" width="250"><br />
        <label>Koks tai gyvunas?</label><br />
        <input type="radio" name="dog" value="deer"/>Elnias <br />
        <input type="radio" name="dog" value="dog"/>Suo <br />
        <input type="radio" name="dog" value="cat"/>Katinas <br />
        <input type="radio" name="dog" value="begotten"/>Begemotas <br /><br />
        <?php if(isset($_POST['submit']) && !empty($customAnswers)){
                  if($customAnswers[1] == 1) {
                    echo "<p class='green'>Atsakymas teisingas</p>";
                  } else {
                    echo "<p class='red'>Atsakymas neteisingas</p>";
                  }
              }
         ?>
        <div class="clean-float"></div>


        <img src="https://skelbiu-img.dgn.lt/1_5_422468149/bengalu-katinas-iesko-drauges.jpg" class="float-left" height="200" width="250"><br />
        <label>Koks tai gyvunas?</label><br />
        <input type="radio" name="cat" value="deer"/>Elnias <br />
        <input type="radio" name="cat" value="dog"/>Suo <br />
        <input type="radio" name="cat" value="cat"/>Katinas <br />
        <input type="radio" name="cat" value="begotten"/>Begemotas <br /><br />
        <?php if(isset($_POST['submit']) && !empty($customAnswers)){
                  if($customAnswers[2] == 1) {
                    echo "<p class='green'>Atsakymas teisingas</p>";
                  } else {
                    echo "<p class='red'>Atsakymas neteisingas</p>";
                  }
              }
         ?>
        <input type="submit" name="submit" value="Speti"/> <br />
        <div class="clean-float"></div>


  </form>


  </body>
</html>
