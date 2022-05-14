<?php
session_start();
if(empty($_SESSION['email'])==1 || empty($_SESSION['psw'])==1){
  echo "404";
  exit;
}

include 'header.php';

$dbhost = 'remotemysql.com';
$dbuser = getenv('username');
$dbname = getenv('username');
$dbpass = getenv('dbpass');
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$db){
    die("Couldn't fetch data: " . mysqli_connect_error());
}

if (filter_has_var(INPUT_POST, 'submit')) {
  $e = htmlentities(str_replace(" ","",$_POST['e']));
  $p = htmlentities(str_replace(" ","",$_POST['p']));
  $q3 = "SELECT * FROM Users WHERE Email = '$e'";
  $query3 = mysqli_query( $db, $q3 );
  $num_rows = mysqli_num_rows($query3);
  if($num_rows == 0) {
    $msg = "";
    $q = "INSERT INTO Users (Email,Pass)"
      ." VALUES "
      ."('$e','$p')";
    mysqli_query($db, $q); 
  } else {
    $msg = htmlentities('The user already exist');
  }  
}
$q2 = "SELECT * FROM Users";
$query = mysqli_query($db, $q2);
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
      while ($retval = mysqli_fetch_array($query))
      {    
        echo "<tr>";     
            echo "<td>{$retval['Email']}</td>";   
            echo "<td>{$retval['Pass']}</td>";
        echo "</tr>";
      } 
    ?>
  </tbody>
</table>

<?php

include 'footer.php';
mysqli_close($db);
?>