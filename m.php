<?php
session_start();
if(empty($_SESSION['email'])==1 || empty($_SESSION['psw'])==1){
  echo "404";
  exit;
}

include 'header.php';

try {
$v = htmlentities($_GET['v']);
$v = false;
if (filter_has_var(INPUT_POST, 'submit')) {
  $e = htmlentities($_POST['e']);
  $u = rawurlencode($e);
  $a = getenv("apikey");
  $ts = strtotime('now');
  $p = getenv("privatekey");
  $t = $ts.$p.$a;
  $h = md5($t);
  $l = "https://gateway.marvel.com:443/v1/public/characters?name=$u&ts=$ts&apikey=$a&hash=$h";
  $json = file_get_contents($l);
  $d = json_decode($json);
  if($d->code==200 && isset($d->data->results[0]->name)){
    $v = true;
  } else {
    $msg = "Le personnage n'existe pas";
    $v = false;
  }
}} catch(Exception $e){
  echo $e;
}
  
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <?php if (isset($msg)) { ?>
    <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
<?php } ?>
  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Recherche de super Héro</h5>
  <div class="form-outline mb-4">
    <input type="text" class="form-control form-control-lg" placeholder="super Héro" name="e" value="<?php echo isset($_POST['e']) ? $e : ""; ?>"/>
  </div>
  <div class="pt-1 mb-4">
    <button name="submit" class="btn btn-dark btn-lg btn-block" type="submit">Recherche</button>
  </div>
</form>

<?php if (filter_has_var(INPUT_POST, 'submit')&&$v) { ?>
<div class="card mb-3" style="max-width: 540px; color:black;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php 
$i = $d->data->results[0]->thumbnail;
echo $i->path.".".$i->extension; 
?>" class="img-fluid rounded-start ps-2" style="width: 100%;height: 100%;object-fit: contain;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $d->data->results[0]->name; ?></h5>
        <p class="card-text"><?php echo $d->data->results[0]->description; ?></p>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<?php

include 'footer.php';

?>