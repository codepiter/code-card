
 var micanvas = document.getElementById("imagenPrevisualizacion");
 var ctx = micanvas.getContext("2d");
 
 var miimagen = new Image();
// miimagen.src = "{{ HTML::image('/img/SSSSS.png')}}";
 miimagen.src = "/img/user.png";
 miimagen.onload = function(){
 ctx.drawImage(miimagen, 0,0);
 }