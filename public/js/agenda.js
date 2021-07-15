document.addEventListener('DOMContentLoaded', function() {
	
	var dias =$('#dias').val();	
    var calendarEl = document.getElementById('agenda');
		
	if (calendarEl) {
		
	 var calendar = new FullCalendar.Calendar(calendarEl, {
          initiaView: 'dayGridMonth',

		locale:"es",	
			 header:{
				 left: 'prev',
				 center: 'title',
				 right:'next'
			 },


		businessHours: {		 
		  daysOfWeek: "["+dias+"]",
		},

		selectable: true, 

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
			
		   limpiarFormulario();
		   $('#txtFechai').val(info.event.start);
				   
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
			  $('#whatsapp').val(info.event.extendedProps.whatsapp);
			  $('#email').val(info.event.extendedProps.email);
			  $('#hora_i').val(info.event.extendedProps.hora_i);
			  $('#hora_f').val(info.event.extendedProps.hora_f);
		
				var hic = (info.event.extendedProps.hora_i).substring(0, 5);
				var hfc = (info.event.extendedProps.hora_f).substring(0, 5);
			
				var hor=hic+"/"+hfc;
				
				
				$("#hours option").each(function(){
					if($(this).val() == hor){
						
						$(this).prop("selected", true);
					}
				});

			  $('#exampleModal').modal();
			 },

		events:"events/lista/id"	
        });
		
		calendar.setOption('locale','Es');
        calendar.render();		
		
	}		
		$('#btnAgregar').click(function(){
			
			
			var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
			var nomb = $.trim($("#title").val());
			var asun = $.trim($("#description").val());
			var emai = $.trim($("#email").val());
			
			var f_in = $("#hora_i").val();
			var f_fn = $("#hora_f").val();
			
			
			if( (nomb.length>0) && (asun.length>0) && (emai.length>0) && (regex.test($('#email').val().trim())) && (f_in < f_fn) ){
			
				
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
				
				$(".s-alerta").text("Verifique los campos");
				$(".s-alerta").css("color", "red");	
		
			}
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
					whatsapp:$('#whatsapp').val(),
					email:$('#email').val(),
					color:$('#txtColor').val(),
					textColor:$('#txtColort').val(),
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
					console.log(msg);
					if(msg == "ocupado"){			
						Swal.fire({
							title: 'Disculpe!',
							showConfirmButton: false,
							text: "Ya existe una cita en ese horario",
							type: "error",
							icon: 'error',
							timer: 3500,
						});
					}else if(msg == "ocupado_confirmada"){
					Swal.fire({
						title: '',
						showConfirmButton: false,
						text: "Ya ha confirmado una cita en ese horario",
						type: "error",
						icon: 'error',
						timer: 3500,
					});	
					}else if(msg == "eliminado"){
					Swal.fire({
						title: '',
						showConfirmButton: false,
						text: "Cita eliminada satisfactoriamente",
						type: "success",
						icon: 'success',
						timer: 3500,
					});	
					}else if(msg == "actualizado"){
					Swal.fire({
						title: '',
						showConfirmButton: false,
						text: "Cita confirmada satisfactoriamente",
						type: "success",
						icon: 'success',
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
					}
						calendar.refetchEvents();						
					},
				error:function(){
					
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
				  $('#phone').val("+1");
				  $('#whatsapp').val("");
				  //$('#email').val("");
				  $('#description').val("");
				  $('#txtColor').val("");
				  $('#txtColort').val("#ffffff");
				  $('#27').prop("selected", true);
				  
			}
			
      });  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	 $('document').ready(function(){

		$('#hora_f').on('change', function() {
		var hinicio=$('#hora_i').val();

			if((this.value) < hinicio){
				$(".val-fin").text("La hora no debe ser menor a la de inicio ✖");
				$(".val-fin").css("color", "red");

			}else{
				$(".val-fin").text("✓");
				$(".val-fin").css("color", "black");
				
				$(".val-in").text("✓");
				$(".val-in").css("color", "black");
			}

		});		
		
		$('#hora_i').on('change', function() {
		var hfin=$('#hora_f').val();

			if((this.value) > hfin){
				$(".val-in").text("La hora no debe ser mayor a la de fin ✖");
				$(".val-in").css("color", "red");

			}else{
				$(".val-fin").text("✓");
				$(".val-fin").css("color", "black");
					
				$(".val-in").text("✓");
				$(".val-in").css("color", "black");
			}

		});
	
	});
	
	
	
		
$(document).ready(function() {  
	$("#phone").keydown(function(e) {
	
		var oldvalue=$(this).val();
		var field=this;
		setTimeout(function () {
			if(field.value.indexOf('+1') !== 0) {
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



	