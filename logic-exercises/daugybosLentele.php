<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style>
    td {
      border: 1px solid #000;
      padding: 13px;
    }
    .blue {
      background-color: rgb(69, 161, 193);
    }
  </style>
  <body>
<table>

<tr>
  <td> x </td>
  <?php
      for($i=0; $i<=12; $i++) {
        echo "<td class='blue'>" . $i . "</td>";
      }
   ?>
</tr>
<?php
for($j=0; $j<=12; $j++) {
    echo "<tr>
    <td class='blue'>" . $j . "</td>";
      for($k=0; $k<=12; $k++) {
      echo "<td>" .  $j * $k . "</td>";
      }
    echo "</tr>";
}
?>


</table>
  </body>
</html>
