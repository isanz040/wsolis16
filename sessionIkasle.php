<?php
require 'DBKonexioa.php';

session_start();

$user_check=$_SESSION['Emaila'];
$sql="SELECT * FROM  Erabiltzaile WHERE Emaila LIKE '$user_check'";
$emaitza = mysqli_query($esteka, $sql);
$row = mysqli_fetch_assoc($emaitza);
$login_session =$row['Izena'];

	if(!isset($login_session) || $_SESSION['erabmota']!="ikasle"){
		 header('Location: layout.html'); 
	}
  

 require 'DBKonexioaItxi.php';
?>