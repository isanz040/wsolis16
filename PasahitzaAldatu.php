<?php

require 'DBKonexioa.php';
require 'SoapEskaera.php';


$emaila= $_POST['emaila'];
$telefonoa= $_POST["telefonoa"];
$pasahitza= $_POST['pasahitza'];

$soapPass = eskaeraPasahitza($pasahitza);


$sql="SELECT * FROM Erabiltzaile WHERE Emaila='$emaila' AND Telefonoa='$telefonoa'";
$run=mysqli_query($esteka, $sql);
$cont= mysqli_num_rows($run);		

if ($cont != 1){
	echo "<script> alert('Emaila edo telefonoa ez dira zuzenak.'); </script><br/>";
	echo "<p><a href='PasahitzaAhaztu.html'>Berriro saiatu</a></p><br/>";
	echo "<p><a href='layout.php'>Bueltatu hasierara</a></p>";
} else if ($soapPass=="BALIOGABEA"){
	echo "<script> alert('Pasahitza ahulegia da. Saiatu berriro.'); </script><br/>";
	echo "<p><a href='PasahitzaAhaztu.html'>Berriro saiatu</a></p><br/>";
	echo "<p><a href='layout.php'>Bueltatu hasierara</a></p>";
} else {
	$pasahitza = sha1($pasahitza);
	$sql="UPDATE Erabiltzaile SET Pasahitza='$pasahitza' WHERE Emaila='$emaila'";
	$ema = mysqli_query($esteka, $sql);
	if(!$ema){
		die ('Errorea mysqli query-a gauzatzerakoan.');
	} else {
		echo "<script> alert('Pasahitza zuzen aldatu da!'); </script><br/>";
		echo "<p><a href='layout.php'>Bueltatu hasierara</a></p>";
	}
}
		
require 'DBKonexioaItxi.php';

?>