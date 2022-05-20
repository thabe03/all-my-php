<?php
include "connexion.php";
if (isset($_GET['id']))
{
    $id = intval($_GET['id']);
    $query3 = $pdo->prepare("SELECT * FROM images WHERE img_id = '$id'");
    $query3->execute();
    if (!($query3->rowCount()))
    {
        $msg = htmlentities('No images at this address');
    }
    else
    {
        $msg = "";
        $all = $query3->fetchAll(PDO::FETCH_ASSOC);
        $query3->closeCursor();
        foreach ($all as $a)
        {
            $img_type = $a['img_type'];
            header("Content-type: $img_type");
            echo $a['img_blob'];
        }
    }
}

?>

<?php if (isset($msg) && !empty($msg))
{ ?>
    <div class="alert alert-danger" role="alert"><?php echo $msg; ?>
    </div><?php
} ?>
