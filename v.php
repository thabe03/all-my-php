<?php
session_start();
if(empty($_SESSION['email'])==1 || empty($_SESSION['psw'])==1){
  echo "404";
  exit;
}

$n = htmlentities($_GET['name']);
$s = htmlentities($_GET['site']);
header("Location: {$s}");
?>
<!DOCTYPE html>
<html>
<head>
   <title>My Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
  <div id="div">
    <ul>
        <li><a href="v.php?name=Brad">Brad</a></li>
        <li><a href="s.php">Redirection vers Server</a></li>
    </ul>
    <br>
    <h1><?php echo "{$n}'s Profile"; ?></h1>
  </div>
  <style>
    #div {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>

<?php

include 'footer.php';

?>