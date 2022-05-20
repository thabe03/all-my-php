<?php

include '../header.php';

try {
$i = 0;
$a = getenv("uapi");
$l = "http://api.uis.unesco.org/sdmx/codelist/UNESCO/CL_AREA/latest?format=sdmx-json&locale=fr%20&subscription-key=$a";
  $json = file_get_contents($l);
  $d = json_decode($json);
  $c = (array)$d->Codelist[0]->items;
  $b = array_map(function($val) { return $val->names[1]->value; }, $c);
} catch(Exception $e){
  echo $e;
}
?>                                             

<select class="form-select" aria-label="Default select example">
  <option selected>Open this select menu</option>
  <?php foreach($b as $k => $v){ if (strpos($v, ':') == false) { ?>
    <option value="<?php $i ?>"><?php echo $v; $i++;?></option>
  <?php } } ?>
</select>

<?php

include '../footer.php';

?>