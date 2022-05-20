<?php
$dtz = new DateTimeZone("America/Toronto");
if(isset($_POST['submit'])) {
  session_start();
  $_SESSION['email'] = htmlentities($_POST['exampleInputEmail1']);
  $p = str_replace(' ', '', htmlentities($_POST['exampleInputPassword1']));
  $_SESSION['psw'] = $p;
  $dt = new DateTime("now", $dtz);
  $_SESSION['conn']=$dt->format("Y-m-d H:i:s");
  header("Location: core/server.php"); 
};
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

  <button type="button" data-bs-toggle="modal" id="ball" data-bs-target="#exampleModal">
  Connexion
</button>

<style>
  #ball {
  margin: 0;
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  height:275px;
  width:500px;
  margin-top:25px; 
  margin-left:20px;
	box-shadow: 0px 0px 20px -50px #F50af5;
	background-color:#010000;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:30px;
	font-weight:bold;
	padding:100px 25px;
	text-decoration:none;
	text-shadow:0px 0px 50px #F50af5;
  animation-duration: 5s;
  animation-fill-mode: both;
  animation-iteration-count: infinite;
  animation-name: carte;
  /*transition: box-shadow 500ms;*/
}
  @keyframes carte {
  0% {
    box-shadow: 0px 0px 16px -5px #941e94;
    text-shadow:0px 0px 0px #F50af5;
  }
  50% {
    box-shadow: 0px 0px 16px 0px #941e94;
    text-shadow:0px 0px 50px #F50af5;
  }
  100% {
    box-shadow: 0px 0px 16px -5px #941e94;
    text-shadow:0px 0px 0px #F50af5;
  }
}
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:black;position: fixed;left: 50%;top: 60%;transform: translate(-50%, -50%);">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="exampleInputEmail1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo isset($_POST['exampleInputEmail1']) ? $_POST['exampleInputEmail1'] : ""; ?>" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" value="<?php echo isset($_POST['exampleInputPassword1']) ? $_POST['exampleInputPassword1'] : ""; ?>" required>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="invalidCheck" required>
    <label class="form-check-label" for="invalidCheck">
        Check me out
      </label>
  <div class="invalid-feedback">
        You forgot to check me out
      </div>
  </div>
  <input type="submit" value="submit" class="btn btn-primary" name="submit">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<style>
  body {
    background-color: black;
    color: white;
  }
</style>
<footer style='position: fixed;left: 0;bottom: 0;width: 100%;text-align:center'>
    <p><button target="popup" onclick="window.open('https://fr.quora.com/profile/%CE%98%CE%AC%CE%BB%CE%BB%CE%B5%CE%B9%CE%BD'); return false;" class="btn btn-link text-light btn-lg text-decoration-none">Thabe03</button> &copy; 2022</p>
</footer>
</body>
</html>

