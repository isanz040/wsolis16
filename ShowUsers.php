<?php

$dbhost = "mysql.hostinger.es";
$dbuser = "u809326886_olis";
$dbpass = "olarome13";
$dbizen = "u809326886_quiz";

$esteka = mysqli_connect ($dbhost, $dbuser, $dbpass, $dbizen) or die ("Konekxioa ez da gauzatu MySQLra");
mysqli_select_db($esteka, $dbizen) or die ("Errorea datu basearen konekxioarekin");


if(!$esteka){
	echo "Hutsegitea MySQLra konektatzerakoan. " . PHP_EOL;
	echo "errno depurazio akatsa: " . mysqli_connect_errno().PHP_EOL;
} else {
	$ema = mysqli_query($esteka, "select * from Erabiltzaile");

	echo '<table border=1> <tr><th>Izena</th>
							  <th>Abizenak</th>
							  <th>Emaila</th>
							  <th>Pasahitza</th>
							  <th>Telefonoa</th>
							  <th>Espezialitatea</th> 				  
							  </tr>';

	while ($row = mysqli_fetch_assoc($ema)){

		echo '<tr><td>'.$row['Izena'].'</td> <td>'.$row['Abizenak'].'</td> <td>'.$row['Emaila']. '</td> <td>'.
		$row['Pasahitza'].'</td> <td>'.$row['Telefonoa'].'</td> <td>'.$row['Espezialitatea'].'</td></tr>';

	}

	echo '</table><br/>';
	echo "<p> <a href='layout.html'>Bueltatu hasierara</a></p>";
	mysqli_free_result($ema);
}

mysqli_close($esteka);

?>
