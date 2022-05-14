<?php
session_start();
if(empty($_SESSION['email'])==1 || empty($_SESSION['psw'])==1){
  echo "404";
  exit;
}

include 'header.php';

if (filter_has_var(INPUT_POST, 'submit')) {
    $n = htmlentities($_POST['n']);
    $e = htmlentities($_POST['e']);
    $m = htmlentities($_POST['m']);
    if (!empty($e) && !empty($n) && !empty($m)) {
        if (filter_input(INPUT_POST, 'e', FILTER_VALIDATE_EMAIL)) {
          $toEmail = 'xi1le7@gmail.com';
          $subject = 'PHP';
          if(mail($toEmail, $subject, $m, 'Bonjour')){
            $or= "Your email has been sent";
          } else {
            $msg= "Your push has failed";
          }
        }else {
            $msg = htmlentities('Email is NOT valid');
        }
    } else {
        $msg = htmlentities('Please fill in all fields');
    }
}

?>

<?php if (isset($msg)) { ?>
    <div id="w" class="b"><?php echo $msg; ?></div>
<?php } ?>
<?php if (isset($or)) { ?>
    <div id="s" class="b"><?php echo $or; ?></div>
<?php } ?>
  
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="n" class="l n">Name:
        <input type="text" class="in" id="n" name="n" value="<?php echo isset($_POST['n']) ? $n : ""; ?>">
    </label>
    <br></br>
    <label for="e" class="l e">Email:
        <input type="text" class="in" id="e" name="e" value="<?php echo isset($_POST['e']) ? $e : ""; ?>">
    </label>
    <label for="m" class="l m">Message:
        <input type="text" class="in" id="m" name="m" value="<?php echo isset($_POST['m']) ? $m : ""; ?>">
    </label>
    <input type="submit" name="submit" class="submit">
</form>

<style>

.b {
    animation-name: bounce;
    animation-duration: 5s;
    /*temps entre*/
    animation-iteration-count: infinite;
    /*iteration*/
    position: relative;
    left: 50%;
}

#w {
    box-shadow: 0px 0px 50px 29px #c21b1b;
    background-color: #c74545;
    border-radius: 42px;
    border: 12px solid #ab1919;
    display: inline-block;
    color: #ffffff;
    font-family: Arial;
    font-size: 28px;
    padding: 10px 19px;
    text-decoration: none;
    text-shadow: 0px 0px 50px #662a2a;
}

#s {
    box-shadow: 0px 0px 50px 29px #3dc21b;
    background-color: #44c767;
    border-radius: 42px;
    border: 12px solid #18ab29;
    display: inline-block;
    color: #ffffff;
    font-family: Arial;
    font-size: 28px;
    padding: 10px 19px;
    text-decoration: none;
    text-shadow: 0px 0px 50px #2f6627;
}

@keyframes bounce {
    0% {
        top: 0px;
        /*0*/
    }
    50% {
        top: 30px;
    }
    100% {
        top: 0px;
        /*0*/
    }
}

@keyframes weirdo {
    0% {
        transform: scale(0.5);
        /*0*/
    }
    50% {
        transform: scale(1.5);
    }
    100% {
        transform: scale(0.5);
        /*0*/
    }
}

.n {
    position: absolute;
    top: 20%;
    left: 50px;
}

.e {
    position: absolute;
    left: 50px;
    bottom: 20%;
}

.m {
    position: absolute;
    right: 120px;
    bottom: 30%;
}
  
.in {
    box-shadow: 0px 0px 50px 12px #899599;
    background: linear-gradient(to bottom, #ff00ff 5%, #000000 100%);
    background-color: #ff00ff;
    border-radius: 42px;
    border: 12px solid #ffffff;
    display: inline-block;
    cursor: auto;
    color: #00d0ff;
    font-family: Arial;
    font-size: 17px;
    padding: 20px 20px;
    text-decoration: none;
    text-shadow: 9px 0px 6px #0015ff;
    position: relative;
    left: 40px;
}

.l {
    background-color: rgba(0, 0, 0, 0);
    display: inline-block;
    cursor: pointer;
    color: #f5e2f5;
    font-family: Arial;
    font-size: 11px;
    font-weight: bold;
    padding: 3px 8px;
    text-decoration: none;
    text-shadow: 0px 1px 1px #ffffff;
}

.submit {
    box-shadow: 0px 0px 50px 14px #0048ff;
    background-color: transparent;
    border-radius: 20px;
    border: 1px solid #d500ff;
    display: inline-block;
    cursor: pointer;
    color: #0022ff;
    font-family: Arial;
    font-size: 28px;
    padding: 8px 23px;
    text-decoration: none;
    text-shadow: 6px 7px 3px #0048ff;
    position: absolute;
    left: 42%;
    top: 50%;
    animation-name: weirdo;
    animation-duration: 1.2s;
    /*temps entre*/
    animation-iteration-count: infinite;
    /*iteration*/
}
</style>

<?php

include 'footer.php';

?>