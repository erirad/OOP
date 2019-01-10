<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      function arKeliamieji($metai){
        if($metai % 4 == 0 && $metai % 100 !=0 || $metai % 400 == 0) {
          echo "Metai yra keliamieji";
        } else {
          echo "Metai yra NEEE keliamieji";
        }
      }

      arKeliamieji(1600);

     ?>
     <div>============================================ </div>
     <?php

     function factorial($sk) {
       $rez = 1;
      for($i=$sk; $i>0; $i--){
        $rez *= $i;
      }
      return $rez;
  }
  $faktorial = factorial(5);
  echo $faktorial;

      ?>
      <div>============================================ </div>
      <?php

       ?>
  </body>
</html>
