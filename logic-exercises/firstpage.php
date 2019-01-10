<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>First</title>
  </head>
  <body>

<?php
function page($link) {
    if(isset($_SESSION['connect'])) {
          if($_SESSION['connect'] == true){
            return $link;
        } else {
            return "08-06.php";
        } //else
    } //if isset
      return "08-06.php";
} // function

?>
    <div class="card text-center">
 <div class="card-header">
   <ul class="nav nav-tabs card-header-tabs">
     <li class="nav-item">
       <a class="nav-link active" href="#">Active</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo page('2d-masyvai.php');?>">Puslapis 1</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo page('last.php');?>">Puslapis 2</a>
     </li>
   </ul>
 </div>
 <div class="card-body">
   <h5 class="card-title">Special title treatment</h5>
   <p class="card-text">With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 </div>
</div>

<div class="jumbotron text-center">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
