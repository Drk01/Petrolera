/*JavaScript Document*/

/*Para mostrar la contraseña*/
$(document).ready(function () {
	"use strict";
	$('#show-pass').click(function () {
		if ($('#pass-2').attr('type') === 'text') {
 			$('#pass-2').attr('type', 'password');
		} else {
 			$('#pass-2').attr('type', 'text');
		}
 	});
});

/*script para los Modal */
function registro_exitoso(mensaje){
	"use strict";
	$(mensaje).modal("show");
	setTimeout(function(){
	$(mensaje).modal("hide");
	},1500);
}
/* Inicializa el plugin del select multiple */
$('#example-getting-started').multiselect({
	buttonWidth: '170px',buttonClass: 'btn btn-secondary',
	templates: {
		li: '<li><a tabindex="0" class="dropdown-item"><label></label></a></li>',
	}
})

/*Tabla objetos*/
$(document).ready(function(){
    $('#tablaObjeto').DataTable();
});

/*Tabla clientes*/
$(document).ready(function(){
    $('#tablaClientes').DataTable();
});


/* Inicializa el plugin del calendario */
$(document).ready(function () {
	"use strict";
	$("#fechaI").datepicker({
		showAnim: "clip",
		dateFormat: "yy-mm-dd",
		onClose: function (selectedDate) {
			$("#fechaF").datepicker("option", "minDate", selectedDate);
		}
	});

	$("#fechaF").datepicker({
		showAnim: "clip",
		dateFormat: "yy-mm-dd",
		onClose: function (selectedDate) {
			$("#fechaI").datepicker("option", "maxDate", selectedDate);
		}
	});

	$("#datepickerE").datepicker({
		showAnim: "clip",
		dateFormat: "yy-mm-dd",
		changeMonth:true,
		changeYear:true
	});

	$("#fechaRI").datepicker({
		showAnim: "clip",
		dateFormat: "yy-mm-dd",
		onClose: function (selectedDate) {
			$("#fechaRF").datepicker("option", "minDate", selectedDate);
		}
	});

	$("#fechaRF").datepicker({
		showAnim: "clip",
		dateFormat: "yy-mm-dd",
		onClose: function (selectedDate) {
			$("#fechaRI").datepicker("option", "maxDate", selectedDate);
		}
	});

});




/*Funcion AJAX para el modal editar objeto*/
function verObjeto(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'Modal_objeto',
				success: function(data){
						$('#datosAqui').html(data);
						$('#editar').modal({
								show:true,
								backdrop:'static',
						});
				}
			});
		return false;
}
/*Funcion AJAX para el modal editar contrato*/
function verContrato(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'Modal_contrato',
				success: function(data){
						$('#datosAqui').html(data);
						$('#editar').modal({
								show:true,
								backdrop:'static',
						});
				}
			});
		return false;
}
/*Funcion AJAX para el modal editar contrato*/
function verEmpresa(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'Modal_empresa',
				success: function(data){
						$('#datosAqui').html(data);
						$('#editar').modal({
								show:true,
								backdrop:'static',
						});
				}
			});
		return false;
}
/*Funcion AJAX para el modal editar encuesta*/
function verEncuesta(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'Modal_encuesta',
				success: function(data){
						$('#datosAqui').html(data);
						$('#editar').modal({
								show:true,
								backdrop:'static',
						});
						/*CALENDARIO*/
						$("#datepickerModal").datepicker({
							showAnim: "clip",
							dateFormat: "yy-mm-dd",
							changeMonth:true,
							changeYear:true
						});
				}
			});
		return false;
}

/*Funcion AJAX para el modal borrar encuesta*/
function borrarEncuesta(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'Modal_borrar_encuesta',
				success: function(data){
						$('#datosAqui2').html(data);
						$('#borrar').modal({
								show:true,
								backdrop:'static',
						});
						/*CALENDARIO*/
						$("#datepickerModal").datepicker({
							showAnim: "clip",
							dateFormat: "yy-mm-dd",
							changeMonth:true,
							changeYear:true
						});
				}
			});
		return false;
}

/*Funcion AJAX para el modal editar sección*/
function verSeccion(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'Modal_seccion',
				success: function(data){
						$('#datosAqui').html(data);
						$('#editar').modal({
								show:true,
								backdrop:'static',
						});
				}
			});
		return false;
}
/*Funcion AJAX para el modal editar pregunta y respuestas(si tiene)*/
function verPregunta(codigo){
		$.ajax({
				type: 'POST',
				data: 'codigo='+codigo,
				url: 'Modal_pregunta',
				success: function(data){
						$('#datosAqui').html(data);
						$('#editar').modal({
								show:true,
								backdrop:'static',
						});
				}
			});
		return false;
}
/*Funcion AJAX para el modal ver sección-pregunta*/
function verSeccionP(id){
		$.ajax({
				type: 'POST',
				data: 'id='+id,
				url: 'Modal_seccionP',
				success: function(data){
						$('#datosAqui2').html(data);
						$('#verSP').modal({
								show:true,
								backdrop:'static',
						});
						/*Tabla modal*/
						$('#tablaModal').DataTable();
				}
			});
		return false;
}
function estado(id){
 $.ajax({
		 type: 'POST',
		 data: "id="+id,
		 url: 'Modal_empleado',
		 success: function(data){
				 $('#datosAqui').html(data);
				 $('#editar').modal({
						 show:true,
						 backdrop:'static',
				 });
		 }
	 });
 return false;
}

function estado_cliente(id){
 $.ajax({
		 type: 'POST',
		 data: "id="+id,
		 url: 'Modal_cliente',
		 success: function(data){
				 $('#datosAqui').html(data);
				 $('#editar').modal({
						 show:true,
						 backdrop:'static',
				 });
		 }
	 });
 return false;
}
