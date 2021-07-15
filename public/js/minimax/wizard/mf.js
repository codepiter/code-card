$(document).ready(function(){

var val={
	rules:{
		template: "required",
		photo: "required",
		first_name: "required",
		last_name: "required",
		telephone: "required",
		whatsapp: "required",
	},
	messages:{
		template: "Seleccione un Estilo de Tarjeta",
		photo: "Seleccione una Imagen",
		first_name: "Campo Nombre Requerido",
		last_name: "Campo Apellido Requerido",
		telephone: "Campo Teléfono Requerido",
		whatsapp: "Campo Whatsapp Requerido",
	}
}


			$("#myForm").multiStepForm(
			{
				// defaultStep:0,
				beforeSubmit : function(form, submit){
					console.log("called before submiting the form");
					console.log(form);
					console.log(submit);
				},
				validations:val,
			}
			).navigateTo(0);
			
	
			
			
		});