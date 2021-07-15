var canvas = document.getElementById("lienzo");
//document.body.appendChild(canvas);

if (canvas){
var context = canvas.getContext('2d');
canvas.width = 400;
canvas.height = 300;
}
var upload_image;
var imageX, imageY;
var mouseX, mouseY;
var imageDrag = false;



var idCanvas = 'lienzo';
var idForm='myForm';
//var inputImagen='seleccionArchivos';
var lienzo=document.getElementById(idCanvas);


//var seleccionArchivos=document.getElementById(inputImagen); 









// Obtener referencia al input y a la imagen
const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
$lienzo = document.querySelector("#lienzo");


if (canvas){
// Escuchar cuando cambie
$seleccionArchivos.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $seleccionArchivos.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $lienzo.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $lienzo.src = objectURL;






make_base();

canvas.addEventListener("mousemove", function (evt) {
    var mousePos = getMousePos(canvas, evt);
    mouseX = mousePos.x;
    mouseY = mousePos.y;
});

function getMousePos(canvas, event) {
    var rect = canvas.getBoundingClientRect();
    return {
        x: event.clientX - rect.left,
        y: event.clientY - rect.top
    };
}

function isInsideImage(rect) {
    var pos = { x: mouseX, y: mouseY };
    return pos.x > imageX && pos.x < imageX + rect.width && pos.y < imageY + rect.height && pos.y > imageY;
}

function make_base()
{
    upload_image = new Image();
	imageX = 0;
	imageY = 0;
    upload_image.onload = function(){
        context.drawImage(upload_image, 0, 0);
    }
   // upload_image.src = 'https://lh3.googleusercontent.com/-6Zw-hozuEUg/VRF7LlCjcLI/AAAAAAAAAKQ/A61C3bhuGDs/w126-h126-p/eagle.jpg';
    upload_image.src = objectURL;
}

canvas.addEventListener("mousedown", function (evt) {
    if(isInsideImage(upload_image)) {
        imageDrag = true;
    }
});

canvas.addEventListener("mouseup", function (evt) {
    if(imageDrag)
        imageDrag = false;
});

setInterval(function() {
    if(imageDrag) {
		context.clearRect(0, 0, canvas.width, canvas.height);
		// imageX = mouseX;
        // imageY = mouseY;
		imageX = mouseX -50;
        imageY = mouseY -50;
		
		
        context.drawImage(upload_image, imageX, imageY);
    }
}, 1000/30);




});


}
/* Enviar el trazado */

    function GuardarTrazado(){
      upload_image.value=document.getElementById(idCanvas).toDataURL('image/png');
      document.forms[idForm].submit();
    }
