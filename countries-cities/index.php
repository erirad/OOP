<!DOCTYPE html>
<?php include 'country.php';?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>lia</title>
  </head>
  <body>
<style>
th, td {
  border: 1px solid #000;
}
</style>

<table>
  <tr>
    <th>Pavadinimas</th>
    <th>Kodas</th>
    <th>Plotas</th>
  </tr>
<!-- LIETUVA -->
  <tr>
      <td>
        <?php $lt = new Country("LT"); ?>
<button value="<?php echo $lt->getCode();?>" onclick="showUser(this.value)"><?php echo $lt->getName(); ?></button>
      </td>
      <td>
        <?php echo $lt->getCode(); ?>
      </td>
      <td>
        <?php echo $lt->getSurfaceArea(); ?>
      </td>
  </tr>
  <!-- ESTIJA -->
  <tr>
    <td>
       <?php $ee = new Country("EE"); ?>
       <button value="<?php echo $ee->getCode();?>" onclick="showUser(this.value)"><?php echo $ee->getName(); ?></button>
    </td>
      <td>
        <?php echo $ee->getCode(); ?>
      </td>
      <td>
        <?php echo $ee->getSurfaceArea(); ?>
      </td>
  </tr>
  <!-- LATVIJA -->
  <tr>
    <td>
      <?php $lv = new Country("LV"); ?>
<button value="<?php echo $lv->getCode();?>" onclick="showUser(this.value)"><?php echo $lv->getName(); ?></button>
    </td>
      <td>
        <?php echo $lv->getCode(); ?>
      </td>
      <td>
        <?php echo $lv->getSurfaceArea(); ?>
      </td>
  </tr>
  <!-- LENKIJA -->
  <tr>
    <td>
      <?php $p = new Country("P"); ?>
<button value="<?php echo $p->getCode();?>" onclick="showUser(this.value)"><?php echo $p->getName(); ?></button>
    </td>
      <td>
        <?php echo $p->getCode(); ?>
      </td>
      <td>
        <?php echo $p->getSurfaceArea(); ?>
      </td>
  </tr>


</table>

<div id="txtHint"><b>All info about cities</b></div>


  </body>
  <script>
  function showUser(str) {
    if (str=="") {
      document.getElementById("txtHint").innerHTML="";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else { // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("txtHint").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","copyCity.php?code="+str,true);
    xmlhttp.send();
  }
</script>
</html>
