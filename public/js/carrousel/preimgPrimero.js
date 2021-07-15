// Obtener referencia al input y a la imagen
const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
$imagenPrevisualizacion = document.querySelector("#lienzo");

const $seleccionArchivos2 = document.querySelector("#seleccionArchivos2"),
$imagenPrevisualizacion2 = document.querySelector("#lienzo2");
/*888888888888888888888888888888888888888888888888888888888888888888888888888888888888*/
// Escuchar cuando cambie
$seleccionArchivos.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $seleccionArchivos.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
  }
  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
});
/*888888888888888888888888888888888888888888888888888888888888888888888888888888888888*/
$seleccionArchivos2.addEventListener("change", () => {
  const archivos2 = $seleccionArchivos2.files;
  if (!archivos2 || !archivos2.length) {
    $imagenPrevisualizacion2.src = "";
    return;
  }
  const primerArchivo = archivos2[0];
  const objectURL = URL.createObjectURL(primerArchivo);
  $imagenPrevisualizacion2.src = objectURL;
});