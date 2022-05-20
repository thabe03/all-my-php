<?php

include '../header.php';

include '../connexion.php';

if (filter_has_var(INPUT_POST, 'submit')) {
  $e = htmlentities(str_replace(" ","",$_POST['e']));
  $p = htmlentities(str_replace(" ","",$_POST['p']));
  $query3 = $pdo->prepare("SELECT * FROM Users WHERE Email = '$e'");
  $query3->execute();
  if($query3->rowCount()) {
    $msg = htmlentities('The user already exist');
  } else {
    $msg = "";
    $q = "INSERT INTO Users (Email,Pass)"
      ." VALUES "
      ."('$e','$p')";
    $qp = $pdo->prepare($q);
    $qp->execute();
  }  
}
$q2 = "SELECT * FROM Users";
$query = $pdo->prepare($q2);
$query->execute();
$all = $query->fetchAll(PDO::FETCH_ASSOC);
$query->closeCursor();
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <?php if (isset($msg)&&!empty($msg)) { ?>
    <div class="alert alert-danger" role="alert"><?php echo $msg; ?></div>
<?php } ?>
  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create a query</h5>
  <div class="form-outline mb-4">
    <input type="email" class="form-control form-control-lg" placeholder="Email address" name="e" value="<?php echo isset($_POST['e']) ? $e : ""; ?>"/>
  </div>
  <div class="form-outline mb-4">
    <input type="password" class="form-control form-control-lg" placeholder="Password" name="p" value="<?php echo isset($_POST['p']) ? $p : ""; ?>"/>
  </div>
  <div class="pt-1 mb-4">
    <button name="submit" class="btn btn-dark btn-lg btn-block" type="submit">Create</button>
  </div>
</form>

<table class="table-dark">
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($all as $a)
      {    
        echo "<tr>";     
            echo "<td>{$a['Email']}</td>";   
            echo "<td>{$a['Pass']}</td>";
        echo "</tr>";
      } 
    ?>
  </tbody>
</table>

<?php

include '../footer.php';
$pdo=null;

?>