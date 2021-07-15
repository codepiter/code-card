document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          //defaultDate:new Date(2020,1,0), /*Inicia el 1 Enero 2020*/
          defaultDate:new Date(),
		  plugins: [ 'dayGrid', 'interaction', 'timeGrid', 'list' ],
		 // defaultView:'timeGridWeek',
			 header:{
				 left: 'prev',
				 center: 'title',
				 right:'next'
			 },


			 dateClick:function(info){
				 limpiarFormulario();
			 $('#txtFechai').val(info.dateStr);
			
			$('#btnAgregar').css("display","block");
			
			 $('#btnAgregar').prop("disabled",false);
			 
			 $('#btnModificar').prop("disabled",true);
			 
			 $('#btnModificar').css("display","none");/*07-10*/
			 
			 $('#btnBorrar').prop("disabled",true);
			 
			 $('#exampleModal').modal();
			 },
			  eventClick:function(info){
			
				   limpiarFormulario
				   $('#txtFechai').val(info.event.start);
				   
			//inicio
				minutosi = info.event.start.getMinutes();
				horai = info.event.start.getHours();

				minutosi=(minutosi<10)?"0"+minutosi:minutosi;
				horai=(horai<10)?"0"+horai:horai;
						   
				horarioi = (horai+":"+minutosi);

			//fin	
				minutos = info.event.end.getMinutes();
				hora = info.event.end.getHours();

				minutos=(minutos<10)?"0"+minutos:minutos;
				hora=(hora<10)?"0"+hora:hora;
						   
				horario = (hora+":"+minutos);
				
				
			 var fstart=info.event.start;
			 var fs=(new Date(fstart)).toISOString().slice(0, 10);
			
			 $('#btnAgregar').css("display","none");
			 
			 $('#btnAgregar').prop("disabled",true);
			 
			 $('#btnModificar').css("display","block"); /*07-10*/
			 
			 $('#btnModificar').prop("disabled",false);
			 $('#btnBorrar').prop("disabled",false);
				  

			  $('#txtFechai').val(fs);
			  $('#txtID').val(info.event.id);
			  $('#title').val(info.event.title);
			  $('#txtColor').val(info.event.backgroundColor);
			  $('#txtColort').val(info.event.textColor);
			  $('#description').val(info.event.extendedProps.description);
			  $('#phone').val(info.event.extendedProps.phone);
			  $('#email').val(info.event.extendedProps.email);
			  $('#hora_f').val(horario);
			  $('#hora_i').val(horarioi);
			  
			  /**
			  mes  = (info.event.start.getMonth()+1);
			  dia  = (info.event.start.getDate());
			  anio  = (info.event.start.getFullYear());

			  mes=(mes<10)?"0"+mes:mes;
			  dia=(dia<10)?"0"+dia:dia; **/

			  $('#exampleModal').modal();
			 },

		 events:"{{ url('events/show') }}"
        });
		
		calendar.setOption('locale','Es');

        calendar.render();
		
		
		$('#btnAgregar').click(function(){
			ObjEvento=recolectarDatosGUI("POST");
			
			EnviarInformation('',ObjEvento);
		});
		
		$('#btnBorrar').click(function(){
			ObjEvento=recolectarDatosGUI("DELETE");
			$('#exampleModal2').modal('toggle');
			$('.modal-backdrop').css('display', 'none');
			EnviarInformation('/'+$('#txtID').val(),ObjEvento);
			
		});
		
		$('#btnModificar').click(function(){
			ObjEvento=recolectarDatosGUI("PATCH");
			
			EnviarInformation('/'+$('#txtID').val(),ObjEvento);
		});
		
		function recolectarDatosGUI(method){		
			nuevoEvento={
				    title:$('#title').val(),
					description:$('#description').val(),
					phone:$('#phone').val(),
					email:$('#email').val(),
					color:$('#txtColor').val(),
					textColor:$('#txtColort').val(),
					start:$('#txtFechai').val()+" "+$('#hora_i').val(),
					end:$('#txtFechai').val()+" "+$('#hora_f').val(),
					hora_i:$('#hora_i').val(),
					hora_f:$('#hora_f').val(),
					personal_information_id:$('#personal_information_id').val(),
					fecha_evento:$('#txtFechai').val(),
					'_token':$("meta[name='csrf-token']").attr("content"),
					'_method':method
			}
			return (nuevoEvento);
		}
		function EnviarInformation(action, objEvento){
			$('#exampleModal').modal('toggle');
			$.ajax({
				type:"POST",
				url:"{{url('events')}}"+action,
				data:objEvento,
				success:function(msg){
					console.log(msg);					

					calendar.refetchEvents();					
					},
				error:function(){alert("Hay un error");}
				
			});
			
		}
		function limpiarFormulario(){
				
				  $('#title').val("");
				  $('#phone').val("");
				  $('#email').empty();
				 // $('#hora_i').val("");
				 // $('#hora_f').val("");
				  $('#description').val("");
				  $('#txtColor').val("");
				  $('#txtColort').val("#ffffff");
			}
      });
	  
	  // AJAX call for autocomplete 
$(document).ready(function(){
	
	$("#search-box").keyup(function(){
	
		$.ajax({
		type: "POST",
		url:"ajax",
		 data: {
			"_token": $("meta[name='csrf-token']").attr("content"),
			"keyword": $(this).val()
		  },

		success: function(data){
			$("#suggesstion-box").html(data);
			var lista = $('#ulid li').length;
		   if (lista != 0){
			$("#suggesstion-box").show();
		   }else{
			$("#suggesstion-box").hide();
		   }	
			
			
		}
		});
	});
});

//To select Budget name
function selectBudget(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
 var descri = $("#sel_des");
		$.ajax({
		type: "POST",
		url:"ajaxdesc",
		 data: {
			"_token": $("meta[name='csrf-token']").attr("content"),
			"estimate": val,
		  },
		success: function(data){
			descri.find('option').remove();
			descri.html('<option value="">Select Description</option>');
		    $.each( data, function(k, v) {
                descri.append('<option value="' + v + '">' + v + '</option>');
            });
		}
		});
}