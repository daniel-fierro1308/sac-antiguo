// JavaScript Document

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