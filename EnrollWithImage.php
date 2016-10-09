<?php

$dbhost = "mysql.hostinger.es";
$dbuser = "u809326886_olis";
$dbpass = "olarome13";
$dbizen = "u809326886_quiz";

$esteka = mysqli_connect ($dbhost, $dbuser, $dbpass, $dbizen) or die ("Konekxioa ez da gauzatu MySQLra");
mysqli_select_db($esteka, $dbizen) or die ("Errorea datu basearen konekxioarekin");

/* $esteka =mysqli_connect ("mysql.hostinger.es","u628663284_olis","C0nguit0s","u628663284_quiz") or die ("Konekxioa ez da gauzatu MySQLra");
mysqli_select_db($esteka,"u628663284_quiz") or die ("Errorea datu basearen konekxioarekin"); */

/*$esteka= mysqli_connect("localhost", "root","", "quiz") or die ("Konekxioa ez da gauzatu MySQLra");
mysqli_select_db($esteka,"Quiz") or die ("Errorea datu basearen konekxioarekin");*/

#balioak hartu
    $izena = $_POST["izena"];
	$abizena = $_POST["abizenak"];
	$emaila= $_POST['emaila'];
	$pasahitza= $_POST["pasahitza"];
	$telefonoa= $_POST["telefonoa"];
	$espezialitatea= $_POST["espezialitatea"];
    if ($espezialitatea== "Besterik"){
	   $espezialitatea=$_POST['besterik'];
    }
	/*$interesa=$_POST["interesa"];*/
	$argazkia= $_POST["argazkiaIgo"];

if(!$esteka){
	echo "Hutsegitea MySQLra konektatzerakoan. " . PHP_EOL;
	echo "errno depurazio akatsa: " . mysqli_connect_errno().PHP_EOL;
} else {
    
    #argazkia gorde
    if (is_uploaded_file($_FILES['argazki']['tmp_name'])){

        if ($_FILES["argazki"]["type"]=="image/jpg" || $_FILES["argazki"]["type"]=="image/jpeg" || $_FILES["argazki"]["type"]=="image/gif" ||  $_FILES["argazki"]["type"]=="image/png"){
            #karaktere bereziak kendu
            $imagenEscapes=mysqli_real_escape_string($esteka, file_get_contents($_FILES["argazki"]["tmp_name"]));
        }

    }
	

	$sql="INSERT INTO Erabiltzaile(Izena, Abizenak, Emaila, Pasahitza, Telefonoa, Espezialitatea) VALUES('$izena', '$abizena', '$emaila', '$pasahitza', '$telefonoa', '$espezialitatea','argazkia)";

	$ema = mysqli_query($esteka, $sql);

	if(!$ema){
		die ('Errorea query-a gauzatzerakoan:' . msqli_error());
	} else {
		echo "Erregistro bat gehitu da!";
		echo "<p> <a href='ShowUsers.php'> Erregistroak ikusi</a></p>";
	}
}

mysqli_close($esteka);

?>
	