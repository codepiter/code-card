<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
	<style>

   @page {
	margin:0cm 0cm 0cm 0cm;
	
	//padding-top:25px;
            }
	#content {
		
    width: 793px; 
	margin-left: auto;
    margin-right: auto;
   } 
   
	 header {
		position: fixed;
		top: 0cm;
		left: 0cm;
		right: 0cm;
		height: 15px;

		/** Extra personal styles **/
		background-color: transparent;
		color: white;
		text-align: center;
		line-height: 1.5cm;
	}
		

   }

#left {
  width: 320px; 

  padding-left: 24px;
  padding-top: 155px;
	
} 

#right {
    width: 449px;
    background: #E0FDFF;
	 height:100vh; // con esto se baja
	 margin-top:2px;
	
	 
} 


#left  { float:left;  }
#right { float:right; } 


	.tabla{
		padding-top: 40px;
	}


table {
	page-break-inside: auto;
	margin-top:10px;
}

.title_sm{
	margin-top: 75px;
	text-align: center;
	font-weight: bold;
	
}

.sobre_mi{
	padding-left: 24px;
	padding-right: 20px;
	text-align: justify;
	margin-top: 10px;
}

.company{
	
	text-align:left;
	font-size: 18px;
}

.title_el{
	margin-top: 25px;
	text-align: center;
	font-weight: bold;
}
.espacio{
	height: 35px;
}



.contact{
	font-size: 20px;
	font-weight: bold;
}
.phone{
	ont-size: 18px;
	font-weight: bold;
	margin-top: 10px;
}
.email{
	ont-size: 18px;
	font-weight: bold;
}
.home{
	ont-size: 18px;
	font-weight: bold;
}
.rrss{
	font-size: 18px;
	font-weight: bold;
}

.imgRedonda{
	width: 160px;
    height: 160px;
    border-radius: 80px;
}
	.estudios{
		margin-top: 25px;
		padding-left: 24px;
	}
	
	.title_estudios{
		margin-top: 25px;
		padding-left: 24px;
	    text-align: center;
	    font-weight: bold;
	}
	
	#chart-container {
        width: 640px;
        height: auto;
      }
	  

body{
	background: #f1f5ff;
}
	</style>



</head>
<body>
	

<div id="arriba" style="background:#0c1458; height:135px;"></div>

<div id="content" >



  <div id="left" style="word-wrap: break-word;">
  
   <div style="text-align: center;">
    <img src="{{ asset('storage'). '/'.$personalInformation->photo}}" class="profile" height="auto" width="25%">
   </div>
  
   <div id="object1" style="padding-right: 40px; text-align: justify;  margin-top:-75px;">

  <div style="margin-top:-60px;"><h2 style=""><strong >Datos de Contacto</strong ></h2></div>

	 <div class="phone">Phone</div>
	 <div>{{ $personalInformation->telephone }}</div>
	 <div class="email">Email</div>
	 <div>{{$user->email}}</div>
	 <div class="home">Domicilio</div>
	 <div>{{ $personalInformation->address }}</div>
	 <div>{{ $personalInformation->pais }}</div>
	<br>
	
	<div><h2 style=""><strong >Redes Sociales</strong ></h2></div>

	 <div>{{ $personalInformation->facebook }}</div>
	 <div>{{ $personalInformation->dribbble }}</div>
	 <div>{{ $personalInformation->twitter }}</div>
	 <div>{{ $personalInformation->instagram }}</div>
	</div>
	<br>
	<div>

	
	</div>
	
	<div><h2 style=""><strong >Habilidades</strong ></h2></div>
		
	@foreach ($habs_persona as $item) 
	<table class="table table-hover table-bordered" style=" width:100%">
			
		<tr>
			<td width="50%">{{ $item->skill->habilidad }}</td>
			<td>
			@if($item->medida===1)	<img  src="img/nivel1.png" style="height: 20px; width:150px"> @endif
			@if($item->medida===2)	<img  src="img/nivel2.png" style="height: 20px; width:150px"> @endif
			@if($item->medida===3)	<img  src="img/nivel3.png" style="height: 20px; width:150px"> @endif
			@if($item->medida===4)	<img  src="img/nivel4.png" style="height: 20px; width:150px"> @endif
			@if($item->medida===5)	<img  src="img/nivel5.png" style="height: 20px; width:150px"> @endif
			@if($item->medida===6)	<img  src="img/nivel6.png" style="height: 20px; width:150px"> @endif
			@if($item->medida===7)	<img  src="img/nivel7.png" style="height: 20px; width:150px"> @endif
			@if($item->medida===8)	<img  src="img/nivel8.png" style="height: 20px; width:150px"> @endif
			@if($item->medida===9)	<img  src="img/nivel9.png" style="height: 20px; width:150px"> @endif
			@if($item->medida===10)	<img  src="img/nivel10.png" style="height: 20px; width:150px"> @endif
			
			</td>
		</tr>
	</table>
	
	@endforeach	
	<br>
	<div><h2 style=""><strong >Idiomas</strong ></h2></div>
		
	@foreach ($idiomas as $idioma) 
	<table class="table table-hover table-bordered" style=" width:100%">
			
		<tr>
			<td width="50%">{{ $idioma->language->name_language }}</td>
			<td>
			@if($idioma->level===1)	<img  src="img/nivel1.png" style="height: 20px; width:150px"> @endif
			@if($idioma->level===2)	<img  src="img/nivel2.png" style="height: 20px; width:150px"> @endif
			@if($idioma->level===3)	<img  src="img/nivel3.png" style="height: 20px; width:150px"> @endif
			@if($idioma->level===4)	<img  src="img/nivel4.png" style="height: 20px; width:150px"> @endif
			@if($idioma->level===5)	<img  src="img/nivel5.png" style="height: 20px; width:150px"> @endif
			@if($idioma->level===6)	<img  src="img/nivel6.png" style="height: 20px; width:150px"> @endif
			@if($idioma->level===7)	<img  src="img/nivel7.png" style="height: 20px; width:150px"> @endif
			@if($idioma->level===8)	<img  src="img/nivel8.png" style="height: 20px; width:150px"> @endif
			@if($idioma->level===9)	<img  src="img/nivel9.png" style="height: 20px; width:150px"> @endif
			@if($idioma->level===10)	<img  src="img/nivel10.png" style="height: 20px; width:150px"> @endif
			
			</td>
		</tr>
	</table>
	
	@endforeach	
	
	</div>
	
   
     

	 
 

  <div id="right">

     <div id="object3"> 
	 
	 
	 

	 
	 <div class="nombre" style="text-align: center; color: white; margin-top: -85px; font-weight: bold; font-family: sans-serif; font-size: 35px;">{{ $personalInformation->first_name }} {{ $personalInformation->last_name }}</div>
	 <div class="position" style="text-align: center; color: white;">{{ $personalInformation->position }}</div>
	 

	 <br>
	  <div><h2 style="padding-left: 24px;"><strong >Sobre Mi</strong ></h2></div>
	
	 <div class="sobre_mi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $personalInformation->presentation }}</div>
	
	

  <div><h2 style="padding-left: 24px;"><strong >Estudios</strong ></h2></div>
		
		
		<?php foreach ($formations as $formation){ ?>
		<table width="100%" border="0" style="padding-left: 24px; padding-right: 20px; page-break-inside: avoid;">
		  <tr>
			<td colspan="2" ><strong >Instituto:</strong>{{ $formation->instituto_name }} </td>
			
		  </tr>
		  <tr>
			<td>Desde: {{ Carbon\Carbon::parse( $formation->inicio)->format('Y-m') }}
			</td>
			<td>Hasta: {{ Carbon\Carbon::parse( $formation->fin)->format('Y-m') }}</td>
		  </tr>
		  
		   <tr>
			<td colspan="2">Culminado: @if($formation->culminado==1) Si @else No @endif
			</td>
		  </tr>  
		  <tr>
			<td colspan="2">Título Obtenido: {{ $formation->titulo_obtenido }}</td>
		  </tr>
		</table>
		<br>
		<?php } ?>
		  
  </div>
  
  
  <div><h2 style="padding-left: 24px;"><strong >Experiencia Laboral</strong ></h2></div>
		<?php
	
	$cwe=count($work_exp);
	$cp=count($position);
	
	$cont1=0;
	while ($cont1 < $cwe){
		
		$company = $work_exp[$cont1]['company'];
		$w_inicio = $work_exp[$cont1]['inicio'];
		$w_fin = $work_exp[$cont1]['fin'];
		?>

		






	<h3 style="padding-left: 24px; margin-top:15px;"><strong>Datos de la Empresa</strong ></h3><br>	
	<table class="table table-hover table-bordered" style="width:100%; padding-top:-30px; padding-left: 24px; padding-right: 20px; page-break-inside: avoid;">		
		<tr>
			<td class="company" colspan="2">Nombre de la Empresa:  {{ $company}}</td>
	    </tr>
		<tr>
			<td>Desde: {{ Carbon\Carbon::parse($w_inicio)->format('m-Y') }} </td>
			<td>Hasta: {{ Carbon\Carbon::parse($w_fin)->format('m-Y') }}</td>
		</tr>		
	</table>
	
	<?php

		$work_exp_id=$work_exp[$cont1]['id'];
		$cont = 0;
			while ($cont < $cp){
				if($cont === $cont1){

				$z = count($position[$cont]);
				$cargo = $position[$cont];
				
					foreach($cargo as $cg){
						
						$p_name = $cg->position_name;
						$p_desc = $cg->description;
						$p_inicio = $cg->inicio;
						$p_fin = $cg->fin;
						
	?>
				
			<h3 style="padding-left: 24px;"><strong>Cargo</strong ></h3>
			<table  style=" width:100%; padding-left: 24px; padding-right: 20px; page-break-inside: avoid;" >
			  <tr>
				<td class="company" colspan="2">Nombre del Cargo: {{ $p_name}}</td>
			  </tr>
			  <tr>
				<td>Desde: {{ Carbon\Carbon::parse($p_inicio)->format('m-Y' )}}</td>
				<td>Hasta: {{ Carbon\Carbon::parse($p_fin)->format('m-Y') }}</td>
			  </tr>
			  <tr>
				<td colspan="2">Descripción del Cargo: {{ $p_desc}}</td>
			  </tr>  
			</table>





						<?php
						
					
					}
				}
			
				echo "<br>";
				$cont=$cont+1;
			}
		$cont1=$cont1+1;
	}
	
	?>	


	 
	 </div>
    
  </div>
</div>
	
</body>
</html>