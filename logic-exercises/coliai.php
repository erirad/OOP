<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    p {
      line-height: 0.1;
    }
    </style>
  </head>

<form action="" method="post">
  <label>Ar metai keliamieji?</label><br />
  <input type="number" name="metai"/><br />
  <label>Metu laikotarpyje kiek yra keliamuju metu?</label><br />
  <input type="number" name="metainuo"/>
  <input type="number" name="metaiiki"/><br /><br />
  <input type="submit" name="submit" value="Vykdyti"/><br /><br />
</form>
  <div>==================================================</div>
  <div>===========MAZIAUSIAS BENDRAS KARTOTINIS==========</div>
  <div>==================================================</div>
<?php
  if(isset($_POST['submit'])) {
      $metai = $_POST['metai'];
      $metaiNuo = $_POST['metainuo'];
      $metaiIki = $_POST['metaiiki'];
      $kiek = 0;


      if($metai % 100 == 0 && $metai % 400 == 0) {
        echo "simtmetis yra keliamasis";
      } elseif($metai % 100 != 0 && $metai % 4 == 0) {
        echo "metai yra keliamieji";
      } else {
        echo "metai yra paprasti";
      }


      for($i= $metaiNuo; $i<=$metaiIki; $i++ ) {
        if($i % 100 == 0 && $i % 400 == 0) {
          $kiek++;
        }
        if($i % 100 != 0 && $i % 4 == 0) {
          $kiek++;
       }
      }
      echo "<br />is viso keliamuju metu yra " . $kiek;
} //if isset ?>


<form action="" method="post">
<label>Irasykite skaicius</label><br />
<input type="number" name="a"/>
<input type="number" name="b"/><br /><br />
<input type="submit" name="submit2" value="Vykdyti"/><br /><br />
</form>

<?php
    // atlyginimai
  if(isset($_POST['submit2'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];

    $minmultiple = ($a > $b) ? $a : $b;
    while(true) {
      if($minmultiple % $a == 0 && $minmultiple % $b == 0) {
        echo $a . " ir " . $b . " MBK yra: " . $minmultiple;
        break;
      } //if
      $minmultiple++;
    } // while

  } // if isset submit

 ?>
 <div>==================================================</div>
 <div>===============SVAJONIU ATLYGINIMAS================</div>
 <div>==================================================</div>

 <form action="" method="post">
 <label>Jusu dabartinis atlyginimas</label><br />
   <input type="number" name="atlyginimas" /><br /><br />
 <label>Bonusas per metus proc.</label><br />
   <input type="number" name="procentas" /><br /><br />
   <label>Jusu svajoniu atlyginimas</label><br />
   <input type="number" name="norimas" /><br /><br />
   <input type="submit" name="submit3" value="Vykdyti"/><br /><br />

 </form>



<?php
  if(isset($_POST['submit3'])) {
    $atlyginimas = $_POST['atlyginimas'];
    $norimasA = $_POST['norimas'];
    $procentas = $_POST['procentas'] * 0.01;
    $menesiai=0;


    while($atlyginimas < $norimasA) {
      $menesiai++;
      echo  Round($atlyginimas+= $atlyginimas * $procentas, 2) . "<br />";
    }
    echo "per menesius " . $menesiai;
  } // if isset submit
 ?>

<div>====================================================</div>
<div>====================================================</div>

<?php
    $color = array('white', 'green', 'red', 'blue', 'black');
    sort($color);
    var_dump($color);


 ?>
<div>========================================================</div>
         <?php
         $spalvos=array('BlanchedAlmond', 'CadetBlue', 'BurlyWood',
'DarkOliveGreen', 'HotPink', 'PapayaWhip'); ?>

       <table>
         <?php foreach ($spalvos as  $value) { ?>
           <tr>
               <td style="background-color:<?php echo $value; ?>;"><?php echo $value; ?> </td>
           </tr>

         <?php   } ?>
        </table>
<div>========================================================</div>
<div>========================================================</div>
<form action="" method="post">
  <label>Irasykite valstybe</label> <br />
  <input type="text" name="salis"/><br /><br />
  <input type="submit" name="submit6" /><br />
</form>
<?php
$ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels",
"Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris",
"Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens",
"Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid",
"Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia",
"Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin",
"Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna",
"Poland"=>"Warsaw") ;
if(isset($_POST['salis'])) {
  $salis = $_POST['salis'];
  $salis = ucfirst($salis);

  if (array_key_exists($salis, $ceu)) {
    echo "<br />". $ceu[$salis] . "<br />";
} else {
    echo "<br />Tokios salies nera<br />";
  }
}
asort($ceu);
echo "<strong>Sorting by Capitals</strong>";
foreach ($ceu as $key => $value) { ?>
  <p>
    The capital of <?php echo $key;?> is <?php echo $value; ?>
  </p>
<?php }



echo "====================================== <br />";
echo "<strong>Sorting by Country</strong>";
ksort($ceu);
foreach ($ceu as $key => $value) { ?>
  <p>
    The capital of <?php echo $key;?> is <?php echo $value; ?>
  </p>
<?php } ?>
<div>======================================================</div>
<div>===============IVESTU SKAICIU VIDURKIS================</div>
<div>======================================================</div>
<form action="" method="post">
   <label>Iveskite skaicius per kableli</label><br />
   <input type="text" name="skaiciuAibe"/><br /><br />
   <input type="submit" name="submit4" value="Skaiciuoti"/>
</form>
<?php
   if(isset($_POST['submit4'])) {
     $skaiciuAibe = $_POST['skaiciuAibe'];
     $naujasMasyvas = explode(',', $skaiciuAibe);
     $masyvoIlgis = count($naujasMasyvas);
     $suma=0;
   foreach ($naujasMasyvas as $value) {
     $suma+= $value;
   }
   echo "<br />Vidurskis yra: " . Round($suma / $masyvoIlgis, 2);
   }

 ?>
<div>=====================================================</div>
<div>=====================================================</div>
<div>=====================================================</div>
<?php
$favColors['BlanchedAlmond'] = '#ffebcd';
$favColors['CadetBlue'] = '#5f9ea0';
$favColors['BurlyWood'] = '#deb887';
$favColors['DarkOliveGreen'] = '#556b2f';
$favColors['HotPink'] = '#ff69b4';
$favColors['Papayawhip'] = '#ffefd5'; ?>
<table>
    <tr>
      <th>Color name</th>
      <th>Hex code</th>
    </tr>
 <?php foreach ($favColors as $key => $value) { ?>
     <tr>
       <td style="background: <?php echo $value; ?>;"><?php echo $key; ?></td>
       <td style="background: <?php echo $value; ?>;"><?php echo $value; ?></td>
     </tr>
 <?php } ?>
</table>
<div>===============TEMPERATUROS NUOSKAITOS======================</div>
<div>============================================================</div>

<form action="" method="post">
   <label>Iveskite temperaturos nuoskaitas (per kableli)</label><br />
   <input type="text" name="temperature"/><br /><br />
   <input type="submit" name="submit5" />
</form>

<?php
  if(isset($_POST['submit5'])) {
    $gautosReiksmes = $_POST['temperature'];
    $temperaturaM = explode(',', $gautosReiksmes);
    $isViso = 0;
    $MasyvoIlg = count($temperaturaM);
      foreach ($temperaturaM as $value) {
        $isViso+= $value;
      }
    echo "Vidutine temperatura: " . $isViso/$MasyvoIlg . " laipsniai <br />";
    echo "Viso nuoskaitu: " . $MasyvoIlg . "<br />";
    sort($temperaturaM);
    echo "Dvi didziausios temperaturos: " . $temperaturaM[$MasyvoIlg-1] . ", " . $temperaturaM[$MasyvoIlg-2] . "<br />";
    echo "Dvi maziausios temperaturos: " . $temperaturaM[0] . ", " . $temperaturaM[1] . "<br />";
  }

?>
<div>================== MENESIU VARDAI ====================</div>
<div>=====================================================</div>
<?php
$menesiuVardai = array (1=>'Sausis', 2=>'Vasaris', 3=>'Kovas', 4=>'Balandis', 5=>'Gegužė',
6=>'Birželis', 7=>'Liepa', 8=>'Rugpjutis', 9=>'Rugsėjis', 10=>'Spalis', 11=>'Lapkritis',
12=>'Gruodis');
$menesiuDienos = array (1=>31, 2=>28, 3=>31, 4=>30, 5=>31, 6=>30, 7=>31, 8=>31, 9=>30,
10=>31, 11=>30, 12=>31);

$dienos31 = array();
$dienos30 = array();
$dienos28 = array();
$isVisoDienu=0;

foreach ($menesiuDienos as $key => $value) {
    if($value == 31) {
      array_push($dienos31, $menesiuVardai[$key]);
    } else if($value == 30) {
      array_push($dienos30, $menesiuVardai[$key]);
    } else {
      array_push($dienos28, $menesiuVardai[$key]);
    }
    $isVisoDienu+=$value;
}
?>
  Metuose yra <?php echo count($dienos31);?> menesiai turintys 31 diena (
  <?php foreach ($dienos31 as $value) {
        echo $value . ", ";
  }?>
  )<br />
  Metuose yra <?php echo count($dienos30);?> mėnesiai turintys 30 dienų (
  <?php foreach ($dienos30 as $value) {
    echo $value . ", ";
  }?>
  )<br />
  Metuose yra <?php echo count($dienos28);?> mėnesiai turintys 28 dienas (
  <?php foreach ($dienos28 as $value) {
    echo $value;
  }?>
  )<br />
  Viso metuose yra <?php echo $isVisoDienu; ?> dienos<br />

    <?php foreach ($menesiuVardai as $key => $value) {
      echo $value . " yra " . $key . " menuo jis turi " . $menesiuDienos[$key] . " d. <br />";
    }?>

<div>================DIDZIAUSIAS LYGINIS SK====================</div>
<div>=========================================================</div>
    <?php //surasti didziausia lygini skaiciu
        $m = [-19, -5, -9, -4, -56, -48];
        rsort($m);
        foreach ($m as $value) {
           if($value % 2 == 0) {
             echo "didziausias lyginis skaicius yra " . $value;
             break;
           }
        }

    ?>

  <div>=========================================================</div>
  <div>=========================================================</div>



  </body>
</html>
