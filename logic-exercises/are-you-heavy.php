<style>
body {
  background-color: rgb(168, 214, 174);
}
p {
  background-color: rgb(54, 179, 100);
  width: 22%;
  padding: 20px;
  margin: 7% auto;
  border-radius: 4px;
  font-weight: bold;
}
table {
  margin: 0 auto;
}
  td, th {
    border: 1px solid #000;
    padding: 10px;
  }
  tr {
    opacity: 0.5;
  }
  .bold {
    font-weight: normal;
    opacity: 0.5;
    animation: change 2s infinite;
  }
  @keyframes change {
    from {opacity: 0.5; font-weight: bold;}
    to {opacity: 1; font-weight: bold;}
}

</style>
<?php
if(isset($_POST['submit'])) {
  $errorMessage = "";
  $ugis = $_POST['ugis'];
  $svoris = $_POST['svoris'];
if(empty($ugis) || empty($svoris) || $ugis <= 0 || $svoris <= 0) {
  $errorMessage = "IVESKITE SAVO UGI IR SVORI";
  echo "<p>" . $errorMessage . "</p>";
  echo "<p><a href='index.php'>Grizti atgal</a></p>";
}
if(empty($errorMessage)) {
  $ugis/=100;
  $rez = $svoris / ($ugis * $ugis);
?>
<p> Jusu KMI: <?php echo round($rez, 1); ?></p>
<table>
  <tr class="bold">
    <th>KMI</th>
    <th>Isvada</th>
  </tr>
  <tr <?php if($rez <= 18.5) { echo "class='bold'";}?>>
    <td> < 18,5</td>
    <td>Per mazas svoris, mitybos nepakankamumas</td>
  </tr>
  <tr <?php if($rez >= 18.5 && $rez <= 24.99999) { echo "class='bold'";}?>>
    <td>18,5 - 24,9</td>
    <td>Normalus svoris, normali kuno mase</td>
  </tr>
  <tr <?php if($rez >= 25 && $rez <= 29.99999) { echo "class='bold'";}?>>
    <td>25,0 - 29,9</td>
    <td>Antsvoris</td>
  </tr>
  <tr <?php if($rez >= 30 && $rez <= 34.99999) { echo "class='bold'";}?>>
    <td>30,0 - 34,9</td>
    <td> I laipsnio nutukimas</td>
  </tr>
  <tr <?php if($rez >= 35 && $rez <= 39.99999) { echo "class='bold'";}?>>
    <td>35,0 - 39,9</td>
    <td>II laipsnio nutukimas</td>
  </tr>
  <tr <?php if($rez >= 40) { echo "class='bold'";}?>>
    <td> > 40,0</td>
    <td>III laipsnio nutukimas</td>
  </tr>


</table>

<?php
  echo "<p><a href='index.php'>Grizti atgal</a></p>";
 }} ?>
