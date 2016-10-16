<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galderak Sartu</title> 
	<link rel='stylesheet' type='text/css' href='stylesPWS/insertquestion.css' /> 
	<link rel='stylesheet' type='text/css' media='only screen and (min-width: 530px) and (min-device-width: 481px)' href='stylesPWS/wide.css' />
	<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='stylesPWS/smartphone.css' />
	<script type="text/javascript" src="js/signUp.js"></script>
  </head>
  <body> 
	<h2>SARTU GALDERAK</h2>
        <div id="formularioa">
		<form id="form-galderak" action="InsertQuestion.php" method="post" >
                      <?php
                         require 'DBKonexioa.php';

/*                         $ema = mysqli_query($esteka, 'select max(GZenbaki) from Galderak');
                         $row = mysqli_fetch_assoc($ema);
                         echo "<p><label>Galdera Zenbakia</label></p><input name='galderaZenbakia' type='text' id='galderaZenbakia' value=".$row['GZenbaki']." ><br/><br/>";
*/
                      ?>

                    	<br/><p><label>Egilearen ePosta:</label></p>
                        <input name="egilePosta" type="text" id="egilePosta" placeholder="adibidea003@ikasle.ehu.eus" ><br/><br/>

                     	<p><label>Galdera:</label></p>
                        <textarea id="galderatestua" name="galdTestua"class="textarea"rows="8" cols="60" placeholder="Idatzi hemen zure galdera..."></textarea><br/><br/>	
                        
                        <p><label>Erantzun zuzena:</label></p>
                        <textarea id="eranZuzena" name="eranZuzena"class="textarea"rows="8" cols="60" placeholder="Idatzi hemen galderaren erantzuna..."></textarea><br/><br/>	

                        <p><label>Zailtasun-maila:</label></p>		 
 		<div id="radioAukera">
			<input type="radio" name="kalifiAukera" value="1">1&nbsp;&nbsp;
			<input type="radio" name="kalifiAukera" value="2">2&nbsp;&nbsp;
			<input type="radio" name="kalifiAukera" value="3">3&nbsp;&nbsp; 
			<input type="radio" name="kalifiAukera" value="4">4&nbsp;&nbsp;
			<input type="radio" name="kalifiAukera" value="5">5&nbsp;&nbsp; 
                        <input type="radio" name="kalifiAukera" value=""checked>(Kalifikatu gabe)&nbsp;&nbsp;
     
		</div>
		    <p><input type="submit" name="galderaBidali" value="Bidali Galdera" class="botoia" onclick="return GalderaBalidatu()"></p>
                </form>                

            </div><!--amaiera formularioa-->
<br/>
 	<p> <a href='layout.html'>Bueltatu hasierara</a></p>
    
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
   </body>
</html>	

<?php

      if (isset($_POST['egilePosta'])){

		$gZenbakia= $_POST["galderaZenbakia"];
		$egilePosta = $_POST["egilePosta"];
		$testua= $_POST["galdTestua"];
		$galdera_zuzena= $_POST["eranZuzena"];
		$zailtasun_maila=$_POST["kalifiAukera"];

		$check_erabiltzaileak="select * from Erabiltzaile WHERE Emaila='$egilePosta'";
		$run=mysqli_query($esteka,$check_erabiltzaileak);
		$cont= mysqli_num_rows($run);
		
		if($cont==1){  /*erabiltzailea erregistratuta badago*/

			$sql1="INSERT INTO Galderak(GZenbaki,EgilePosta, Testua, ErantzunZuzena,ZailtasunMaila) VALUES('$gZenbakia', '$egilePosta', '$testua', '$galdera_zuzena','$zailtasun_maila')";

			$ema = mysqli_query($esteka, $sql1);

			if(!$ema){
				die ('Errorea query-a gauzatzerakoan:' . msqli_error());
			}else{
			     echo "Galdera bat gehitu da!";
			     echo "<p> <a href='ShowQuizzes.php'>Galderak ikusi</a></p>";
		
			}

		       header('location:layout.html');  

		}else {       /*erabiltzailea EZ dago erregistratuta*/
		
                     echo "<script>alert('Erabiltzaile posta hori ez dago datu basean erregistratua!')</script>"; 
                     header('location:ShowQuizzes.php');  
				    
		}  

	
	}


require 'DBKonexioaItxi.php';

?>	
							