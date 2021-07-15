/*Modificar de bd Menu en listado*/
	 var modalConfirm = function(callback){
	  
		  $(".confirm-item").on("click", function(){
			  var id = $(this).data("id");
			  
			$("#id_itemb").val(id);
		
			$("#mi-modalb").modal('show');
		  });

		  $("#modal-btn-sii").on("click", function(){
			callback(true);
			$("#mi-modalb").modal('hide');
		  });
		  
		  $("#modal-btn-noo").on("click", function(){
			callback(false);
			$("#mi-modalb").modal('hide');
		  });
	};

	modalConfirm(function(confirm){
		if(confirm){
		event.preventDefault();

		var token = $("meta[name='csrf-token']").attr("content");
		var id = $("#id_itemb").val();
	
			$.ajax(
			{
				url: "/events/aprobar",
				type:"post",
				data: {
					"id": id,
					"_token": token,
				},
				success: function (msg){	
					location.reload();
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
						timer: 4500,
					});	
					}
				}
			});
			
			
			
		  }
	});