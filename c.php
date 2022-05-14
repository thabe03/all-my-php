<?php
session_start();
if(empty($_SESSION['email'])==1 || empty($_SESSION['psw'])==1){
  echo "404";
  exit;
}

include 'header.php';

$n = "||||||||||||||||||||";
$s = " Hello world!";
$f = "exemple.txt";
$i = 0;
$x = 9;
$d = 1.5;
echo $n.$s; //s|s 
echo $n.str_word_count($s); //i|s
echo $n.strlen($s); //i|s
echo $n.trim($s); //s|s
echo $n.strrev($s); //s|s
echo $n.str_replace("world", "Dolly", $s); //s|s,s,s
echo $n.strpos($s, "world"); //i|s,s
echo $n.strtoupper($s); //s|s
echo $n.ucwords($s); //s|s
echo $n.min($i, -150); //i|i,i,i,i,i,i
echo $n.max($i, 150); //i|i,i,i,i,i,i
echo $n.rand(); //i|v
echo $n.round($d); //i|f
echo $n.sqrt($x); //i|i
echo $n.abs(-9.9); //i|f
echo $n.substr($s,6,9); //b|i,i
echo $n.isset($s); //b|s
echo $n.date("10/08/25"); //s|s
echo $n.date("d/m/y h:i:sa", mktime(10,40,54,4,3,2003)); //s|format
echo $n.strtotime("April 03 2003"); //i|s
echo $n.is_string($s); //b|s
echo $n.gzuncompress(gzcompress($s)); //s|s

for ($i; $i <= 4; $i++) {
  if ($i == 2) {
    continue;
  }
  if ($i == 3) {
    break;
  }
  echo $n.$i;
}

$a = ["Peter"=>"35", "Ben"=>"37", "Joe"=>"43"];
asort($a); //a|a
foreach($a as $k => $v) {
  echo $n."Key " . $k . " Value " . $v;
}

$aa = ["Peter", "Ben", "Joe"]; 
foreach ($aa as $v) {
  echo $n.$v;
}

echo $n.count($aa); //i|a

do {
  echo $n.$i;
  $i++;
} while ($i <= 4);

try {
$ff=fopen($f,"w"); //is|f,format
fwrite($ff, $s); //s|is,s
fclose($ff); //v|is
} catch (Exception $e) {
  exit("Erreur"); //v|s
}

try {
$ff = fopen("exemple.txt", "r");
echo $n.fread($ff,filesize("exemple.txt"));
fclose($ff);
} catch (Exception $e) {
  exit("Erreur"); //v|s
}

echo $n;
echo (var_dump($s)); //format|i,b,f,s


include 'footer.php';

?>