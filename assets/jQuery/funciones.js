function valida_inputs(){
	var submit;
	$("div").find('input').each(function() {
	 var elemento= this;
	 if(elemento.id.toLowerCase().indexOf("imagen") < 0){
		 if(elemento.value=="" && elemento.id!=""){
			alert("El campo " + elemento.id.replace('_',' ') + " no debe ir vacio");
			elemento.focus();
			submit=false;
			return submit;
			//break;
		 }
		 submit=true;
		 return submit;
	 }
		 //alert("elemento.id="+ elemento.id + ", elemento.value=" + elemento.value); 
	});
	return submit;
}

function valida_textareas(){
	var submit;
	$("div").find("textarea").each(function() {
	 var elemento= this;
	 if(elemento.value==""){
	 	alert("El campo " + (elemento.id).replace("_"," ") + " no debe ir vacio");
	 	elemento.focus();
	 	submit=false;
	 	return submit;
	 	//break;
	 }
	 submit=true;
	 return submit;
	});
	return submit;
}
function validar(){
	if(!valida_inputs())
		return false;
	else if(!valida_textareas())
		return false;
	else return true;
}
