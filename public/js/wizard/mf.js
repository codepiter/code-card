$(document).ready(function(){

/*Proporcion de las imagenes*/

/*personas*/
var _URL = window.URL || window.webkitURL;
$	("#logo").change(function(e) {
	$("#ratio-logo").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-logo").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-logo-error").css('display','none');
			}else{
				$("#ratio-logo-error").css('display','block');
				$("#ratio-logo-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#photo").change(function(e) {
	$("#ratio-photo").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-photo").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-photo-error").css('display','none');
			}else{
				$("#ratio-photo-error").css('display','block');
				$("#ratio-photo-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});



/*empresas*/

$("#file-header").change(function(e) {
	$("#ratio-header").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-header").val(rati);
		   
		   if ( rati > 0.80) {
				$("#ratio-header-error").css('display','none');
			}else{
				$("#ratio-header-error").css('display','block');
				$("#ratio-header-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});


$("#photo2").change(function(e) {
	$("#ratio-photo2").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-photo2").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-photo2-error").css('display','none');
			}else{
				$("#ratio-photo2-error").css('display','block');
				$("#ratio-photo2-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#photo3").change(function(e) {
	$("#ratio-photo3").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-photo3").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-photo3-error").css('display','none');
			}else{
				$("#ratio-photo3-error").css('display','block');
				$("#ratio-photo3-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});



$("#carr1").change(function(e) {
	$("#ratio-carr1").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-carr1").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-carr1-error").css('display','none');
			}else{
				$("#ratio-carr1-error").css('display','block');
				$("#ratio-carr1-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#carr2").change(function(e) {
	$("#ratio-carr2").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-carr2").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-carr2-error").css('display','none');
			}else{
				$("#ratio-carr2-error").css('display','block');
				$("#ratio-carr2-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#carr3").change(function(e) {
	$("#ratio-carr3").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-carr3").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-carr3-error").css('display','none');
			}else{
				$("#ratio-carr3-error").css('display','block');
				$("#ratio-carr3-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#carr4").change(function(e) {
	$("#ratio-carr4").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-carr4").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-carr4-error").css('display','none');
			}else{
				$("#ratio-carr4-error").css('display','block');
				$("#ratio-carr4-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#carr5").change(function(e) {
	$("#ratio-carr5").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-carr5").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-carr5-error").css('display','none');
			}else{
				$("#ratio-carr5-error").css('display','block');
				$("#ratio-carr5-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#carr6").change(function(e) {
	$("#ratio-carr6").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-carr6").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-carr6-error").css('display','none');
			}else{
				$("#ratio-carr6-error").css('display','block');
				$("#ratio-carr6-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});


$("#logo2").change(function(e) {
	$("#ratio-logo2").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-logo2").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-logo2-error").css('display','none');
			}else{
				$("#ratio-logo2-error").css('display','block');
				$("#ratio-logo2-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#logo3").change(function(e) {
	$("#ratio-logo3").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-logo3").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-logo3-error").css('display','none');
			}else{
				$("#ratio-logo3-error").css('display','block');
				$("#ratio-logo3-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#logo4").change(function(e) {
	$("#ratio-logo4").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-logo4").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-logo4-error").css('display','none');
			}else{
				$("#ratio-logo4-error").css('display','block');
				$("#ratio-logo4-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#logo5").change(function(e) {
	$("#ratio-logo5").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-logo5").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-logo5-error").css('display','none');
			}else{
				$("#ratio-logo5-error").css('display','block');
				$("#ratio-logo5-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});

$("#logo6").change(function(e) {
	$("#ratio-logo6").val('');
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function() {
           var rati= this.width/this.height;
		   $("#ratio-logo6").val(rati);
		   
		   if ( rati > 0.80 ) {
				$("#ratio-logo6-error").css('display','none');
			}else{
				$("#ratio-logo6-error").css('display','block');
				$("#ratio-logo6-error").html('La imagen Seleccionada es muy alta');
			}
        };
        img.src = _URL.createObjectURL(file);
    }
});


/*fin*******/


var val={
	rules:{
		template: "required",
		photo: "required",
		ratiologo: {
            ceromas: true
		},
		ratiophoto: {
            ceromas: true
		},		
		ratioheader: {
            ceromas: true
		},
		ratiophoto2: {
            ceromas: true
		},		
		ratiophoto3: {
            ceromas: true
		},
		ratiocarr1: {
            ceromas: true
		},
		ratiocarr2: {
            ceromas: true
		},		
		ratiocarr3: {
            ceromas: true
		},
		ratiocarr4: {
            ceromas: true
		},		
		ratiocarr5: {
            ceromas: true
		},
		ratiocarr6: {
            ceromas: true
		},
		ratiologo2: {
            ceromas: true
		},	
		ratiologo3: {
            ceromas: true
		},	
		ratiologo4: {
            ceromas: true
		},	
		ratiologo5: {
            ceromas: true
		},	
		ratiologo6: {
            ceromas: true
		},	
			
		
	
		first_name: "required",
		last_name: "required",	
		telephone: "required",
		whatsapp: "required",
		logo: "required",
		carr1: "required",
	},
	messages:{
		template: "Seleccione un Estilo de Tarjeta",
		photo: "Seleccione una Imagen",
		logo: "Seleccione una Imagen",
		ratiologo: {
			 required: " ",
             ceromas: "La imagen Seleccionada en muy alta"
		},
		ratiophoto: {
			 required: " ",
             ceromas: "La imagen Seleccionada en muy alta"
		},
		first_name: "Campo Requerido",
		last_name: "Campo Apellido Requerido",
		telephone: "Campo Teléfono Requerido",
		whatsapp: "Campo Whatsapp Requerido",
		carr1: "Seleccione una Imagen",
		logo: "Seleccione una Imagen",
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

		/*validacion de imagen con ratio menor a 0.80*/		

		 $.validator.addMethod("ceromas", function (value, element) {
			if ( value > 0.80) {
				return true;
			}
			if (value == '') {
				return true;
			}
				return false;
		}, "La imagen ingresada es muy alta");

			  /*campos sin espacio*/
			$('input.nospace').keydown(function(e) {
			if (e.keyCode == 32) {
			return false;
			}
			});
