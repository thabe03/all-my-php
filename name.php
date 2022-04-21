<?php

include 'index.php';

if (isset($_GET['name'])) {
    $n = htmlentities($_GET['name']);
    //protège attaque xss
}

?>

<ul>
    <li><a href="name.php?name=Brad">Brad</a></li>
</ul>

<h1><?php echo "{$n}'s Profile"; ?></h1>