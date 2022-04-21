<?php

include 'index.php';

if (filter_has_var(INPUT_POST, 'submit')) { //bool|filter_has_var(int, string): bool
    $e = htmlentities($_POST['e']);
    $e = htmlentities(filter_input(INPUT_POST, 'e', FILTER_SANITIZE_EMAIL)); //mixed|filter_input(int, string, int, array|int 0)
    if (filter_var($e, FILTER_VALIDATE_EMAIL)) { //mixed|filter_var(depend, int, array|int 0)
        echo "Email ".$e." is valid\n";
    } else {
        echo "Email is NOT valid\n";
    }
}
//play with data

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <!--refresh sur le même fichier php-->
    <label>
        <input type="text" name="e">
      <!--1.type définie-->
    </label>
    <button type="submit" name="submit">Submit</button>
</form>