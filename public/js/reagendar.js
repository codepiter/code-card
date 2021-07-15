/*Modificar de bd Menu en listado*/
	
		  $(".reagen-item").on("click", function(){
			  
			  var id = $(this).data("id");
		
				$.ajax({
					url: "/events/findEvent",
					type:"post",
					data: {
						"id": id,
						"_token": $("meta[name='csrf-token']").attr("content"),
					},
					success: function (evento){	
				
					  $('#txtFechai').val(evento.start);
					  $('#personal_information_id').val(evento.personal_information_id);
					  $('#txtID').val(evento.id);
					  $('#title').val(evento.title);
					  $('#txtColor').val(evento.textColor);
					  $('#txtColort').val(evento.color);
					  $('#description').val(evento.description);
					  $('#phone').val(evento.phone);
					  $('#whatsapp').val(evento.whatsapp);
					  $('#email').val(evento.email);
					  $('#hora_i').val(evento.hora_i);
					  $('#hora_f').val(evento.hora_f);
					  
					  	var hic = (evento.hora_i).substring(0, 5);
						var hfc = (evento.hora_f).substring(0, 5);
					
						var hor=hic+"/"+hfc;
						
						
						$("#hours option").each(function(){
							if($(this).val() == hor){
								
								$(this).prop("selected", true);
							}
						});
						
					  
						$("#id_itemb").val(id);
		
						$("#mi-modalrea").modal('show');
					}
				});
			
		
			
		  });



 $("#btnAceptarCita").on("click", function(){

		var token = $("meta[name='csrf-token']").attr("content");
		var id = $("#txtID").val();
				
			data={
					id:id,
				    personal_information_id:$('#personal_information_id').val(),
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
					fecha_evento:$('#txtFechai').val(),
					'_token':$("meta[name='csrf-token']").attr("content"),
					'_method':"PATCH"
			}
		

			$.ajax({
				url: "/events/"+$('#txtID').val(),
				type:"post",
				data: data,
				success: function (msg){	
					location.reload();
					console.log(msg);
					if(msg == "actualizado"){
					Swal.fire({
						title: '',
						showConfirmButton: false,
						text: "Cita confirmada satisfactoriamente",
						type: "success",
						icon: 'success',
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
					}
					
					$("#mi-modalrea").modal('show');
				}
			});
		
});