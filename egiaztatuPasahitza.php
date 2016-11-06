<?php
require_once('nusoap/lib/nusoap.php');
$URL       = "http://oromeo001.hol.es/wsolis16-2/";
$namespace = $URL.'?wsdl';
$server    = new soap_server(); //soap_server objektua
//$server->register('konprobatuPasahitza');
$server->configureWSDL('Pasahitza_Konprobatu',$namespace);

function konprobatuPasahitza($pasahitz)
{
	$fitxategia = 'toppasswords.txt';
	$searchfor = $pasahitz;


	// fitxategiaren edukiak lortzeko, suposatuz fitxategi irakurgarria dela (eta existitzen dela)
	$contents = file_get_contents($fitxategia);
	//kontsultan karaktere bereziak badaude ez eduki kontuan
	$pattern = preg_quote($searchfor, '/');
	// espresio erregularra, lerro osoarekin bat datozen
	$pattern = "/^.*$pattern.*\$/m";

	// bilatu eta idatzi bat datozenak $aurkitu aldagaian
	if(preg_match_all($pattern, $contents, $aurkitu)){
	   return "BALIOGABEA";
	} else{
	   return "BALIOZKOA";
	}
}

//funtzioa erregistratu
$server->register('konprobatuPasahitza',array("pasahitz"=>"xsd:string"),array("return"=>"xsd:string"),"Pasahitza");


//parametroak pasa ez badira, string hutsa balioa ematen zaio.
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );

$server->service($HTTP_RAW_POST_DATA); //xml-a analizatu, funtzioa deitu eta erantzuna sortu egiten du.

exit();
?>