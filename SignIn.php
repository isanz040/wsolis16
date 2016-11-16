<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Login</title> 
	<link rel='stylesheet' type='text/css' href='stylesPWS/SignIn.css' /> 
	<link rel='stylesheet' type='text/css' media='only screen and (min-width: 530px) and (min-device-width: 481px)' href='stylesPWS/wide.css' />
	<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='stylesPWS/smartphone.css' />	
  </head>
  <style>  
    .login-panel {  
        margin-top: 100px;}
  </style>  

  <body> 
     <div id='page-wrap'>
	  <header class='main' id='h1'>
		  <span class="right"><a href="signUp.html">SignUp</a>&nbsp;&nbsp;</span>
		  <span class="right"><a href="SignIn.php">LogIn</a> </span>
		  <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
		<h2>Quiz: Crazy questions</h2>
		</header>
		<nav class='main' id='n1' role='navigation'>
			<span><a href='layout.html'>Home</a></span>
			<span><a href='ShowQuizzes.php'>Show Quizzes</a></span>
			<span><a href='credits.html'>Credits</a></span>
		</nav>


      <section class="main" id="s1">  
          <div id="gorputza">
               <form id="form-login" action="SignIn.php" method="post" >
                   <p><label >Erabiltzaile Posta:</label></p>
                   <input name="erabPosta" type="text" id="loginErabiltzailea" placeholder="adibidea003@ehu.eus"></p>
 
                   <p><label>Pasahitza:</label></p>
                   <input name="erabPasahitza" type="password" id="loginPasahitza" placeholder="7hG95hkjkalkop98" ></p>
 
                   <p><input type="submit" name="loginBidali" value="Sartu" class="botoia"></p>
               </form>
          </div><!--amaiera gorputza-->
      
       <!-- <p><a href='layout.html'>Bueltatu hasierara</a></p>-->
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

		$email=$_POST['erabPosta'];
                $pass=$_POST['erabPasahitza'];
		$check_erabiltzaileak="select * from Erabiltzaile WHERE Emaila='$email' AND Pasahitza='$pass'";
		$run=mysqli_query($esteka,$check_erabiltzaileak);
                $row = mysqli_fetch_assoc($run);
		$cont= mysqli_num_rows($run);
              
		 if($cont==1){
                       //SESIOA SORTU
		       session_start();

		       $_SESSION['login'] = $email;
		       $_SESSION['name'] = $row['Izena'];
		       if($row['Emaila'] == 'web000@ehu.es'){
	                    $_SESSION['erabmota'] = "irakasle";
                            header('location:reviewingQuizes.php');
 
	                }else{
	                    $_SESSION['erabmota'] = "ikasle";
                            header('location:handlingQuizzes.php');  
	                }

                  }else {
		       echo "<script>alert('Erabiltzaile posta edo pasahitza ez dira zuzenak!')</script>";
		  }  
       }


    require 'DBKonexioaItxi.php';

?>