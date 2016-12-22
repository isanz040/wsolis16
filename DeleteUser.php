<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
	<link rel='stylesheet' type='text/css' href='stylesPWS/signUp.css' /> 
	<link rel='stylesheet' type='text/css' media='only screen and (min-width: 530px) and (min-device-width: 481px)' href='stylesPWS/wide.css' />
	<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='stylesPWS/smartphone.css'/>
		   
	<script type="text/javascript" src="js/signUp.js" ></script>

	<?php
		require 'DBKonexioa.php';
		session_start();
		if($_SESSION['erabmota']!="irakasle"){
			 header("location:handlingQuizzesJQuery.php"); 
		}
	?>

  </head>
  <body>
  <div id='page-wrap'>
	  <header class='main' id='h1'>
	<?php	echo '<i>' . $_SESSION['login'] . '</i> barruan da.<br/>';
		echo '<span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
			<div align="right">
			<form method="post" action="LogOut.php" id="logout" name="logout" enctype="multipart/form-data">
			<input type="submit" class="button" name="logout" value="Logout" /></form>
			</div>';
	?>

		<h2>Erabiltzaileak ezabatu:</h2>
		</header>
		<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Home</a></span>
		<?php	echo "<span><a href='handlingQuizzesJQuery.php'>Insert questions</a></span>";
			echo "<span><a href='reviewingQuizes.php'>Update questions</a></span>";
			echo "<span><a href='ShowQuizzes.php'>View questions</a></span>";
			echo "<span><a href='ShowUsersWithImage.php'>List users</a></span>";
			echo "<span><a href='DeleteUser.php'>Remove user</a></span>";
		?>
		<span><a href='credits.html'>Credits</a></span>
		</nav>
		<section class="main" id="s1">

		<form id="ezabatu" name="ezabatu" action="DeleteUser.php" method="POST" enctype="multipart/form-data">
		<legend class="legend">Aukeratu erabiltzailea</legend> <p ALIGN=center></p> <br/><br/>

                        <br/><div id="guraso">
                          	<label class="label">Eposta Elektronikoa:</label>
				<input type="text" size="30" id="emaila" name="emaila" value="" class="form-input" required><br/><br/>
                   	<br/>
				<label class="label">Idatzi "<i>EZABATU</i>" konfirmatzeko:</label>
				<input type="text" size="7" id="konfirmazioa" name="konfirmazioa" value="" required class="form-input"<br/><br/>
                                <span id="emaitza1" style="background-color:#ceff99"></span><br/>
			<br/>
			<br/>
			<br/><input type="submit" value="Ezabatu!" ALIGN="left"><br/>
			<br/>
			</div>
	</form>

	<?php	if (isset($_POST['emaila'])){
			$emaila = $_POST['emaila'];
			$sql = "SELECT * FROM Erabiltzaile WHERE Emaila='$emaila'";
			$run = mysqli_query($esteka, $sql);
			$cont= mysqli_num_rows($run);		

			if ($_POST['konfirmazioa'] != "EZABATU"){
				echo "<script> alert('Konfirmazioa idatzi mesedez.'); </script><br/>";
			} else if ($cont != 1){
				echo "<script> alert('Erabiltzaile hori ez da existitzen.'); </script><br/>";
			} else {
				$sql = "DELETE FROM Erabiltzaile WHERE Emaila='$emaila'";
				$ema = mysqli_query($esteka, $sql);
				if(!$ema){
					die ('Errorea mysqli query-a gauzatzerakoan.');
				} else {
					echo "<script> alert('Erabiltzailea ezabatu da!'); </script><br/>";
				}
			}
		}
		require 'DBKonexioaItxi.php';
	?>

    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>	