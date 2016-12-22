<?php

require 'DBKonexioa.php';
require 'Session.php';

if($_SESSION['erabmota']!="irakasle"){
	 header("location:handlingQuizzes.php"); 
}

echo();
echo ("<head><br/>");
echo ("<script type='text/javascript' src='jquery/jquery-2.1.4.js'></script>
      <script type='text/javascript'>
	  /* $(document).ready(function(){

		$('input').blur(function(){
        var field = $(this);
        var parent = field.parent().attr('id');
        field.css('background-color','#F3F3F3');

        if($('#'+parent).find('.ok').length){
            $('#'+parent+ ' .ok').remove();
            $('#'+parent+ '.loading').remove();
            $('#'+parent).append('<div><img src='irudiak/loading.gif'/></div>').fadeIn('slow');

        }else{

            $('#'+parent).append('<div><img src='irudiak/loading.gif'/></div>').fadeIn('slow');
        }

			var dataString = 'value='+ $(this).val() + '&field=' + $(this).attr('name');
			$.ajax({
				type: 'POST',
				url: 'AldaketakGorde2.php',
				data: dataString,
				success: function(data) {
					field.val(data);
					$('#'+parent+ ' .loading').fadeOut(function(){
						$('#'+parent).append('<div><img src='irudiak/ok.png'/></div>').fadeIn('slow');
					});
				}
			});
		});
	});*/ 
</script>");

echo ("</head>");
echo ("<body>");

$sql="SELECT * FROM  Galderak JOIN Erabiltzaile ON Galderak.EgilePosta = Erabiltzaile.Emaila";
$emaitza = mysqli_query($esteka, $sql);
echo("<center>");
echo("<div><p> GALDERAK </p> </div>");
echo ("<div align='right'> 
      <form method='post' action='LogOut.php' id='logout' name='logout' enctype='multipart/form-data'>
      <input type='submit' class='button' name='logout' value='Log out' /></form>
      </div>");

echo("<table id='taula'>");
echo("<tr><th id='erregistroa'>EGILEA</th><th id='erregistroa'>POSTA</th><th id='erregistroa'>GALDERA</th><th id='erregistroa'>ERANTZUNA</th><th id='erregistroa1'>ZAILTASUNA</th><th></th></tr>");

if($emaitza) {
	while($row = mysqli_fetch_assoc($emaitza)) {
		echo('<form method="post" id="form-eguneratu" name="eguneratu" enctype="multipart/form-data">');
		echo('<input type="hidden" id="kodea" name="kodea" value="'.$row['GZenbaki'].'">');
		echo('<tr name ="galdera" id="galdera">');
		echo('<td>'.$row['Izena']." ".$row['Abizenak'] .'</td>'.
			'<td>'.$row['Emaila'] .'</td>'.
			'<td><input type="text" id="Testua" name="testua" value="'.$row['Testua'].'"/></td>'.
			'<td><input type="text" id="ErantzunZuzena" name="erantzuna" value="'.$row['ErantzunZuzena'].'"/></td>'.
			'<td><input type="text" id="ZailtasunMaila" name="zailtasuna" value="'.$row['ZailtasunMaila'].'"/></td>');
		echo("</tr>");
		echo("</form>");

	}
} 

echo('</table>');
echo('<br/><br/>');
echo('<div><a href="layout.php">Bueltatu hasierara</a></div>');
echo('<br/><br/>');
echo('</center></body>');
echo ('</html>');

require 'DBKonexioaItxi.php';

?>