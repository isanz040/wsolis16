<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet'
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
<?php	session_start();
	if(!isset($_SESSION['login'])){
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

	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Home</a></span>
		<?php if(isset($_SESSION['login'])){
				echo "<span><a href='handlingQuizzes.php'>Insert questions</a></span>";
				if($_SESSION['erabmota']=="irakasle"){
					echo "<span><a href='reviewingQuizes.php'>Update questions</a></span>";
					echo "<span><a href='ShowQuizzes.php'>View questions</a></span>";
					echo "<span><a href='ShowUsersWithImage.php'>List users</a></span>";
					echo "<span><a href='DeleteUser.php'>Remove user</a></span>";
			  	} else echo "<span><a href='ShowQuizzes.php'>See my questions</a></span>";
		      } else {
				echo "<span><a href='PasahitzaAhaztu.html'>Password recovery</a></span>";
	      	  }
		?>
		<span><a href='credits.html'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		<?php if(isset($_SESSION['login'])){
				echo "Kaixo, " . $_SESSION['name'] . "!";
		      } else {
				echo "Ongi etorri gure web-orrira.";
		      }
		?>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
