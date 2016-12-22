<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Login</title> 
	<link rel='stylesheet' type='text/css' href='stylesPWS/SignIn.css' /> 
	<link rel='stylesheet' type='text/css' media='only screen and (min-width: 530px) and (min-device-width: 481px)' href='stylesPWS/wide.css' />
	<?php
		session_start();
		if(!isset($_SESSION['saiakerak'])) $_SESSION['saiakerak'] = 3;
		else if ($_SESSION['saiakerak'] == 0) {
			echo "<script> alert('Saiakera kopuru maximoa egin dituzu, saiatu beste batean.'); </script><br/>";
			echo "<script>location.href = 'http://oromeo001.hol.es/wsolis16-2/layout.php';</script>";
		}
	?>
  </head>
  <style>  
    .login-panel {  
        margin-top: 100px;}
  </style>  

  <body>
     <div id='page-wrap'>
	  <header class='main' id='h1'>
  <?php if(!isset($_SESSION['login'])){
           echo '<span class="right"><a href="signUp.html">SignUp</a>&nbsp;&nbsp;</span>
           <span class="right"><a href="SignIn.php">LogIn</a> </span>';
        } else {
           echo '<i>' . $_SESSION['login'] . '</i> barruan da.<br/>';
           echo '<span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
             <div align="right">
             <form method="post" action="LogOut.php" id="logout" name="logout" enctype="multipart/form-data">
             <input type="submit" class="button" name="logout" value="Logout" /></form>
             </div>';
        }
  ?>

		<h2>Quiz: Crazy questions</h2>
		</header>
		<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Home</a></span>
		<?php if(isset($_SESSION['login'])){
				echo "<span><a href='handlingQuizzesJQuery.php'>Insert questions</a></span>";
				if($_SESSION['erabmota']=="irakasle"){
					echo "<span><a href='reviewingQuizes.php'>Update questions</a></span>";
					echo "<span><a href='ShowQuizzes.php'>View questions</a></span>";
					echo "<span><a href='ShowUsersWithImage.php'>List users</a></span>";
					echo "<span><a href='DeleteUser.php'>Remove user</a></span>";
			  	} else echo "<span><a href='ShowQuizzes.php'>See my questions</a></span>";
		      } else {
				echo "<span><a href='PasahitzaAhaztu.html'>Password recovery</a></span>";
				//echo "<span><a href='PasahitzaAhaztu.html'>GALDERAKHEMEN</a></span>";
		      }
		?>
		<span><a href='credits.html'>Credits</a></span>
		</nav>

      <section class="main" id="s1">  
          <div id="gorputza" align="center">
               <form id="form-login" action="SignIn.php" method="post" >
                   <p><label >Erabiltzaile Posta:</label></p>
                   <input name="erabPosta" type="text" id="loginErabiltzailea" placeholder="adibidea003@ehu.eus"></p>
                   </br>
                   <p><label>Pasahitza:</label></p>
                   <input name="erabPasahitza" type="password" id="loginPasahitza" placeholder="7hG95hkjkalkop98" ></p>
                   </br>
                   </br>
                   <p><input id="input_2" type="submit" name="loginBidali" value="Sartu" ></p>
               </form>
          </div><!--amaiera gorputza-->
      
          <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><p><a href='PasahitzaAhaztu.html'>Pasahitza ahaztu duzu?</a></p>
      </section>
	
        <footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
       </div>
   </body>
</html>	
	
<?php
   require 'DBKonexioa.php';  //datu-baserako konekxio fitxategia
   

    if (isset($_POST['erabPasahitza'])){

		$email = $_POST['erabPosta'];
                $pass = sha1($_POST['erabPasahitza']);
		$check_erabiltzaileak = "SELECT * FROM Erabiltzaile WHERE Emaila='$email' AND Pasahitza='$pass'";
		$run = mysqli_query($esteka,$check_erabiltzaileak);
                $row = mysqli_fetch_assoc($run);
		$cont = mysqli_num_rows($run);
              
		 if($cont==1){
			$ordua = date("Y-m-d H:i:s");
			$sql="SELECT KonexioId FROM Konexioak ORDER BY KonexioId DESC";
			$ema = mysqli_query($esteka, $sql);
			$konexioId = mysqli_fetch_assoc($ema)['KonexioId'] + 1;

			$sql="INSERT INTO Konexioak(KonexioId, ErabPosta, KonexioOrdua) VALUES('$konexioId', '$email', '$ordua')";
			$ema = mysqli_query($esteka, $sql);

                       //SESIOA SORTU
		       $_SESSION['konexio'] = $konexioId;
		       $_SESSION['login'] = $email;
		       $_SESSION['name'] = $row['Izena'];
		       if($row['Emaila'] == 'web000@ehu.es') $_SESSION['erabmota'] = "irakasle";
                       header('location:layout.php');

                  }else {
	       	       $_SESSION['saiakerak'] = $_SESSION['saiakerak'] - 1;
		       echo "<script>alert('Erabiltzaile posta edo pasahitza ez dira zuzenak!')</script>";
		       echo "<script>location.href = 'http://oromeo001.hol.es/wsolis16-2/SignIn.php';</script>";
		  }  
       }


    require 'DBKonexioaItxi.php';

?>