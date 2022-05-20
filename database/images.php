<?php

include '../header.php';

include '../connexion.php';

if (is_uploaded_file($_FILES['fic']['tmp_name']))
{
    $img_taille = $_FILES['fic']['size'];
    $img_type = $_FILES['fic']['type'];
    $img_nom = $_FILES['fic']['name'];
    $img_blob = addslashes(file_get_contents($_FILES['fic']['tmp_name']));

    if ($img_taille > 64000)
    {
        $msg = "Trop gros !";
    }
    else
    {
        $msg = "";
        $q = "INSERT INTO `images` (`img_nom`, `img_taille`, `img_type`, `img_blob`) VALUES ('$img_nom','$img_taille','$img_type','$img_blob')";

        $qp = $pdo->prepare($q);
        $qp->execute();
    }
}

$q2 = "SELECT * FROM images ORDER BY img_nom";
$query = $pdo->prepare($q2);
$query->execute();
$all = $query->fetchAll(PDO::FETCH_ASSOC);
$query->closeCursor();
?>

<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <?php if (isset($msg) && !empty($msg))
{ ?>
    <div class="alert alert-danger" role="alert"><?php echo $msg; ?>
    </div><?php
} ?>
   <input type="file" name="fic" />
   <input type="submit" value="Envoyer" />
</form>

<div class="list-group">
  <?php
foreach ($all as $a)
{ ?>
  <a href="\apercu.php?id=<?php echo $a['img_id']; ?>" class="list-group-item list-group-item-action"><?php echo $a['img_nom']; ?></a><?php
}
?>
</div>


<?php
include '../footer.php';
$pdo = null;

?>
