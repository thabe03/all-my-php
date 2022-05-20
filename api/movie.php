<?php

include '../header.php';

try {
$v = htmlentities($_GET['v']);
$v = false;
if (filter_has_var(INPUT_POST, 'submit')) {
  $e = htmlentities($_POST['e']);
  $q = str_replace(" ","+",$e);
  $a = getenv('apikeymov');
  $l = "https://api.themoviedb.org/3/search/movie?api_key=$a&query=$q&language=fr&region=CA";
  $json = file_get_contents($l);
  $d = json_decode($json);
  if(!($d->results==[])){
    $t = $d->results[0]->id;
    $lt = "https://api.themoviedb.org/3/movie/$t/videos?api_key=$a&language=fr";
    $jsont = file_get_contents($lt);
    $dt = json_decode($jsont);
    $y = $dt->results[4]->key;
    $v = true;
  } else {
    $msg = "Le film n'existe pas";
    $v = false;
  }
}} catch(Exception $e){
  echo $e;
}
  
?>

<style>
  nav {
    background: url("https://www.themoviedb.org/assets/2/v4/logos/v2/blue_long_2-9665a76b1ae401a510ec1e0ca40ddcb3b0cfe45f1d51b77a308fea0845885648.svg");
  }
</style>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <?php if (isset($msg)) { ?>
    <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
<?php } ?>
  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Recherche de film</h5>
  <div class="form-outline mb-4">
    <input type="text" class="form-control form-control-lg" placeholder="film" name="e" autocomplete="off" value="<?php echo isset($_POST['e']) ? $e : ""; ?>"/>
  </div>
  <div class="pt-1 mb-4">
    <button name="submit" class="btn btn-dark btn-lg btn-block" type="submit">Recherche</button>
  </div>
</form>

<?php if (filter_has_var(INPUT_POST, 'submit')&&$v) { ?>  <div class="container text-dark">
  <div class="row">
    <?php if(!empty($y)) { ?>
    <div class="col-6 col-lg-6 background"">
    <?php }?>
<div class="card mb-3 mt-4">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php 
$i = $d->results[0]->backdrop_path;
echo "https://image.tmdb.org/t/p/w500$i"; 
?>" class="img-fluid rounded-start" style="object-fit:cover;width:100%;height:100%;"/>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $d->results[0]->original_title; ?></h5>
        <p class="card-text"><?php echo $d->results[0]->overview; ?></p>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>
<?php if(!empty($y)) { ?>
  <div class="col-6 col-lg-6 background">
  <iframe width="100%" height="345" src="<?php echo "https://www.youtube.com/embed/".$y ?>">
</iframe>
  </div>
<?php } ?>     
</div>
</div>

<?php

include '../footer.php';

?>