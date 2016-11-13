<?php

require 'sessionIrakasle.php';
require 'DBKonexioa.php';

echo '<head>', "\n";
echo '<style> 
		td {
			text-align:center; 
			vertical-align:middle;
			}
	 </style>
    <link rel="stylesheet" type="text/css" href="stylesPWS/css.css" />';
	
echo '</head><body>', "\n";

$sql="SELECT * FROM  Galderak NATURAL JOIN Erabiltzaile";
$emaitza = mysqli_query($esteka, $sql);
echo('<center>');
echo('<div><p> GALDERAK </p> </div>');
echo '<div align="right"> 
		<form method="post" action="logout.php" id="logout" name="logout">
		'.$_SESSION["login_user"].' barruan da.&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="lgout" value="Log Out" />
		</form></div><br/><br/>
';

echo('<table id="taula">');
echo('<tr><th id="erregistroa">EGILEA</th><th id="erregistroa">POSTA</th><th id="erregistroa">GALDERAREN ENUNTZIATUA</th><th id="erregistroa">ERANTZUNA</th><th id="erregistroa1">ZAILTASUNA</th><th></th></tr>');

if($emaitza) {
	while($row = mysqli_fetch_assoc($emaitza)) {
		echo('<form method="post" action="galderakEditatu.php" id="eguneratu" name="eguneratu" enctype="multipart/form-data">');
		echo('<input type="hidden" name="" value="'.$row['GZenbaki'].'">');
		echo('<tr name ="galdera" id="galdera">');
		echo('<td>'.$row['Izena'] .'</td>'.
			'<td>'.$row['Emaila'] .'</td>'.
			'<td><input type="text" name="enuntziatua" value="'.$row['Testua'].'"/></td>'.
			'<td><input type="text" name="erantzuna" value="'.$row['ErantzunZuzena'].'"/></td>'.
			'<td><input type="text" name="konplex" value="'.$row['ZailtasunMaila'].'"/></td>
			<td id="zuzendu"><input type="submit" value="Aldaketak Gorde" id="aldatu" />');
		echo('</tr>');
		echo('</form>');

	}
} 

echo('</table>');
echo('<br/><br/>');
echo('<div><a href="layout.html">Bueltatu hasierara</a></div>');
echo('<br/><br/>');
echo('</center></body>');

require 'DBKonexioaItxi.php';

?>