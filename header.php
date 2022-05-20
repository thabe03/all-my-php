<?php
session_start();
if (empty($_SESSION['email']) == 1 || empty($_SESSION['psw']) == 1)
{
    echo "404";
    exit;
}

$page = [
'calcul' => 'core/calcul.php',
'database' => 'database/database.php',
'email' => 'core/email.php',
'email2' => 'core/email2.php',
'images' => 'database/images.php',
'marvel' => 'api/marvel.php',
'movie' => 'api/movie.php',
'name' => 'core/name.php',
'post' => 'core/post.php',
'server' => 'core/server.php',
'unesco' => 'api/unesco.php',
'variable' => 'core/variable.php'
];

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
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Home</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Core
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach ($page as $k => $v)
{
    if (strpos($v, 'core') !== false)
    { ?>
            <li><a class="dropdown-item" href="<?php echo "https://all-my-php.thabe03.repl.co/$v"; ?>"><?php echo ucfirst($k); ?></a></li>
            <?php
    }
} ?></ul></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Api
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach ($page as $k => $v)
{
    if (strpos($v, 'api') !== false)
    { ?>
            <li><a class="dropdown-item" href="<?php echo "https://all-my-php.thabe03.repl.co/$v"; ?>"><?php echo ucfirst($k); ?></a></li>
            <?php
    }
} ?></ul></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Database
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach ($page as $k => $v)
{
    if (strpos($v, 'database') !== false)
    { ?>
            <li><a class="dropdown-item" href="<?php echo "https://all-my-php.thabe03.repl.co/$v"; ?>"><?php echo ucfirst($k); ?></a></li>
            <?php
    }
} ?></ul></li>
    </ul>
    
    </div>
  </div>
</nav>
<br/>
