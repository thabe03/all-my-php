<?php

include 'index.php';

$s = [
    'Host Server Name' => $_SERVER['SERVER_NAME'],
    'Host Header' => $_SERVER['HTTP_HOST'],
    'Server Software' => $_SERVER['SERVER_SOFTWARE'],
    'Document Root' => $_SERVER['DOCUMENT_ROOT'],
    'Current Page' => $_SERVER['PHP_SELF'],
    'Script Name' => $_SERVER['SCRIPT_FILENAME']
];

$c = [
  'Client System info' => $_SERVER['HTTP_USER_AGENT'],
  'Client IP' => $_SERVER['REMOTE_ADDR'],
  'Remote Port' => $_SERVER['REMOTE_PORT']
];

?>

<?php if ($s) { ?> <!--server exist-->
    <ul style="list-style-type: none;">
        <?php foreach ($s as $k => $v) { ?>
            <li>
                <strong><?php echo $k; ?> : </strong><?php echo $v; ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>
<?php if ($c) { ?> <!--server exist-->
    <ul style="list-style-type: none;">
        <?php foreach ($c as $k => $v) { ?>
            <li>
                <strong><?php echo $k; ?> : </strong><?php echo $v; ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>