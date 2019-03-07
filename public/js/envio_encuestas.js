
/*$(document).ready(function() {
var table = $('#tablaClientes').DataTable();

$('#tablaClientes tbody').on('click', 'tr', function () {
var data = table.row( this ).data();
var data2 = document.getElementsByName('id[]')[data[0]-1].value;
//alert( 'id= '+data2);
} );
} );*/

$(document).ready(function(){

  $('#tabla_envio').aCollapTable({
        startCollapsed: true,
        addColumn: false,
        plusButton: '<i class="fa fa-plus-circle fa-lg"></i> ',
        minusButton: '<i class="fa fa-minus-circle fa-lg"></i> '
  });

 $(".fila").click(function(e) {
   e.preventDefault();
   var data1 = $(this).attr("data-valor");
   var data2 = $(this).attr("data-cliente");
   $.ajax({
 		 type: 'POST',
 		 data: {"id_en":data1,"id_cliente":data2},
 		 url: 'Modal_encuesta_seccion',
 		 success: function(data){
 				 $('#datosAqui').html(data);
 				 $('#seleccionar_pseccion').modal({
 						 show:true,
 						 backdrop:'static',
 				 });
         $('.example-getting-started2').multiselect({
           buttonWidth: '220px',buttonClass: 'btn btn-secondary',
         	 templates: {
         	   li: '<li><a tabindex="0" class="dropdown-item"><label></label></a></li>',
         	 }
         });
         /*CALENDARIO*/
				 $("#datepickerModal2").datepicker({
					 showAnim: "clip",
					 dateFormat: "yy-mm-dd",
           firstDay:1,
				 }).datepicker("setDate",new Date());
 		 }
 	 });
});

});
