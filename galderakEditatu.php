<?php
require 'sessionIrakasle.php';
require 'DBKonexioa.php';


$sql = 'UPDATE Galderak SET Testua="'.$_POST['enuntziatua'].'", erantzuna="'.$_POST['eran'].'", zailtasuna="'.$_POST['konplex'].'" where kodea ="'.$_POST['gkodea'].'";';
	if (mysqli_query($konexioa, $sql))
		{
echo("Datuak ondo aldatu dira.");
echo('<br/><br/>');
echo('<div class="go"><a href="reviewingQuizzes.php">Atzera</a></div>');
echo('<br/><br/>');
		}
	  else
		{
		echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);
		}

 require 'DBKonexioaItxi.php';

?>