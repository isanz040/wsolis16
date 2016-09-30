<?php

//$esteka = mysqli mysqli_connect ("u902840953_Quiz", “u902840953_olis", “C0nguit0s", “Quiz");
$esteka= mysqli_connect("localhost", "root", "", "proba");

if(!$esteka){

	echo "Hutsegitea MySQLra konektatzerakoan." .".PHP_EOL;
	echo "errno depurazio akatsa: " . mysqli_connect_errno().PHP_EOL;
	echo "errno depurazio akatsa: " . mysqli_connect_errno().PHP_EOL;
}

$izena = $_POST['izena'];
$abizena = $_POST['abizena'];
$emaila= $_POST['emaila'];
$pasahitza= $_POST['pasahitza'];
$telefonoa= $_POST['telefonoa'];
$espezialitatea= $_POST['espezialitatea'];



$chunks = ceil(strlen($word) / $number);
echo "The {$number}-letter chunks of '{$word}' are:<br />\n";
for ($i = 0; $i < $chunks; $i++) {
  $chunk = substr($word, $i * $number, $number);
  printf("%d: %s<br />\n", $i + 1, $chunk);
	
}

?>
