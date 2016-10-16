<?php

require 'DBKonexioa.php';

if(!$esteka){
	echo "Hutsegitea MySQLra konektatzerakoan. " . PHP_EOL;
	echo "errno depurazio akatsa: " . mysqli_connect_errno().PHP_EOL;
} else {
	$ema = mysqli_query($esteka, "select * from Galderak");

	echo '<table border=1> <tr><th>Galdera:</th>
		  <th>Zailtasun-maila:</th>
		  </tr>';

	while ($row = mysqli_fetch_assoc($ema)){
		if ($row['ZailtasunMaila']==0) echo '<tr><td>'.$row['Testua'].'</td> <td></td></tr>';
		else echo '<tr><td>'.$row['Testua'].'</td> <td>'.$row['ZailtasunMaila'].'</td></tr>';
	}

	echo '</table><br/>';
	echo "<p> <a href='layout.html'>Bueltatu hasierara</a></p>";
	mysqli_free_result($ema);
}

require 'DBKonexioaItxi.php';

?>
