<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ha recibido una respuesta a su solicitud de cita</title>
</head>
<body>
Su cita ha sido agendada para el día {{ date('d-m-Y', strtotime($event->start)) }} a las {{ $event->hora_i }}<br>

 
 
 <div style="text-align: center;">
	<h4><strong>Gracias por contactarnos</strong></h4>  
 </div>
</body>
</html>