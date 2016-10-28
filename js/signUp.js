function ErregistroaBalidatu(){	
	var zuzena = 1;						
	
	//IZENA balidatzeko
	var izen =document.getElementById("Izena");
	//var expresioa= /^[A-Za-z]+\s[A-Za-z]+\s[A-Za-z]+/g;
	var expresioa =/^[A-Za-z]/g;
	if(!expresioa.test(izen.value)){
		zuzena = 0;
		alert("ERROREA: Izena jartzea derrigorrezkoa duzu");
	}
	
	var abizen=document.getElementById("abizenak");
	expresioa= /^[A-Za-z]+\s[A-Za-z]/g;
	if(!expresioa.test(abizen.value)){
		zuzena = 0;
		alert("ERROREA: Abizenak jartzea derrigorrezkoa duzu");
	}

	//EMAILA balidatzeko
	var emaila=document.getElementById("emaila");
	expresioa= /^[a-z]+\d{3}\@(ikasle\.)?ehu\.(eus|es)/g;
	if(!expresioa.test(emaila.value) ){
		zuzena = 0;
		alert("ERROREA: " + emaila.value+ " helbidea ez da zuzena");		
	}
	
	//PASAHITZA balidatzeko
	var pasahitza=document.getElementById("pasahitza").value;
	expresioa= /^\w{6}(\w*)/g;
	if(pasahitza.length==0){									
		zuzena = 0;
		alert("ERROREA: Pasahitzaren bat jartzea derrigorrezkoa da");
	
	}else if(!expresioa.test(pasahitza)){			
		zuzena = 0;
		alert( "ERROREA: Pasahitzak 6ko luzera izan behar du gutxienez");
	}
	
	//TELEFONOA balidatzeko
	var telefonoa=document.getElementById("telefonoa").value;
	//expresioa=/^\d{9}/g;
	if(telefonoa.length==0){
		zuzena =0;
		alert("ERROREA: Telefono zenbakia adieraztea derrigorrezkoa da");
				
	}else if(telefonoa.length<9 || telefonoa.length>9){		//}else if(!(expr.test(telefonoa)){
		zuzena=0;
		alert("ERROREA: Telefonoz zenbakiak 9 digitu izan behar ditu");	
	}
	
	//ESPEZIALITATEAREN Balidazioa
	var espe= document.getElementById("espezialitatea").value;
	var beste= document.getElementById("besterik").value;
   	if (espe=="Aukeratu" || (espe=="Besterik" && beste=="")){
		zuzena = 0;
		alert("ERROREA: Espezialitate bat hautatu behar duzu derrigorrez.");      
	}
	
   	//BALIOAK IKUSI
	if (zuzena == 1){
		var sAux=""
		var frm=document.getElementById("erregistro");
		for (i=0;i<frm.elements.length;i++){	
			sAux +="IZENA: " + frm.elements[i].name+"";
			sAux +="BALIOA: " + frm.elements[i].value+"\n";
		}
		alert(sAux);
		return true;
	}
	return false;
};

function GalderaBalidatu(){	
	var zuzena = 1;						
	
	//GALDERA balidatzeko
	var galdera= document.getElementById("galderatestua").value;
	if(galdera==""){
		zuzena = 0;
		alert("ERROREA: Galdera idaztea derrigorrezkoa duzu");
	}
	
	//ERANTZUNA balidatzeko
	var erantzuna= document.getElementById("eranZuzena").value;
	if(erantzuna==""){
		zuzena = 0;
		alert("ERROREA: Erantzuna idaztea derrigorrezkoa duzu");
	}

	//EMAILA balidatzeko
	var emaila= document.getElementById("egilePosta");
	expresioa= /^[a-z]+\d{3}\@(ikasle\.)?ehu\.(eus|es)/g;
	if(!expresioa.test(emaila.value) ){
		zuzena = 0;
		alert("ERROREA: " + emaila.value + " helbidea ez da zuzena!");		
	}
	
   	//BALIOAK IKUSI
	if (zuzena == 1){
		var sAux=""
		var frm=document.getElementById("erregistro");
		for (i=0;i<frm.elements.length;i++){	
			sAux +="IZENA: " + frm.elements[i].name+"";
			sAux +="BALIOA: " + frm.elements[i].value+"\n";
		}
		alert(sAux);
		return true;
	}
	return false;
};

///*
//function egiaztatu_luzapena() { 
//   var fitxategi = document.getElementById("argazkiaIgo").value;
//   luzapenak = new Array(".png", ".jpg",); //".doc", ".pdf"); 
//   errorea= ""; 
//   //fitxategiaren luzapena lortu 
//   luzapen = (fitxategi.substring(fitxategi.lastIndexOf("."))).toLowerCase(); 
//   //zihurtatu luzapena onartuaetako bat dela. 
//   onartuta = false; 
//    for (var i = 0; i < luzapenak.length; i++) { 
//       if (luzapenak[i] == luzapen) { 
//         onartuta = true; 
//         break; 
//        } 
//    } 
//    if (!onartuta) { 
//       errorea = "Zihurtatu fitxategien luzapena, hauetako bat izan beharko du:" + luzapenak.join(); 
//	   return 0;
//	}else{
//		  alert("Luzapena zuzena da");
//	  	  return 1;
//	}
//}*/

function espezialitateaSelect(){
	document.getElementById("BesterikLabel").style.display = 'block';
	document.getElementById("besterik").style.display = 'block';
};

function DeSelect(){
	document.getElementById("BesterikLabel").style.display = 'none';
	document.getElementById("besterik").style.display = 'none';
};

function argazkiaAurreikuspen(event){
	var aurreikuspena = document.getElementById("aurreikusi");
    aurreikuspena.src = URL.createObjectURL(event.target.files[0]);
};		