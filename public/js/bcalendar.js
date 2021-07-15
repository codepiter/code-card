document.addEventListener('DOMContentLoaded', function() {
	
	var dias =$('#dias').val();
	
        var calendarEl = document.getElementById('agenda');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initiaView: 'dayGridMonth',
		  validRange: {
			start: new Date(),
		  },
		
		
		businessHours: {		 
		  daysOfWeek: "["+dias+"]",
		},

		selectable: true, 



		  locale:"es",	
				 header:{
				 left: 'prev',
				 center: 'title',
				 right:'next'
			 },



		dateClick:function(info){
			day = info.date.getDay(); 
			workDays = calendar.getOption('businessHours').daysOfWeek;
	
			if(workDays.includes(day)){

				 limpiarFormulario();
				 
				 $('#txtFechai').val(info.dateStr);			
				 $('#btnAgregar').css("display","block");			
				 $('#btnAgregar').prop("disabled",false);			 
				 $('#btnModificar').prop("disabled",true);			 
				 $('#btnModificar').css("display","none");	 
				 $('#btnBorrar').prop("disabled",true);			 
				 $('#exampleModal').modal();
			}
		},
		
			  eventClick:function(info){
		
			 },


  
		 events:"events/showc/"+$('#personal_information_id').val(),
		 
		eventContent: function(arg, createElement) {
		  var innerText = 'Reservado'

		 

		  return createElement('i', {}, innerText)
		}
		  
        });
		
		calendar.setOption('locale','Es');
		
        calendar.render();		
		
		$('#btnAgregar').click(function(){
			
			var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
			var nomb = $.trim($("#title").val());
			var asun = $.trim($("#description").val());
			var emai = $.trim($("#email").val());
			
			var id_up =$('#personal_information_id').val();
			var dia_e =$('#txtFechai').val();
			var f_in = $("#hora_i").val();
			var f_fn = $("#hora_f").val();
			
			  $("#disponible").val("no"); 
			
			if(f_in < f_fn){
		
				$.ajax({
					type:"POST",
					url:"/events/verifyHour",
					data:{ 
						id_up : id_up, 
						dia_e : dia_e, 
						f_in : f_in, 
						f_fn : f_fn, 
						'_token':$("meta[name='csrf-token']").attr("content"),
						
					},
					success:function(msg){
					console.log(msg);
						if(msg == "ocupado"){			
						Swal.fire({
							title: '¡Disculpe!',
							showConfirmButton: false,
							text: "Ya existe una cita en ese horario",
							type: "error",
							icon: 'error',
							timer: 3000,
						});
						
						$(".s-alerta").text("Cambie el horario de la cita");
						$(".s-alerta").css("color", "red");	
				
						  $("#disponible").val("no"); 
						}else{
						  $("#disponible").val("si"); 
						  
							  if( (nomb.length>0) && (asun.length>0) && (emai.length>0) && (regex.test($('#email').val().trim())) && (f_in < f_fn) && (($("#disponible").val()) == "si") ){
					
								$(".s-alerta").text("");
								
								ObjEvento=recolectarDatosGUI("POST");			
								EnviarInformation('',ObjEvento);
		
							  }
						
						}
							
				  },
					
				});	
			
			
			}
		
			
		
			if( (nomb.length>0) && (asun.length>0) && (emai.length>0) && (regex.test($('#email').val().trim())) && (f_in < f_fn) && (($("#disponible").val()) == "si") ){
				
				$(".s-alerta").text("");
				
				ObjEvento=recolectarDatosGUI("POST");			
				EnviarInformation('',ObjEvento);
				
				
			}else{
				
				if((nomb.length == 0)){
					$("#title").css('border-color','red')	
				}else{
					$("#title").css('border-color','#ced4da');
				}
				if((asun.length == 0)){
					$("#description").css('border-color','red')	
				}else{
					$("#description").css('border-color','#ced4da');
				}
				if((emai.length == 0)){
					$("#email").css('border-color','red')	
				}else{
					$("#email").css('border-color','#ced4da');
				}
				if(regex.test($('#email').val().trim())){
					$("#email").css('border-color','#ced4da');
				}else{ 
					$("#email").css('border-color','red')
				}
				
				if(f_in > f_fn){
					$("#hora_f").css('border-color','red')	
				}else{ 
					$("#hora_f").css('border-color','#ced4da')
				}
				
				
		
			}
		});

		function recolectarDatosGUI(method){
			var sendw = "";
			if ($('#send').is(":checked"))
			{
				 sendw = "on";
			}else{
				 sendw = "off";
			}
				
			nuevoEvento={
				    title:$('#title').val(),
					description:$('#description').val(),
					phone:$('#phone').val(),
					whatsapp:$('#whatsapp').val(),
					email:$('#email').val(),
					color:$('#txtColor').val(),
					textColor:$('#txtColort').val(),
					send:sendw,
					start:$('#txtFechai').val(),
					end:$('#txtFechai').val(),
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
				url:"/events"+action,
				data:objEvento,
				success:function(msg){
				
				if(msg == "ocupado"){			
					Swal.fire({
						title: 'Disculpe!',
						showConfirmButton: false,
						text: "Ya existe una cita en ese horario",
						type: "error",
						icon: 'error',
						timer: 3500,
					});
				}else{
					Swal.fire({
						title: '',
						showConfirmButton: false,
						text: "Cita agregada satisfactoriamente",
						type: "success",
						icon: 'success',
						timer: 3500,
					});	
					if(objEvento.send == 'on'){	
					
						var tlf = $('#nro_what').val();
						
						var text="Hola, mi nombre es "+objEvento.title+"%0A%0ADeseo concretar una cita con usted:%0ADia "+objEvento.start+"%0AHorario: "+objEvento.hora_i+" hasta "+objEvento.hora_f+"%0AAsunto "+objEvento.description+"%0A%0AGracias%0A%0A";
						
						if(tlf != ""){
							setTimeout(function() {
								window.open("https://api.whatsapp.com/send?phone="+tlf+"&text="+text);
							}, 3000);
						}
					}
					
				}
						calendar.refetchEvents();	
						
					},
				error: function () {
  
					Swal.fire({
						title: 'Disculpe!',
						showConfirmButton: false,
						text: "Verifique que sus datos sean correctos",
						type: "error",
						icon: 'error',
						timer: 4000,
					});
					
					}
			});		
		}
		function limpiarFormulario(){
				  $('#title').val("");
				  $('#phone').val("+");
				  $('#whatsapp').val("");
				  $('#email').val("");
				  $('#description').val("");
				  $('#send').val("");
				  $('#txtColort').val("#ffffff");
				  $('#send').prop('checked', false);
			}
      });  
	  

	
$(document).ready(function() {  


	$("#phone").keydown(function(e) {
	
		var oldvalue=$(this).val();
		var field=this;
		setTimeout(function () {
			if(field.value.indexOf('+') !== 0) {
				$(field).val(oldvalue);
			} 
		}, 1);
	});
});
	
	
		
$(document).ready(function() {  

	var hours = $('#hours').val();
	
		def=hours.split('/');
			ini=def[0];
			fn=def[1];
		
		$('#hora_i').val(ini);
		$('#hora_f').val(fn);

	$('#hours').on('change', function() {
		
		var range = $(this).val();
		
		horas=range.split('/');
			inicio=horas[0];
			fin=horas[1];
			
			$('#hora_i').val(inicio);
			$('#hora_f').val(fin);
	
	});	
});



	
//solicitud de cancelacion
$(document).ready(function() {  

	$('#btn-cancelar').on('click', function() {
		 $('#title_can').val("");
		  $('#phone_can').val("+1");
		 // $('#phone_can').val("+584143368237");
		  $('#motivo').val("");
		  
		  
		  
		$('#modalCancelar').modal();

	});	
	
	$('#btnCancelacion').on('click', function() {
		var user_p_id = $('#user_p_id').val();
		var title_can = $('#title_can').val();
		var phone_can = $('#phone_can').val();
		var motivo = $('#motivo').val();
	
	
		$.ajax({
				type:"POST",
				url:"/events/solicitudCancel",
				data:{
					user_p_id:user_p_id,
					title_can:title_can,
					phone_can:phone_can,
					motivo:motivo,
					'_token':$("meta[name='csrf-token']").attr("content"),
				},
				success:function(msg){
				
					if(msg == "enviado"){			
						Swal.fire({
							title: 'Enviado!',
							showConfirmButton: false,
							text: "Se ha enviado su solicitud",
							type: "success",
							icon: 'success',
							timer: 3500,
						});
						
						$('#cncl').click();
						
						
					}else{
						
						Swal.fire({
							title: 'Disculpe!',
							showConfirmButton: false,
							text: "Ha ocurrido un Error",
							type: "error",
							icon: 'error',
							timer: 4000,
						});
			
					}
						
				},
				error: function () {
  
					Swal.fire({
						title: 'Disculpe!',
						showConfirmButton: false,
						text: "Ha ocurrido un Error",
						type: "error",
						icon: 'error',
						timer: 4000,
					});
					
					}
			});	

	});	
});
	