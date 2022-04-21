<?php 

include 'index.php';

if (filter_has_var(INPUT_POST, 'e')) { //bool|filter_has_var(int, string): bool
    if (filter_input(INPUT_POST, 'e', FILTER_VALIDATE_EMAIL)) { //mixed|filter_input(int, string, int, array|int 0)
        echo "Email is valid\n";
    } else {
        echo "Email is NOT valid\n";
    }
}
//validate only

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <!--refresh sur le même fichier php-->
    <label>
        <input type="text" name="e">
        <!--1.type définie-->
    </label>
    <button type="submit">Submit</button>
</form>