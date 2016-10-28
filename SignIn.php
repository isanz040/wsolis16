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
        <div id="edukiontzi">
            <div id="gorputza">
                <form id="form-login" action="SignIn.php" method="post" >
                    <p><label >Erabiltzaile Posta:</label></p>
                        <input name="erabPosta" type="text" id="loginErabiltzailea" placeholder="adibidea003@ehu.eus"></p>
 
                    <p><label>Pasahitza:</label></p>
                        <input name="erabPasahitza" type="password" id="loginPasahitza" placeholder="7hG95hkjkalkop98" ></p>
 
                    <p><input type="submit" name="loginBidali" value="Sartu" class="botoia"></p>
                </form>
            </div><!--amaiera gorputza-->
        </div><!-- amaiera edukiontzi -->

       <p><a href='layout.html'>Bueltatu hasierara</a></p>
   </body>
</html>	
	<?php

	require 'DBKonexioa.php';//datu-baserako konekxio fitxategia


	if (isset($_POST['erabPasahitza'])){

		$email=$_POST['erabPosta'];
		$pass=$_POST['erabPasahitza'];
		$check_erabiltzaileak="select * from Erabiltzaile WHERE Emaila='$email' AND Pasahitza='$pass'";
		$run=mysqli_query($esteka,$check_erabiltzaileak);
		$cont= mysqli_num_rows($run);
		
		 if($cont==1){  
		    header("location:handlingQuizzes.php?login=$email");  
		 }else {
		   echo "<script>alert('Erabiltzaile posta edo pasahitza ez dira zuzenak!')</script>"; 
		    
		 }  
	}

	require 'DBKonexioaItxi.php';

	?>