<?php
include '../header.php';

if(isset($_GET['name'])){
$n = htmlentities($_GET['name']);}

?>
  
  <li><a href="variable.php?name=Brad">Brad</a></li>
  <h1><?php if(isset($n)){echo "{$n}'s Profile";} ?></h1>

<?php 

include '../footer.php';
?>