
//mision
var clic = 1;
function mostrarm(){
if(clic == 1){	
document.getElementById('oculto').style.display='block';
clic = clic + 1;	
	}
	else{
document.getElementById('oculto').style.display ='none';
clic = 1;
		}
}


//vision
function mostrarv(){
	if(clic == 1){
document.getElementById('oculto1').style.display ='block';
clic = clic + 1;
}
else{
	document.getElementById('oculto1').style.display ='none';
	clic = 1;
	}
}

//obj corp
function mostrarobc(){
if(clic == 1){	
document.getElementById('oculto2').style.display ='block';
clic = clic + 1;
}
else{
	document.getElementById('oculto2').style.display ='none';
	clic = 1;
	}

}

//val corp
function mostrarvc(){
if(clic == 1){		
document.getElementById('oculto3').style.display ='block';
clic = clic + 1;
}
else{
	document.getElementById('oculto3').style.display ='none';
	clic = 1;
	}

}

//prin corp
function mostrarpc(){
if(clic == 1){	
document.getElementById('oculto4').style.display ='block';
clic = clic + 1;
}
else{
	document.getElementById('oculto4').style.display ='none';
	clic = 1;
	}
}


//historia
function mostrarh(){
	if(clic == 1){
document.getElementById('oculto5').style.display ='block';
clic = clic + 1;
}
else{
	document.getElementById('oculto5').style.display ='none';
	clic = 1;
	}
}
