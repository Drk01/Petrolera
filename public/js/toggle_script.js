/*Mostrar respuestas de las preguntas*/
function toggleRespuestas(elemento) {
		if(elemento.value== "SI") {
					document.getElementById("verRespuestas").style.display = "block";
		}else{
					document.getElementById("verRespuestas").style.display = "none";
		}
}
/*Mostrar select con las secciones*/
function toggleSecciones(elemento) {
		if(elemento.value== "SI") {
					document.getElementById("verSeccion").style.display = "block";
		}else{
					document.getElementById("verSeccion").style.display = "none";
		}
}
/*Mostrar select con las preguntas*/
function togglePregunta(elemento) {
		if(elemento.value== "VERP") {
					document.getElementById("verPregunta").style.display = "block";
					document.getElementById("verSeccion").style.display = "none";
		}else{
					document.getElementById("verPregunta").style.display = "none";
					document.getElementById("verSeccion").style.display = "block";
		}
}

/*Mostrar input con segumiento*/
function toggleSeguimiento(elemento,id) {
		if(elemento == "2") {
					document.getElementById("verSeguimiento"+id).style.display = "block";
					//document.getElementById("verSeccion").style.display = "none";
		}else{
					document.getElementById("verSeguimiento"+id).style.display = "none";
					//document.getElementById("verSeccion").style.display = "block";
		}
}
