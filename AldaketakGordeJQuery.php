<?php
require 'DBKonexioa.php';
require 'Session.php';


sleep(1);
$data = $_POST['value'];
$field = $_POST['field'];

$update = "UPDATE Galderak SET '".$field."'='".$data."' WHERE id=1";
//$sql = 'UPDATE Galderak SET Testua="'.$_POST['testua'].'", ErantzunZuzena="'.$_POST['erantzunzuzena'].'", ZailtasunMaila="'.$_POST['zailtasunMaila'].'" WHERE GZenbaki="'.$_POST['kodea'].'";';
	
	if (mysqli_query($esteka, $sql)){
			echo("Datuak ondo aldatu dira.");
			echo('<br/><br/>');
			echo('<div class="go"><a href="reviewingQuizzes2.php">Atzera</a></div>');
			echo('<br/><br/>');
	}else{
		echo "Errorea: " . $sql . "<br />" . mysqli_error($konexioa);
	}

	}
	
 require 'DBKonexioaItxi.php';

?>
