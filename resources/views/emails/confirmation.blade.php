Hola: {{ $event->personalInformation->first_name }}
<br>
<br>

Usted ha confirmado una cita para:
<br>
<br>
Dia: {{ date('d-m-Y', strtotime($event->start)) }} a las {{ $event->hora_i }} Horas<br>
Con:  {{ $event->title }}
<br>
<br>
Tomar atención para la realización de esta cita.
<br>
<br>
Éxitos.
<br>
<br>
Cordial saludo
<br>
Sistema de Reservas BUSSWE
<br>

<br>
Este es un sistema de citas de Busswe, la única tarjeta interactiva de Presentación para Negocios <br>
Asistencia y Soporte en línea al 1 (786) 431-3099
