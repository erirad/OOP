<?php
session_start();
$vardas = "f7f7591403c6c431053920223069550a";
$slaptazodis = "f7f7591403c6c431053920223069550a";
?>
<form action="" method="post">
  <label>Iveskite vartotojo varda</label>
  <input type="text" name="name" /><br /><br />
  <label>Iveskite slaptazodi</label>
  <input type="password" name="pass" /><br /><br />
  <input type="submit" name="submit" value="Prisijungti" />
</form>
<?php
if(isset($_POST['submit'])) {
  $name = md5($_POST['name']);
  $pass = md5($_POST['pass']);
  if($name == $vardas && $pass == $slaptazodis) {
  $_SESSION['connect'] = true;
  header('Location: firstpage.php');
  } else {
  echo "Username or password is incorrect";
  }
}


 ?>
