<?php
require("nusoap/lib/nusoap.php");

function eskaeraEmail($eposta){
	$bezeroa = new nusoap_client('http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl', true);
	$emaitza = $bezeroa->call('egiaztatuE', array('x'=>$eposta));
	return $emaitza;
}

function eskaeraPasahitza($pass){
	$bezeroa = new nusoap_client('http://oromeo001.hol.es/wsolis16-2/egiaztatuPasahitza.php?wsdl', true);
	$emaitza= $bezeroa->call('konprobatuPasahitza', array('pasahitz'=>$pass));
	return $emaitza;
}
?>