<?php
session_start();
if(empty($_SESSION['email'])==1 || empty($_SESSION['psw'])==1){
  echo "404";
  exit;
}

include 'header.php';

if (isset($_GET['n'])) {
    $n = htmlentities($_GET['n']);
    //protège attaque xss
    echo $n;
}

?>

<form method="get" action="<?php echo $_SERVER ["PHP_SELF"];?>">
    <label for="n">
        <input type="text" id="n" name="n">
    </label>
    <input type="submit" value="Soumettre">
</form>

<?php

include 'footer.php';

?>