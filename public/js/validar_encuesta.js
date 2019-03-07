$(document).ready(function(){
 "use strict";
/*****VALIDACIÓN DE LOS RADIO  DE LA PARTE DE LA ENCUESTA*****/
var radio=document.getElementById('pregunta_radio').value;
//var elementosT = document.getElementsByName("telefonos");
//alert("r"+radio);
for(var i=1;i<=radio;i++){
  //alert("r"+i);
  validar(i);
  validar2(i);
}
function validar(i) {
  $("#radio" + i).each(function(){
    $(this).rules("add", {
      required: true,
      messages: {
       required: ""
     },
     highlight: function (element) {
       $(element).closest('.form-group').removeClass('').addClass('has-danger');
       $(element).addClass('form-control-danger');
     },

     unhighlight: function ( element) {
       $(element).parents('.form-group').addClass('');
   		$(element).addClass('form-control-success');
   		$(element).parents('.form-group').removeClass('has-danger');
   		$(element).removeClass('form-control-danger');
     }

   });
  })

}
function validar2(i) {

  $("#input" + i).each(function(){
    $(this).rules("add", {
      required: true,
      messages: {
       required: "Este campo es requerido"
     },
     highlight: function (element) {
       $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
       $(element).addClass('form-control-danger');
     },

     unhighlight: function ( element) {
       $(element).parents('.form-group').addClass('');
       $(element).addClass('form-control-success');
       $(element).parents('.form-group').removeClass('has-danger');
       $(element).removeClass('form-control-danger');
     }

   });
  })
}

});
