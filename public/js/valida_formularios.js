// JavaScript Document
 $(document).ready(function(){
	"use strict";
	// valida Representante legal y nombre del contacto
	var eregex1 = /[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+/;
	$.validator.addMethod("validNombre", function( value, element ){
		return this.optional( element ) || eregex1.test( value );
	});

	// valida imail
	var eregex2 = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	$.validator.addMethod("validemail", function( value, element ){
		return this.optional( element ) || eregex2.test( value );
	});

	// valida telefono
	var eregex3 = /^[\d]/;
	$.validator.addMethod("validTel", function( value, element ){
		return this.optional( element ) || eregex3.test( value );
	});

 $('#formularios').validate({
	 rules: {
		id_empresas:"required",
		inputRepresentante:{
			required:true,
			validNombre:true
		},
		inputContactoN:{
			required:true,
			validNombre:true
		},
		inputContactoA:{
			required:true,
			validNombre:true
		},
    inputEncuesta:{
			required:true,
			validNombre:true
		},
    inputFormato:{
			required:true,
		},
    inputPregunta:{
      required:true,
			validNombre:true
    },
    inlineRadioOptions:{
      required:true,
    },
    inlineRadioOptions2:{
      required:true,
    },
    inputR1:{
      required:true,
    },
    inputR2:{
      required:true,
    },
    inputR3:{
      required:true,
    },
		Email: {
			required: true,
			validemail: true,
			maxlength: 50
		},
		Tel: {
			required: true,
			minlength: 10,
			maxlength: 15,
			validTel:true
		 },
		inputContrato: "required",
		FechaInicio: "required",
		FechaFin: "required",
		inputUsuario: {
			required: true,
			minlength: 5,
			maxlength: 30
		},
		inputPass: {
			required: true,
			minlength: 5,
			maxlength: 30
		},
    inputSeccion: "required",
    fecha:"required"
	},

	messages: {
    id_empresas:"Porfavor seleccione una opcion",
		inputRepresentante:{
		required: "Este campo es requerido",
		validNombre: "El formato no coincide"
		},
		inputContactoN:{
			required: "Este campo es requerido",
			validNombre: "El formato no coincide"
		},
		inputContactoA:{
			required: "Este campo es requerido",
			validNombre: "El formato no coincide"
		},
    inputEncuesta:{
			required: "Este campo es requerido",
			validNombre: "El formato no coincide"
		},
    inputFormato:{
			required: "Este campo es requerido"
		},
    inputPregunta:{
      required: "Este campo es requerido"
    },
    inlineRadioOptions:{
      required: ""
    },
    inlineRadioOptions2:{
      required: ""
    },
    inputR1:{
      required: "Este campo es requerido"
    },
    inputR2:{
      required: "Este campo es requerido"
    },
    inputR3:{
      required: "Este campo es requerido"
    },
		Email:{
			required: "Este campo es requerido",
			validemail: "El formato no coincide",
			maxlength: "Maximmo 50 caracteres"
		},
		Tel:{
			required: "Este campo es requerido",
			minlength: "Mínimo 10 caracteres",
			maxlength: "Maximo 15 caracteres"
		},
		inputContrato: "Por favor seleccione una opcion",
		FechaInicio: "Por favor seleccione la fecha",
		FechaFin: "Por favor seleccione la fecha",
		inputUsuario: {
			required: "Este campo es requerido",
			minlength: "Mínimo 5 caracteres",
			maxlength: "Maximo 30 caracteres",
		},
		inputPass: {
			required: "Este campo es requerido",
			minlength: "Mínimo 5 caracteres",
			maxlength: "Maximo 30 caracteres",
		},
    inputSeccion:"Este campo es requerido",
    fecha:"este campo es requerido"
	},
	highlight: function (element) {
		$(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
		$(element).addClass('form-control-danger');
	},

	unhighlight: function ( element) {
		$(element).parents('.form-group').addClass('has-success');
		$(element).addClass('form-control-success');
		$(element).parents('.form-group').removeClass('has-danger');
		$(element).removeClass('form-control-danger');
	}
});



/*****PARTE DINAMICA DEL CORREO*****/
if($('#start_count_value1').val()){
 var i= $('#start_count_value1').val();
}else{
 var i=0;
}

$("#add_Email").click(function(){
  $('#add_Email_div').before($("#add_Email_div").clone().attr("id","add_Email_div" + i));
	$("#add_Email_div" + i).css("display","block");
	$("#add_Email_div" + i + " :input").each(function(){
      $(this).attr("name",$(this).attr("name") + i);
	    $(this).attr("id",$(this).attr("id") + i);
	});

  $("input[name=class_count1]").remove();
  $('#add_Email_div').append('<input type="hidden" class="class_count1" name="class_count1" value="'+i+'" />');
  $("#add_Email_div" + i+" .form-control").each(function(){
    $(this).rules("add", {
      required: true,
  		maxlength: 50,
  		validemail: true,
  		messages: {
  		    required: "Este campo es requerido",
  		    validemail: "El formato no coincide",
  		    maxlength: "Maximo 50 caracteres"
  	  }
  	});
  });
  i++;
});

$(document).on("click","#hide_Email",function() {
  $(this).closest(".addEMAIL").remove();
});

/*****VALIDACIÓN DE LOS CAMPOS CORREOS PARTE DE LA ACTUALIZACION*****/
var elementosE = document.getElementsByName("correos");
for(i=0;i<elementosE.length;i++){
	 $("#Email" + i).each(function(){
		 $(this).rules("add", {
			required: true,
			maxlength: 50,
			validemail: true,
			messages: {
				required: "Este campo es requerido",
				validemail: "El formato no coincide",
				maxlength: "Maximo 50 caracteres"
	     }
		});
	 })
 }

 /*****PARTE DINAMICA DEL TELEFONO*****/
 if($('#start_count_value2').val()){
	 var j= $('#start_count_value2').val();
 }
 else{
	 var j=0;
 }

$("#add_Tel").click(function(){
  $('#add_Tel_div').before($("#add_Tel_div").clone().attr("id","add_Tel_div" + j));
  $("#add_Tel_div" + j).css("display","block");
  $("#add_Tel_div" + j + " :input").each(function(){
    $(this).attr("name",$(this).attr("name") + j);
    $(this).attr("id",$(this).attr("id") + j);
    $(this).attr("count",j);
  });

  $("input[name=class_count2]").remove();
  $('#add_Tel_div').append('<input type="hidden" class="class_count2" name="class_count2" value="'+j+'" />');
  $("#add_Tel_div" + j+" .form-control").each(function(){
    $(this).rules("add", {
  	   required: true,
       minlength: 10,
       maxlength: 15,
       validTel:true,
       messages:{
         required: "Este campo es requerido",
         minlength: "Minimo 10 digitos",
         maxlength: "Maximo 15 digitos",
         validTel: "No coincide el formato"
  	  }
  	});
  });
  j++;
});

$(document).on("click","#hide_Tel",function() {
  $(this).closest(".addTEL").remove();
});

/*****VALIDACIÓN DE LOS CAMPOS TELEFONOS PARTE DE LA ACTUALIZACION*****/
var elementosT = document.getElementsByName("telefonos");
for(i=0;i<elementosT.length;i++){
  $("#Tel" + i).each(function(){
    $(this).rules("add", {
      required: true,
      minlength: 10,
      maxlength: 15,
      validTel:true,
     messages: {
       required: "Este campo es requerido",
       minlength: "Minimo 10 digitos",
       maxlength: "Maximo 15 digitos",
       validTel: "No coincide el formato"
      }
   });
  })
}

/*****PARTE DINAMICA DEL CONTRATO*****/
if($('#start_count_value3').val()){
	 var k= $('#start_count_value3').val();
 }
 else{
	 var k=0;
 }

$("#add_Contrato").click(function(){
	$('#add_Contrato_div').before($("#add_Contrato_div").clone().attr("id","add_Contrato_div" + k));
	$("#add_Contrato_div" + k).css("display","block");
	$("#add_Contrato_div" + k + " :input").each(function(){
  	$(this).attr("name",$(this).attr("name") + k);
   	$(this).attr("id",$(this).attr("id") + k);
   	$(this).attr("count",k);
	});

	var id=[];
	var nombre=[];
	var cont=0;
	$('select#contrato').find('option').each(function() {
		id[cont]=$(this).val();
		nombre[cont]=$(this).text();
		cont++;
	});

	var select = document.getElementById("contrato"+k);
	for(var n=0;n<id.length;n++){
		 select.options[n] = new Option(nombre[n], id[n]);
	}

	/*****PARA DECLARAR LOS DATEPICKER*****/
	for(var x=0;x<=k;x++){
    	declara(x);
	}
	function declara(num) {
		$("#datepickerI"+num).datepicker({
			showAnim: "clip",
		  	dateFormat: "yy-mm-dd",
		  	onClose: function (selectedDate) {
				$("#datepickerF"+num).datepicker("option", "minDate", selectedDate);
		 	}
	  	});
	  	$("#datepickerF"+num).datepicker({
			showAnim: "clip",
		  	dateFormat: "yy-mm-dd",
		  	onClose: function (selectedDate) {
				$("#datepickerI"+num).datepicker("option", "maxDate", selectedDate);
		  	}
	  	});
	}
	/******************************/

	$("input[name=class_count3]").remove();
 	$('#add_Contrato_div').append('<input type="hidden" class="class_count3" name="class_count3" value="'+k+'" />');
	$("#add_Contrato_div" + k+" .form-control").each(function(){
		$(this).rules("add", {
			required: true,
			messages: {
				required: "Este campo es requerido"
			}
		});
	});
	k++;
 });/*termina el #add_Contrato */

$(document).on("click","#hide_Contrato",function() {
	$(this).closest(".addCONTRATO").remove();
});

/*****VALIDACIÓN DE LOS CAMPOS DATAPICKER PARTE DE LA ACTUALIZACION*****/
var elementosC = document.getElementsByName("contratos");
for(i=0;i<elementosC.length;i++){
    declara2(i);
}
function declara2(num) {
  $("#Datepicker1"+num).datepicker({
    showAnim: "clip",
      dateFormat: "yy-mm-dd",
      onClose: function (selectedDate) {
            $("#Datepicker2"+num).datepicker("option", "minDate", selectedDate);
      }
  });
  $("#Datepicker2"+num).datepicker({
      showAnim: "clip",
      dateFormat: "yy-mm-dd",
      onClose: function (selectedDate) {
            $("#Datepicker1"+num).datepicker("option", "maxDate", selectedDate);
      }
  });
}

});
