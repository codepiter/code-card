function VerWa()
{
    
    var URLactual = window.location;
	var nombre = document.getElementById("nombre").value;
    var tlf = document.getElementById("tlf").value;
    var url_wa = "Hola soy "+nombre+", Te envio mi tarjeta";
   window.open("https://api.whatsapp.com/send?phone="+tlf+"&text="+url_wa+" "+URLactual);
   //window.open("https://wa.me/+"+tlf+"?text="+url_wa+" "+URLactual);
}