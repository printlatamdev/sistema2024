
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function enviarinfo(){
	//donde se mostrará lo resultados
	divResultado = document.getElementById('resultadosz');
	//valores de los inputs
	proyecto=document.nuevo_empleado.proyecto.value;
	cliente=document.nuevo_empleado.cliente.value;
	vendedor=document.nuevo_empleado.vendedor.value;
	
	//instanciamos el objetoAjax
	ajax=objetoAjax();
	//uso del medotod POST
	//archivo que realizará la operacion
	//registro.php
	ajax.open("POST", "registro.php",true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divResultado.innerHTML = ajax.responseText
			//llamar a funcion para limpiar los inputs
			LimpiarCampos();
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores
	ajax.send("proyecto="+proyecto+"&cliente="+cliente+"&vendedor="+vendedor)
}

function LimpiarCampos(){
	document.nuevo_empleado.proyecto.value="";
	document.nuevo_empleado.cliente.value="";
	document.nuevo_empleado.contacto.value="";
	document.nuevo_empleado.proyecto.focus();
}