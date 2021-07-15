//Añadir plato create
$(document).on('click', '#add-plato', function(){
	
	var _token = $("meta[name='csrf-token']").attr("content");
	 $.ajax({
	  url:"/menus/getCategory",
	  method:"POST",
	  data:{_token:_token},
	  success:function(data){
		  
		 html = '<div class="platillo">';	
			 
		 html += '<div class="col-md-12 text-center"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger remov">Eliminar Plato</button></div>';	
				
		 html += '<div class="row"><div class="col-12 col-sm-12 col-md-6"><div class="form-group"><strong>Título:</strong><input type="text" name="title[]" class="form-control"></div></div><div class="col-12 col-sm-12 col-md-6"><div class="form-group"><strong>Categoría:</strong><select name="category_id[]" id="category_id" class="form-control">'+data+'</select></div></div><div class="col-12 col-sm-12 col-md-12"><div class="form-group"><strong>Descripción:</strong><textarea name="description[]" class="form-control"></textarea></div></div><div class="col-12 col-sm-12 col-md-6"><div class="form-group"><strong>Precio:</strong><input type="text" name="price[]" class="form-control"></div></div><div class="col-12 col-sm-12 col-md-6"><div class="form-group"><strong>Foto:</strong><input type="file" name="photo1[]" class="form-control" ></div></div></div>';
	
		 html += '</div>';			
			
			$('#div-platos').append(html);	
				
	  }
	 });

});  

//Añadir plato editar

$(document).on('click', '#add-plato-ed', function(){
	var _token = $("meta[name='csrf-token']").attr("content");
	 $.ajax({
	  url:"/menus/getCategory",
	  method:"POST",
	  data:{_token:_token},
	  success:function(data){
		  
		 html = '<div class="platillo">';	
			 
		 html += '<div class="col-md-12 text-center"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger remov">Eliminar Plato</button></div>';	
				
		 html += '<div class="row"><div class="col-12 col-sm-12 col-md-6"><div class="form-group"><strong>Título:</strong><input type="text" name="title[]" class="form-control"></div></div><div class="col-12 col-sm-12 col-md-6"><div class="form-group"><strong>Categoría:</strong><select name="category_id[]" id="category_id" class="form-control">'+data+'</select></div></div><div class="col-12 col-sm-12 col-md-12"><div class="form-group"><strong>Descripción:</strong><textarea name="description[]" class="form-control"></textarea></div></div><div class="col-12 col-sm-12 col-md-3"><div class="form-group"><strong>Precio:</strong><input type="text" name="price[]" class="form-control"></div></div><div class="col-12 col-sm-12 col-md-3"><div class="form-group"><strong >Disponibilidad:</strong><select class ="form-control" id="" name="status_id[]"><option value="1">Si</option><option value="2">No</option></select></div></div><div class="col-12 col-sm-12 col-md-6"><div class="form-group"><strong>Foto:</strong><input type="file" name="photo1[]" class="form-control" ></div></div></div>';	
	
		 html += '</div>';			
			
			$('#div-platos').append(html);	
				
	  }
	 });	 
});  


//Remover plato
 $(document).on('click', '.remov', function(){

  $(this).closest(".platillo").remove();		

 }); 
 
 
/*Eliminar de bd Plato en editar*/
	$(document).on('click', '.remov-ex', function(event){
	   
	   event.preventDefault();
	   
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
	var  div = $(this).closest(".platillo-ex");
		$.ajax(
		{
			url: "/tabmenus/"+id,
			type: 'DELETE',
			data: {
				"id": id,
				"_token": token,
			},
			success: function (){
				console.log("it Works");
				div.remove();				
			}
		});

	});
	
 
