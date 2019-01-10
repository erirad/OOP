<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <title>title</title>
  </head>

  <style>
  td, th {
    border: 1px solid #000;
  }
  th {
    font-weight: bold;
    padding: 10px;
  }
  </style>
  <body>

    <?php
    $projects = array(
      array('id' => '1','short_name' => 'BIO-C3','year' => '2014','program' => 'BONUS','price' => '3700000'),
		array('id' => '2','short_name' => 'TRIPOLIS','year' => '2014','program' => 'LMT','price' => '79385'),
		array('id' => '4','short_name' => 'BALTCOAST','year' => '2015','program' => 'BONUS','price' => '2868208'),
		array('id' => '5','short_name' => 'BSCP','year' => '2015','program' => 'EASME','price' => '784000'),
		array('id' => '6','short_name' => 'BALMAN','year' => '2015','program' => 'LMT,  Lithuania - Latvia - China (Taiwan) research project fund','price' => '667623'),
		array('id' => '8','short_name' => 'MAURAKUMA','year' => '2014','program' => 'LMT','price' => '78921'),
		array('id' => '9','short_name' => 'BALSAM','year' => '2013','program' => 'European Commission, Marine Strategy Framework Directive pilot projects','price' => '461803'),
		array('id' => '10','short_name' => 'DEVOTES','year' => '2012','program' => 'European Commission, 7 BP','price' => '136651'),
		array('id' => '11','short_name' => 'MARES','year' => '2012','program' => 'ERASMUS MUNDUS, Horizon 2020','price' => '100800'),
		array('id' => '12','short_name' => 'VECTORS','year' => '2012','program' => 'European Commission, 7 BP','price' => '15237662'),
		array('id' => '13','short_name' => 'DENOFLIT','year' => '2010','program' => 'LIFE+ Nature & Biodiversity','price' => '1569699'),
		array('id' => '14','short_name' => 'TRUFFLE','year' => '2012','program' => 'Latvia-Lithuania Cross Border Cooperation Programme ','price' => '319440'),
		array('id' => '15','short_name' => 'LAKES FOR FUTURE','year' => '2012','program' => 'Latvia-Lithuania Cross Border Cooperation Programme ','price' => '1012554'),
		array('id' => '16','short_name' => 'IANUS','year' => '2012','program' => 'LMT','price' => '221530'),
		array('id' => '17','short_name' => 'PROTEUS','year' => '2012','program' => 'LMT','price' => '99542'),
		array('id' => '18','short_name' => 'SAMBAH','year' => '2010','program' => 'LIFE+ Nature & Biodiversity','price' => '80282'),
		array('id' => '19','short_name' => 'PREHAB','year' => '2010','program' => 'BONUS','price' => '263630'),
		array('id' => '20','short_name' => 'KRABAS','year' => '2011','program' => 'LMT','price' => '43153'),
		array('id' => '21','short_name' => 'MEECE','year' => '2008','program' => 'European Commission, 7 BP','price' => '6499745'),
		array('id' => '22','short_name' => 'EEE','year' => '2008','program' => 'The Norwegian Financial Mechanism and the Republic of Lithuania','price' => '989072'),
		array('id' => '23','short_name' => 'MOPODECO','year' => '2010','program' => 'Nordic countries Council of Ministers','price' => '100544'),
		array('id' => '24','short_name' => 'Cross-border DISCOS','year' => '2012','program' => 'Latvia-Lithuania Cross Border Cooperation Programme ','price' => '778108'),
		array('id' => '25','short_name' => 'Cross-border DISCOS','year' => '2012','program' => 'Latvijos ir Lietuvos bendradarbiavimo per sieną programa - LATLIT','price' => '778'),
		array('id' => '26','short_name' => 'JRTC','year' => '2010','program' => 'LATLIT, Interreg, Latvia-Lithuania Cross Border Cooperation Programme ','price' => '528793')
    );
    ?>
<?php

$sortingBy = "ASC";
if(isset($_GET["sort"])){
    $sort = $_GET["sort"];
    $sorting = $_GET["sortingBy"];
    if($sorting == "ASC") {
          function cmp($a, $b) {
            global $sort;
            if ($a[$sort] == $b[$sort]) {
              return 0;
            }
            return ($a[$sort] < $b[$sort]) ? -1 : 1;
          }

      uasort($projects, 'cmp');
      $sortingBy = "DESC";

    } else {
          function cmp($a, $b) {
            global $sort;
            if ($a[$sort] == $b[$sort]) {
              return 0;
            }
            return ($a[$sort] > $b[$sort]) ? -1 : 1;
          }
          uasort($projects, 'cmp');
          $sortingBy = "ASC";
    } //else
} //if isset




 ?>
 <form>

   <table>
     <tr>
       <td colspan="5">Vykdomi projektai</td>
     </tr>
     <tr>
       <th>Pasirinkti</th>
       <th>Sutrumpintas</th>
       <th>Metai <a href="?sort=year&sortingBy=<?php echo $sortingBy;?>" onclick="functionM()"><i id="change" class="fas fa-angle-double-down"></i></a></th>
       <th>Programa</th>
       <th>Suma <a href="?sort=price&sortingBy=<?php echo $sortingBy;?>" onclick=""><i class="fas fa-arrow-alt-circle-down"></i></a></th>
     </tr>
   <?php
   // kad spausdintu tik nuo antro
    foreach ($projects as $key => $value) { ?>
      <tr>
        <td>
          <input type="checkbox" name="check<?php echo $key;?>" value="<?php echo $projects[$key]['price']?>" />
        </td>
          <?php foreach (array_slice($projects[$key], 1) as $colm): ?>
            <td> <?php echo $colm; ?></td>
          <?php endforeach; ?>
       </tr>
    <?php } ?>
</table>
<input type="submit" name="submit" value="Skaiciuoti"/>
</form>

<script>
function functionM() {
  document.getElementById("change").classList.add("fa-angle-double-up");
  document.getElementById("change").classList.remove("fa-angle-double-down");

}


</script>

<?php
$isviso = 0;

    foreach ($projects as $key => $value) {
      if(isset($_GET["check$key"])){
    $isviso+= $_GET["check$key"];
       }
   }
?>
<p>Visu projektu suma yra: <?php echo $isviso; ?> Eur.</p>
<?php
// i lentele ispausdinam metus
$metai = array();
  for($i=0; $i<count($projects); $i++) {
    if(!in_array($projects[$i]['year'], $metai)){
    array_push($metai, $projects[$i]['year']);
    }
  }
sort($metai);
 ?>

<table>
   <tr>
     <td colspan="7">Pajamos</td>
   </tr>
   <tr>
      <?php foreach ($metai as $value): ?>
        <th><?php echo $value;?> </th>
      <?php endforeach; ?>
   </tr>
   <tr>
     <?php
     $sum2008=0;
      $sum2010=0;
      $sum2011=0;
     $sum2012=0;
      $sum2013=0;
       $sum2014=0;
        $sum2015=0;


          foreach ($projects as $value) {
            if($value['year'] == 2008) {
              $sum2008+=$value['price'];
            }
            if($value['year'] == 2010) {
              $sum2010+=$value['price'];
            }
            if($value['year'] == 2011) {
              $sum2011+=$value['price'];
            }
            if($value['year'] == 2012) {
              $sum2012+=$value['price'];
            }
            if($value['year'] == 2013) {
              $sum2013+=$value['price'];
            }
            if($value['year'] == 2014) {
              $sum2014+=$value['price'];
            }
            if($value['year'] == 2015) {
              $sum2015+=$value['price'];
            }
          }
        ?>
        <td> <?php echo $sum2008; ?></td>
        <td> <?php echo $sum2010; ?></td>
        <td> <?php echo $sum2011; ?></td>
        <td> <?php echo $sum2012; ?></td>
        <td> <?php echo $sum2013; ?></td>
        <td> <?php echo $sum2014; ?></td>
        <td> <?php echo $sum2015; ?></td>
   </tr>
</table>

<div>===============================================================================</div>
<div>===============================================================================</div>
<div>===============================================================================</div>
<div>===============================================================================</div>
<?php
$skelbimai = array(
		array('id' => '17976','text' => 'Viešbutis Šventojoje ,, Pajūrio sodyba\'\' nuolatiniam darbui ieško administratorių ir virėjos vasaros sezonui. Skambinti 869333133 ','cost' => '542','onPay' => '1493195731'),
		array('id' => '17885','text' => 'Ieskoma Valytoja nedideliam viesbutukui Palangoje, vasaros sezonui. Patirtis dirbant viesbutyje privalumas.','cost' => '214','onPay' => '0'),
		array('id' => '17533','text' => 'TINKAVIMAS KALKINIU SKIEDINIU KOKYBIŠKAI IR NEBRANGIAI.TURIME 20 METŲ PATIRTĮ IR LABAI GERĄ REPUTACIJĄ. 868408837','cost' => '884','onPay' => '1490043275'),
		array('id' => '17532','text' => 'Parduodamas tvarkingas didelis mūrinis garažas su rūsiu,45kvadratai bendro ploto,bangu g. prie Medvalakio 860584184','cost' => '512','onPay' => '1489947320'),
		array('id' => '17485','text' => 'Ieskoma Valytoja nedideliam viesbutukui Palangoje, vasaros sezonui. Patirtis dirbant viesbutyje privalumas.','cost' => '214','onPay' => '0'),
		array('id' => '17303','text' => 'Perkame įvairius automobilius, mikroautobusus. Tvarkingus, su defektais, daužtus. 864691263','cost' => '800','onPay' => '1488368780'),
		array('id' => '17302','text' => 'Pirkčiau katerį-valtį su varikliu. Gali būti su defektu, apleistas. 864691263','cost' => '400','onPay' => '1488368133'),
		array('id' => '17102','text' => 'Parduodu geros būklės jūrinį konteinerį. Galima naudoti kaip sandėlį. Tel. 865988820','cost' => '400','onPay' => '1485962389'),
		array('id' => '16992','text' => 'Parduodu dideli mūrini garažą  Bangų g. prie Medvalakio,garažas sausas, tvarkingas su rūsiu,yra elektra .Garažas 22m²  rūsys taip pat 22m²','cost' => '382','onPay' => '0'),
		array('id' => '16989','text' => 'Ieškau apleisto 6 arų sklypo soduose: sodinimui, mašinos nusiplovimui. Gal kas turi nereikalingą ir neparduoda. Galėčiau prižiūrėti. Tel. 8 609 76193.','cost' => '168','onPay' => '1484996260'),
		array('id' => '16694','text' => 'Sportiškas ir išsilavinęs vyriškis, skaitantis ir informaciją suvokiantis daugeliu Europos kalbų, ieško bet kokio darbo (3 dienas per savaitę) su oriu atlyginimu. Darbo pasiūlymus siųsti el. paštu jamamsitadarba@gmail.com','cost' => '466','onPay' => '1481212052'),
		array('id' => '16626','text' => 'Parduodu avieną (gimę š. m. kovą – balandį ), mėsa puikaus skonio, neturi būdingo specifinio kvapo, galima pirkti ir po pusę avinuko ar užsisakyti artėjančioms šventėms, atvežu. Kaina 5 €/ kg., tel.nr. 8 678 35 932.','cost' => '1864','onPay' => '1480663237'),
		array('id' => '16554','text' => 'Kokybiškai klijuoju plyteles. Turiu ilgametę patirtį.','cost' => '200','onPay' => '0'),
		array('id' => '16515','text' => 'Dazymo,glaistymo darbai su amerikietiska įranga.Didele darbo patirtis.+37062700070','cost' => '400','onPay' => '0'),
		array('id' => '16311','text' => 'Pirkčiau 2 kambarių butą iki 30000 eurų.','cost' => '200','onPay' => '0'),
		array('id' => '16172','text' => 'Parduodamas naujos statybos 122 kv. m. namas Vydmantuose. Kaina - 78000 Eur. Tel. 8 659 88820','cost' => '214','onPay' => '0'),
		array('id' => '16171','text' => 'Parduodamas naujos statybos 122 kv. m. namas Vydmantuose. Kaina - 78000 Eur. Tel. 8 659 88820','cost' => '214','onPay' => '0'),
		array('id' => '16169','text' => '5 mergaitiškas (150-170 cm) žiemines striukes. 846053024','cost' => '100','onPay' => '0'),
		array('id' => '16168','text' => 'Eko BRIKETAI Gamintoju kainomis','cost' => '500','onPay' => '0')
);
?>
<table>
   <tr>
     <th>ID</th>
     <th>Skelbimas</th>
     <th>Kaina</th>
     <th>Apmoketa</th>
   </tr>
   <?php foreach ($skelbimai as $skelbimas): ?>
          <tr>
            <?php foreach ($skelbimas as $value): ?>
               <?php if($value == end($skelbimas) && $value > 0) { ?>
                 <td><?php echo date("Y-m-d", $value); ?></td>
              <?php } else { ?>
                <td><?php echo $value; ?></td>
            <?php  }?>



            <?php endforeach; ?>
          </tr>
   <?php endforeach; ?>
</table>
<?php
$skelbimuKiekis = 0;
$apmoketiSkelmimai = 0;
$apmoketaSuma = 0;
$neapmoketaSuma = 0;
for($i=0; $i<count($skelbimai); $i++) {
  if($skelbimai[$i]['onPay'] > 0) {
    $apmoketaSuma+= $skelbimai[$i]['cost'];
    $apmoketiSkelmimai++;
  } else {
    $neapmoketaSuma+= $skelbimai[$i]['cost'];
  }
$skelbimuKiekis++;
}
echo "Is viso skelbimu kiekis yra: " . $skelbimuKiekis . "<br />";
echo "Apmoketu skelbimu yra: " . $apmoketiSkelmimai . "<br />";
echo "Apmoketu skelbimu suma is viso yra: " . $apmoketaSuma . " Eur.<br />";
echo "Truksta apmokejimo uz skelbimus: " . $neapmoketaSuma . " Eur.<br />";
 ?>

 <?php
 $arrayNumbers = [3.45, 2.55, 5.76, 3.87, 6.78, 7.99, 4.54, 8.11, 3.71, 5.53];
 $arrayCopy = $arrayNumbers;

 for($i=0; $i<count($arrayNumbers); $i++) {
   if($arrayNumbers[$i] == $arrayNumbers[0]) {
     $arrayNumbers[0] = Round(($arrayNumbers[0] + $arrayNumbers[1]) / 2);
   } elseif($arrayNumbers[$i] == $arrayNumbers[count($arrayNumbers) -1]) {
     $arrayNumbers[count($arrayNumbers) -1] = Round(($arrayNumbers[count($arrayNumbers) -1] + $arrayNumbers[count($arrayNumbers) -2]) / 2);
   } else {
     $arrayNumbers[$i] = Round(($arrayNumbers[$i -1] + $arrayNumbers[$i] + $arrayNumbers[$i +1]) / 3);
   }
 }
 ?>

 <table>
   <?php for($j=0; $j<count($arrayNumbers); $j++) {
     echo "<tr>";
     echo "<td>" . $arrayCopy[$j] .  "</td>";
     echo "<td>" . $arrayNumbers[$j] .  "</td>";
     echo "</tr>";
   } ?>
 </table>
 <div>==================================================================================</div>
 <div>==================================================================================</div>
 <div>==================================================================================</div>
 <div>==================================================================================</div>




  </body>
</html>
