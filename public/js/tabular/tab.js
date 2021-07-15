$(document).ready(function(){
	

	/*actualidad work experience*/
	$( '.actual_we' ).on( 'click', function() {
		if( $(this).is(':checked') ){
			$(this).closest(".exp1").find("input[name='actual_work[]']").val("1");
			$(this).closest(".exp1").find("input[name='fin_work[]']").prop('readOnly',true);	

		} else {
			$(this).closest(".exp1").find("input[name='actual_work[]']").val("2");
			$(this).closest(".exp1").find("input[name='fin_work[]']").prop('readOnly',false);
		}
	}); 
	
	
	/*actualidad work experience EDITAR*/
	$( '.actual_we' ).on( 'click', function() {
		if( $(this).is(':checked') ){
			$(this).closest(".exp1").find("input[name='actual_work[]']").val("1");
			$(this).closest(".exp1").find("input[name='fin_work[]']").prop('readOnly',true);	

		} else {
			$(this).closest(".exp1").find("input[name='actual_work[]']").val("2");
			$(this).closest(".exp1").find("input[name='fin_work[]']").prop('readOnly',false);
		}
	}); 
	

	/*fin actualidad work experience*/
	
	
	/*actualidad position*/
	$( '.actual_ca' ).on( 'click', function() {
		if( $(this).is(':checked') ){
			$(this).closest(".carg1").find("input[name='actual_p[]']").val("1");
			$(this).closest(".carg1").find("input[name='fin_p[]']").prop('readOnly',true);	

		} else {
			$(this).closest(".carg1").find("input[name='actual_p[]']").val("2");
			$(this).closest(".carg1").find("input[name='fin_p[]']").prop('readOnly',false);
		}
	}); 
	

	/*fin actualidad position*/

		 var count = 1;

		 function dynamic_field(number)
		 {		
				html = '<div class="carg" ><div class="col-md-12"><h3><strong>Cargo</strong></h3></div><div class="col-xl-12 col-md-12 col-md-12 text-center" style="margin-top: 25px;"><button style="margin-top:20px;"type="button" name="rem" class="btn btn-danger rem">Eliminar Cargo</button></div> <div class="col-md-12"><strong>Nombre del Cargo:</strong><input type="hidden" name="num_desc[]"   value="0" class="form-control"/><input type="text"  name="position[]" class="form-control" required><br></div><div class="row carg1" style="padding-left:15px; padding-right:15px"><div class="col-md-5"><strong>Desde:</strong><input type="month"  name="inicio_p[]" class="form-control" required><br></div><div class="col-md-5"><strong>Hasta:</strong><input type="month"  name="fin_p[]" class="form-control" required></div><div class="col-md-2" style="display: flex; align-items: center;"><input type="text"  name="actual_p[]" value="2" class="form-control d-none" ><input class="form-check-input actual_ca" type="checkbox" value="2" id="act_c" style="-webkit-appearance:checkbox;" name="actual_po[]"><label class="form-check-label" for="act_p">Actualidad</label></div></div><div class="col-md-12"><strong>Descripción del Cargo:</strong><input type="text"  name="description_p[]" class="form-control" required><br></div></div>';
				$('.div-cargo').append(html);					
		 }
		 
		 $(document).on('click', '#add-cargo', function(){

		  count++;
		  dynamic_field(count);	
			
		 });



		 $(document).on('click', '.rem', function(){

		    $(this).closest(".carg").remove();		
		 });
 

});


//Añadir div-tabla nuevo de descripción

$(document).on('click', '#add-desc', function(){

	var tables = $("table").length;
	
	var x= (tables - 1);
	var num2= Math.floor((Math.random()*999)+1);
	var num=x+""+num2;
	 html = '<div class="des">';	
		html += '<div class="col-md-12"><input type="hidden" name="desc_num[]" value='+ num +' class="nd"/></div>'
		html += '<div class="col-md-12 exp_tab"><div class="col-md-6"><h3><strong>Experiencia</strong></h3></div><div class="col-xl-12 col-md-12 col-md-12 text-center" style="margin-top: 25px;"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger remov">Eliminar Experencia Laboral</button></div><div class="col-md-12"><strong>Empresa:</strong><input type="text"  name="company[]" class="form-control" placeholder="Empresa" required><br></div><div class="row" style="padding-left:15px; padding-right:15px"><div class="col-md-5"><strong>Inicio:</strong><input type="month"  name="inicio_work[]" class="form-control" placeholder="" required><br></div><div class="col-md-5"><strong>Fin:</strong><input type="month"  name="fin_work[]" class="form-control" placeholder="Description" required></div><div class="col-md-2" style="display: flex; align-items: center;"><input type="text"  name="actual_work[]" value="2" class="form-control d-none" ><input class="form-check-input actual_we_t" type="checkbox" value="2"  style="-webkit-appearance:checkbox;" name="actual_wor[]"><label class="form-check-label" >Actualidad</label></div><br></div></div>'
	
	
		html += '<div class="carg" style="padding-left: 15px; padding-right: 15px;"><div class="col-md-12"><h3><strong>Cargo</strong></h3></div><div class="col-xl-12 col-md-12 col-md-12 text-center" style="margin-top: 25px;"><button type="button" name="add-cargo-c" id="add-cargo-c" class="btn btn-success">Agregar Cargo</button></div> <div class="col-md-12"><strong>Nombre del Cargo:</strong><input type="hidden" name="num_desc[]"  value='+ num +'  class="form-control"/><input type="text"  name="position[]" class="form-control" required><br></div><div class="row carg1" style="padding-left:15px; padding-right:15px"><div class="col-md-5"><strong>Desde:</strong><input type="month"  name="inicio_p[]" class="form-control" required><br></div><div class="col-md-5"><strong>Hasta:</strong><input type="month"  name="fin_p[]" class="form-control" required></div><div class="col-md-2" style="display: flex; align-items: center;"><input type="text"  name="actual_p[]" value="2" class="form-control d-none" ><input class="form-check-input actual_ca" type="checkbox" value="2" id="act_c" style="-webkit-appearance:checkbox;" name="actual_po[]"><label class="form-check-label" for="act_p">Actualidad</label></div></div><div class="col-md-12"><strong>Descripción del Cargo:</strong><input type="text" name="description_p[]" class="form-control" required><br></div></div> ';		
	 html += '<div class="div-cargo-add"></div></div>';		
	
		
    $('#div-desc').append(html);	
		
	 
}); 



//Añadir work experience en EDITAR

$(document).on('click', '#add-desc-ed', function(){

	var tables = $("table").length;
	
	
	var num5= Math.floor((Math.random()*99999)+1);
	
	 html = '<div class="des">';	
		html += '<div class=""><input type="hidden" name="desc_num[]" value='+ num5 +' class="nd"/></div>'
		html += '<div class="exp_tab"><div class="row"><div class="col-md-6"><h4><strong>Datos de la Empresa</strong></h4></div><div class="col-md-6 text-right"><button type="button" name="remove" class="btn btn-danger remov">Eliminar Experencia Laboral</button></div></div><div class=""><strong>Empresa:</strong><input type="text"  name="company_n[]" class="form-control" placeholder="Empresa" required><br></div><div class="row" ><div class="col-md-5"><strong>Inicio:</strong><input type="month"  name="inicio_work_n[]" class="form-control" placeholder="" required><br></div><div class="col-md-5"><strong>Fin:</strong><input type="month"  name="fin_work_n[]" class="form-control" placeholder="Description" required></div><div class="col-md-2" style="display: flex; align-items: center;"><input type="text"  name="actual_work_n[]" value="2" class="form-control d-none" ><input class="form-check-input actual_we_t" type="checkbox" value="2"  style="-webkit-appearance:checkbox;" name="actual_wor[]"><label class="form-check-label" >Actualidad</label></div><br></div></div>'
	
	
		html += '<div class="carg"><div class="row"><div class="col-md-6"><strong>Cargo</strong></div><div class="col-md-6 text-right"><button type="button" name="add-cargo-c-ed" id="add-cargo-c-ed" class="btn btn-success">Agregar Cargo</button></div></div><div class=""><strong>Nombre del Cargo:</strong><input type="hidden" name="num_desc[]"  value='+ num5 +'  class="form-control"/><input type="text"  name="position_n[]" class="form-control" required><br></div><div class="row carg1" ><div class="col-md-5"><strong>Desde:</strong><input type="month"  name="inicio_p_n[]" class="form-control" required><br></div><div class="col-md-5"><strong>Hasta:</strong><input type="month"  name="fin_p_n[]" class="form-control" required></div><div class="col-md-2" style="display: flex; align-items: center;"><input type="text"  name="actual_p_n[]" value="2" class="form-control d-none" ><input class="form-check-input actual_ca" type="checkbox" value="2" id="act_c" style="-webkit-appearance:checkbox;" name="actual_po[]"><label class="form-check-label" for="act_p">Actualidad</label></div></div><div class=""><strong>Descripción del Cargo:</strong><input type="text" name="description_p_n[]" class="form-control" required><br></div></div> ';		
	 html += '<div class="div-cargo-add-ed"></div></div>';		
	
		
    $('.div-exp-n').append(html);	
		
	 
}); 


//Agregar cargo - copia en nueva experiencia (desc_num / num_desc)
 $(document).on('click', '#add-cargo-c-ed', function(){
	 
	 var nds = $(this).closest('.des').find('.nd').val();

		 html5 = '<div class="carg"><div class="row"><div class="col-md-6"><strong>Cargo</strong></div><div class="col-md-6 text-right"><button type="button" name="rem" class="btn btn-danger rem">Eliminar Cargo</button></div></div> <div class=""><strong>Nombre del Cargo:</strong><input type="hidden" name="num_desc[]"  value='+ nds +'  class="form-control"/><input type="text"  name="position_n[]" class="form-control" required><br></div><div class="row carg1" ><div class="col-md-5"><strong>Desde:</strong><input type="month"  name="inicio_p_n[]" class="form-control" required><br></div><div class="col-md-5"><strong>Hasta:</strong><input type="month"  name="fin_p_n[]" class="form-control" required></div><div class="col-md-2" style="display: flex; align-items: center;"><input type="text"  name="actual_p_n[]" value="2" class="form-control d-none" ><input class="form-check-input actual_ca" type="checkbox" value="2" id="act_c" style="-webkit-appearance:checkbox;" name="actual_po[]"><label class="form-check-label" for="act_p">Actualidad</label></div></div><div class=""><strong>Descripción del Cargo:</strong><input type="text"  name="description_p_n[]" class="form-control" required><br></div></div>';
				
			$(this).closest('.des').find('.div-cargo-add-ed').append(html5);	
 });
		 
		 
		 
		 


//Agregar cargo - copia
 $(document).on('click', '#add-cargo-c', function(){
	 
	 var nds = $(this).closest('.des').find('.nd').val();

		  html2 = '<div class="carg"><div class="col-md-12"><h3><strong>Cargo</strong></h3></div><div class="col-xl-12 col-md-6 col-md-6 text-center" style="margin-top: 25px;"><button style="margin-top:20px;"type="button" name="rem" class="btn btn-danger rem">Eliminar Cargo</button></div> <div class="col-md-12"><strong>Nombre del Cargo:</strong><input type="hidden" name="num_desc[]"  value='+ nds +'  class="form-control"/><input type="text"  name="position[]" class="form-control" required><br></div><div class="row carg1" style="padding-left:15px; padding-right:15px"><div class="col-md-5"><strong>Desde:</strong><input type="month"  name="inicio_p[]" class="form-control" required><br></div><div class="col-md-5"><strong>Hasta:</strong><input type="month"  name="fin_p[]" class="form-control" required></div><div class="col-md-2" style="display: flex; align-items: center;"><input type="text"  name="actual_p[]" value="2" class="form-control d-none" ><input class="form-check-input actual_ca" type="checkbox" value="2" id="act_c" style="-webkit-appearance:checkbox;" name="actual_po[]"><label class="form-check-label" for="act_p">Actualidad</label></div></div><div class="col-md-12"><strong>Descripción del Cargo:</strong><input type="text"  name="description_p[]" class="form-control" required><br></div></div>';
				
			$(this).closest('.des').find('.div-cargo-add').append(html2);					
			
		 });
		 
		 
		 
//Agregar cargo nuevos a las experiencias existentes en EDITAR
 $(document).on('click', '#add-cargo-ed', function(){
	 
	 var idex = $(this).closest('.exp-car').find('.idex').val();

		 html8 = '<div class="cargo-n-ex"><div class="row"><div class="col-md-6"><strong>Cargo</strong></div><div class="col-md-6 text-right"><button style="margin-top:20px;"type="button" name="ecexn" class="btn btn-danger ecexn">Eliminar Cargo</button></div></div><div class=""><strong>Nombre del Cargo:</strong><input type="hidden" name="id_ex[]"  value='+ idex +'  class="form-control"/><input type="text"  name="position_ne[]" class="form-control" required><br></div><div class="row carg1" ><div class="col-md-5"><strong>Desde:</strong><input type="month"  name="inicio_p_ne[]" class="form-control" required><br></div><div class="col-md-5"><strong>Hasta:</strong><input type="month"  name="fin_p_ne[]" class="form-control" required></div><div class="col-md-2" style="display: flex; align-items: center;"><input type="text"  name="actual_p_ne[]" value="2" class="form-control d-none" ><input class="form-check-input actual_ca" type="checkbox" value="2" id="act_c" style="-webkit-appearance:checkbox;" name="actual_po[]"><label class="form-check-label" for="act_p">Actualidad</label></div></div><div class=""><strong>Descripción del Cargo:</strong><input type="text"  name="description_p_ne[]" class="form-control" required><br></div></div>';
				
	$(this).closest('.exp-car').find('.div-carg-e').append(html8);					
			
});
		
//Eliminar cargo nuevo a las experiencia existente EDITAR
 $(document).on('click', '.ecexn', function(){

	$(this).closest(".cargo-n-ex").remove();		
 });


		
		 
//Remover div-tabla de descripción
 $(document).on('click', '.remov', function(){

  $(this).closest(".des").remove();		

 });
 
 //Agregar fila de tabla descripción
  $(document).on('click', '.addb', function(){
  
  var row= $(this).parents("tr:last");
	var nm = row.find("input[name='num_desc[]']").val(); 
	
	
    html = '<tr>';
	    html += '<td><input type="text" name="position[]"  class="form-control" required/><input type="hidden" name="num_desc[]"   value='+nm+' class="form-control"/></td>';
		html += '<td><input type="text" name="description_p[]"  class="form-control qty" required/></td>';
		html += '<td><input type="month" name="inicio_p[]"  class="form-control cost-u" required/></td>';
		html += '<td><input type="month" name="fin_p[]"  class="form-control sb-t totales" required/></td>';		
		html += '<td><button type="button" name="remove" id="" class="btn btn-danger removf">Remover</button></td></tr>';
        $(this).closest("tbody").append(html);
	
	
 });
 
 //Remover 
 $(document).on('click', '.removf', function(){

	var tabs= $(this).closest("table");
	$(this).closest("tr").remove();
  
 });
 
 
 //Añadir formacion

$(document).on('click', '#add-form', function(){

	var tables = $("table").length;
	
	
	 html = '<div class="form"><div class="col-md-12"><div class="row"><div class="col-md-6"><strong>Nueva Formación</strong></div><div class="col-md-6 text-right"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger remov">Eliminar Formación</button></div></div>';	
  		
	 html += '<div class="col-md-12"><strong>Instituto:</strong><input type="text"  name="instituto_name[]" class="form-control" placeholder="Instituto" required></div><div class="row" style="padding-left:15px; padding-right:15px"><div class="col-md-5"><strong>Culminado:</strong><select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="culminado[]"><option value="1" selected>Si</option><option value="0">No</option></select></div><div class="col-md-7"><strong>Título Obtenido:</strong><input type="text"  name="titulo_obtenido[]" class="form-control" placeholder="" required><br></div></div><div class="row" style="padding-left:15px; padding-right:15px"><div class="col-md-6"><strong>Fecha Inicio:</strong><input type="month"  name="inicio_formation[]" class="form-control" placeholder="" required><br></div><div class="col-md-6"><strong>Fecha Fin:</strong><input type="month"  name="fin_formation[]" class="form-control" placeholder="" required><br></div></div>';		
	 
	 html += '</div>';		
	
		
    $('#div-form').append(html);	
		
	 
});  


//Añadir formacion en editar

$(document).on('click', '#add-form-ed', function(){

	var tables = $("table").length;
	
	
	 html = '<div class="form"><div class=""><div class="row"><div class="col-md-6"><strong>Nueva Formación</strong></div><div class="col-md-6 text-right"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger remov">Eliminar Formación</button></div></div>';	
  		
	 html += '<div class="col-md-12"><strong>Instituto:</strong><input type="text"  name="instituto_name_n[]" class="form-control" placeholder="Instituto" required></div><div class="row" style="padding-left:15px; padding-right:15px"><div class="col-md-5"><strong>Culminado:</strong><select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="culminado_n[]"><option value="1" selected>Si</option><option value="0">No</option></select></div><div class="col-md-7"><strong>Título Obtenido:</strong><input type="text"  name="titulo_obtenido_n[]" class="form-control" placeholder="" required><br></div></div><div class="row" style="padding-left:15px; padding-right:15px"><div class="col-md-6"><strong>Fecha Inicio:</strong><input type="month"  name="inicio_formation_n[]" class="form-control" placeholder="" required><br></div><div class="col-md-6"><strong>Fecha Fin:</strong><input type="month"  name="fin_formation_n[]" class="form-control" placeholder="" required><br></div></div>';		
	 
	 html += '</div>';		
	
		
    $('#div-form').append(html);	
		
	 
}); 

//Remover formacion
 $(document).on('click', '.remov', function(){

  $(this).closest(".form").remove();		

 }); 
 
 //Añadir habilidad
 
$(document).ready(function(){
  var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"/resume/getHabilidad",
          method:"POST",
          data:{_token:_token},
          success:function(data){
					
			 html = '<div class="habi"><div class="col-md-12"><div class="col-md-12 text-center"><button type="button" name="add-hab" id="add-hab" class="btn btn-success">Agregar Habilidad</button></div><div class="col-md-12"><div class="row"><div class="col-md-7"><strong>Habilidad:</strong><select name="skill_id[]" id="skill_id" class="form-control">'+data+'</select></div><div class="col-md-5"><strong>Nivel:</strong><select name="medida[]" id="medida" class="form-control"><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div></div></div></div></div>';	
  		
			$('#div-habil').append(html);	
					
          }
		});
	 
});  

$(document).on('click', '#add-hab', function(){
	
	      var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"/resume/getHabilidad",
          method:"POST",
          data:{_token:_token},
          success:function(data){
					
			 html = '<div class="habi"><div class="col-md-12"><div class="col-md-12 text-center"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger re_h">Eliminar Habilidad</button></div><div class="col-md-12"><div class="row"><div class="col-md-7"><strong>Habilidad:</strong><select name="skill_id[]" id="skill_id" class="form-control">'+data+'</select></div><div class="col-md-5"><strong>Nivel:</strong><select name="medida[]" id="medida" class="form-control"><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div></div></div></div></div>';
  		
			$('#div-habil').append(html);	
					
          }
         });
 
}); 

//Remover habilidad
 $(document).on('click', '.re_h', function(){

  $(this).closest(".habi").remove();		

 });
 
 

 //Añadir habilidad en EDITAR
  $(document).on('click', '#add-hab-ed', function(){
	
  var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"/resume/getHabilidad",
          method:"POST",
          data:{_token:_token},
          success:function(data){
					
			 html = '<div class="habi"><div class=""><div class="col-md-12 text-center"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger re_h">Eliminar Habilidad</button></div><div class=""><div class="row"><div class="col-md-7"><strong>Habilidad:</strong><select name="skill_id_n[]" id="skill_id" class="form-control">'+data+'</select></div><div class="col-md-5"><strong>Nivel:</strong><select name="medida_n[]" id="medida" class="form-control"><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></div></div></div></div></div><br>';	
  		
			$('#div-habil-ed').append(html);	
					
          }
		});
	 
});




 
//Añadir idioma
 
$(document).ready(function(){
  var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"/resume/getIdioma",
          method:"POST",
          data:{_token:_token},
          success:function(data){
					
			 html = '<div class="idi"><div class="col-md-12"><div class="col-md-12 text-center"><button type="button" name="add-id" id="add-id" class="btn btn-success">Agregar Idioma</button></div><div class="col-md-12"><div class="row"><div class="col-md-7"><strong>Idioma:</strong><select name="language_id[]" id="language_id" class="form-control">'+data+'</select></div><div class="col-md-5"><strong>Nivel:</strong><select name="level[]" id="level" class="form-control"><option value="Básico" selected>Básico</option><option value="Intermedio">Intermedio</option><option value="Avanzado">Avanzado</option><option value="Bilingue">Bilingue</option></select></div></div></div></div></div>';	
  		
			$('#div-idioma').append(html);	
					
          }
		});
	 
});  
//Añadir idioma en EDITAR
 
 $(document).on('click', '#add-id-ed', function(){
  var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"/resume/getIdioma",
          method:"POST",
          data:{_token:_token},
          success:function(data){
					
			 html = '<div class="idi"><div class=""><div class="col-md-12 text-center"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger re_i">Eliminar Idioma</button></div><div class=""><div class="row"><div class="col-md-7"><strong>Idioma:</strong><select name="language_id_n[]" id="language_id" class="form-control">'+data+'</select></div><div class="col-md-5"><strong>Nivel:</strong><select name="level_n[]" id="level" class="form-control"><option value="Básico" selected>Básico</option><option value="Intermedio">Intermedio</option><option value="Avanzado">Avanzado</option><option value="Bilingue">Bilingue</option></select></div></div></div></div></div><br>';	
  		
			$('#div-idioma-ed').append(html);	
					
          }
		});
	 
});  


$(document).on('click', '#add-id', function(){
	
	      var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"/resume/getIdioma",
          method:"POST",
          data:{_token:_token},
          success:function(data){
					
			 html = '<div class="idi"><div class="col-md-12"><div class="col-md-12 text-center"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger re_i">Eliminar Idioma</button></div><div class="col-md-12"><div class="row"><div class="col-md-7"><strong>Idioma:</strong><select name="language_id[]" id="language_id" class="form-control">'+data+'</select></div><div class="col-md-5"><strong>Nivel:</strong><select name="level[]" id="level" class="form-control"><option value="Básico" selected>Básico</option><option value="Intermedio">Intermedio</option><option value="Avanzado">Avanzado</option><option value="Bilingue">Bilingue</option></select></div></div></div></div></div>';
  		
			$('#div-idioma').append(html);	
					
          }
         });
 
}); 

//Remover idioma
 $(document).on('click', '.re_i', function(){

  $(this).closest(".idi").remove();		

 }); 
 
//Añadir Referencia
 
$(document).ready(function(){			
			 html = '<div class="ref"><div class="col-md-12"><div class="col-md-12 text-center"><button type="button" name="add-ref" id="add-ref" class="btn btn-success">Agregar Referencia</button></div><div class="col-md-12"><div class="row"><div class="col-md-7"><strong>Nombre Persona de Referencia:</strong><input name="nombre_ref[]" id="nombre_ref" class="form-control"></div><div class="col-md-5"><strong>Teléfono:</strong><input name="telefono_ref[]" id="telefono_ref" class="form-control"></div></div></div></div></div>';	
  		
			$('#div-refer').append(html);					    
});  



$(document).on('click', '#add-ref', function(){
	
					
			 html = '<div class="ref"><div class="col-md-12"><div class="col-md-12 text-center"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger re_r">Eliminar Referencia</button></div><div class="col-md-12"><div class="row"><div class="col-md-7"><strong>Nombre Persona de Referencia:</strong><input name="nombre_ref[]" id="nombre_ref" class="form-control"></div><div class="col-md-5"><strong>Teléfono:</strong><input name="telefono_ref[]" id="telefono_ref" class="form-control"></div></div></div></div></div>';
  		
			$('#div-refer').append(html);	
 
}); 

//agregar referencia en EDITAR

$(document).on('click', '#add-ref-ed', function(){
	
					
			 html = '<div class="ref"><div class=""><div class="col-md-12 text-center"><button style="margin-top:20px;"type="button" name="remove" class="btn btn-danger re_r">Eliminar Referencia</button></div><div class=""><div class="row"><div class="col-md-7"><strong>Nombre Persona de Referencia:</strong><input name="nombre_ref_n[]" id="nombre_ref" class="form-control"></div><div class="col-md-5"><strong>Teléfono:</strong><input name="telefono_ref_n[]" id="telefono_ref" class="form-control"></div></div></div></div></div>';
  		
			$('#div-refer-ed').append(html);	
 
}); 




//Remover ref
 $(document).on('click', '.re_r', function(){

  $(this).closest(".ref").remove();		

 });
 
 /*actualidad dinamicos work experience */
	$(document).on('click', '.actual_we_t', function(){

		if( $(this).is(':checked') ){

			$(this).closest(".exp_tab").find("input[name='fin_work[]']").prop('readOnly',true);	
			$(this).closest(".exp_tab").find("input[name='actual_work[]']").val("1");
		} else {
			$(this).closest(".exp_tab").find("input[name='fin_work[]']").prop('readOnly',false);
			$(this).closest(".exp_tab").find("input[name='actual_work[]']").val("2");
		}
	}); 
 
 /*actualidad dinamicos work experience nuevos en EDITAR*/
	$(document).on('click', '.actual_we_t', function(){

		if( $(this).is(':checked') ){

			$(this).closest(".exp_tab").find("input[name='fin_work_n[]']").prop('readOnly',true);	
			$(this).closest(".exp_tab").find("input[name='actual_work_n[]']").val("1");
		} else {
			$(this).closest(".exp_tab").find("input[name='fin_work_n[]']").prop('readOnly',false);
			$(this).closest(".exp_tab").find("input[name='actual_work_n[]']").val("2");
		}
	}); 


	/*actualidad dinamicos position*/
	$(document).on('click', '.actual_ca', function(){
		if( $(this).is(':checked') ){
			$(this).closest(".carg1").find("input[name='actual_p[]']").val("1");
			$(this).closest(".carg1").find("input[name='fin_p[]']").prop('readOnly',true);	

		} else {
			$(this).closest(".carg1").find("input[name='actual_p[]']").val("2");
			$(this).closest(".carg1").find("input[name='fin_p[]']").prop('readOnly',false);
		}
	}); 
	

	/*actualidad dinamicos position nuevos en EDITAR*/
	$(document).on('click', '.actual_ca', function(){
		if( $(this).is(':checked') ){
			$(this).closest(".carg1").find("input[name='actual_p_n[]']").val("1");
			$(this).closest(".carg1").find("input[name='fin_p_n[]']").prop('readOnly',true);	

		} else {
			$(this).closest(".carg1").find("input[name='actual_p_n[]']").val("2");
			$(this).closest(".carg1").find("input[name='fin_p_n[]']").prop('readOnly',false);
		}
	}); 
	
	/*actualidad dinamicos position a existente en EDITAR*/
	$(document).on('click', '.actual_ca', function(){
		if( $(this).is(':checked') ){
			$(this).closest(".carg1").find("input[name='actual_p_ne[]']").val("1");
			$(this).closest(".carg1").find("input[name='fin_p_ne[]']").prop('readOnly',true);	

		} else {
			$(this).closest(".carg1").find("input[name='actual_p_ne[]']").val("2");
			$(this).closest(".carg1").find("input[name='fin_p_ne[]']").prop('readOnly',false);
		}
	}); 
	

	/*fin actualidad position*/	
	

/*eliminar de bd formacion en editar*/
	$(document).on('click', '.deleteRecord', function(event){
	   
	   event.preventDefault();
	   
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
	var  div = $(this).closest(".form");
		$.ajax(
		{
			url: "/formations/"+id,
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
	
/*eliminar de bd work experience en editar*/
	$(document).on('click', '.deleteExperience', function(event){
	   
	   event.preventDefault();
	   
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
	var  div = $(this).closest(".exp-car");
		$.ajax(
		{
			url: "/worke/"+id,
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
		
/*eliminar de bd position en editar*/
	$(document).on('click', '.deleteCargo', function(event){
	   
	   event.preventDefault();
	   
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
	var  div = $(this).closest(".cargodiv");
		$.ajax(
		{
			url: "/positions/"+id,
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
			
/*eliminar de bd idioma en editar*/
	$(document).on('click', '.deleteIdioma', function(event){
	   
	   event.preventDefault();
	   
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
   
	var  div = $(this).closest(".idiodiv");
		$.ajax(
		{
			url: "/idioms/"+id,
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
				
/*eliminar de bd habilidad en editar*/
	$(document).on('click', '.deleteHabilidad', function(event){
	   
	   event.preventDefault();
	   
		var id = $(this).data("id");
		var token = $("meta[name='csrf-token']").attr("content");
	   
		var  div = $(this).closest(".habildiv");
		$.ajax(
		{
			url: "/habilidades/"+id,
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
					
/*eliminar de bd referencia en editar*/
	$(document).on('click', '.deleteReferencia', function(event){
	   
	   event.preventDefault();
	   
		var id = $(this).data("id");
		var token = $("meta[name='csrf-token']").attr("content");
	   
		var  div = $(this).closest(".refediv");
		$.ajax(
		{
			url: "/referencias/"+id,
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
	