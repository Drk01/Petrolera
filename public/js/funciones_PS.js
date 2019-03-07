/*Para borrar la preguntas en la encuesta*/
$(document).on("click","#hide_Pregunta",function() {
  $(this).closest(".addPREGUNTA").remove();
	var t=$(".addPREGUNTA").length;
	if(t == 0){
		$("#bt_encuesta").addClass("hidden-xs-up");
	}
});

/*Funcion para buscar preguntas o secciones repetidas*/
function buscarPS(element, array){
  for (var i in array){
    if (array[i].value  == element) return i;
  }
  return -1;
}

$(document).ready(function(){
	$('#add_P').click(function(){
		/*Se debe colocar un id para acceder al valor*/
		var radio=document.getElementById('inlineRadioP').value;
		var id=document.getElementById('select_pregunta').value;
		if(id==""){
			   $("#pregunta").addClass("has-danger");
		}else{
			$("#bt_encuesta").removeClass("hidden-xs-up");

			var t=$(".addPREGUNTA").length;
			//alert('t'+t);
			if(t==0){
				$.ajax({
					type:"post",
					url:"llamarSP",
					data:{"respuesta":radio,"id":id},
					success:function(resp){
							document.getElementById("agregarElemento").innerHTML +=resp;
					}
				});
			}
			if(t>0){

				var res=buscarPS(id, document.getElementsByName('pregunta[]'));
				//alert(res);
				if(res==-1){
					$.ajax({
						type:"post",
						url:"llamarSP",
						data:{"respuesta":radio,"id":id},
						success:function(resp){
								document.getElementById("agregarElemento").innerHTML +=resp;
						}
					});
				}else{
					alert("Pregunta repetida");
				}
		}


		}
	});

});
$(document).ready(function(){
	$('#add_S').click(function(){
  	/*Se debe colocar un id para acceder al valor*/
		var radio=document.getElementById('inlineRadioS').value;
		var id=document.getElementById('select_seccion').value;
		if(id==""){
			   $("#seccion").addClass("has-danger");
		}else{
			$("#bt_encuesta").removeClass("hidden-xs-up");

			var t=$(".addPREGUNTA").length;
			//alert('t'+t);
			if(t==0){
				$.ajax({
					type:"post",
					url:"llamarSP",
					data:{"respuesta":radio,"id":id},
					success:function(resp){
							document.getElementById("agregarElemento").innerHTML +=resp;
					}
				});
			}

			if(t>0){

				var res=buscarPS(id, document.getElementsByName('seccion[]'));
				//alert(res);
				if(res==-1){
					$.ajax({
						type:"post",
						url:"llamarSP",
						data:{"respuesta":radio,"id":id},
						success:function(resp){
								document.getElementById("agregarElemento").innerHTML +=resp;
						}
					});
				}else{
					alert("Sección repetida");
				}
		}
		}
	});
});
