<?php componentes('menu',compact('opciones')); ?>
<div class="separacion"></div>
<div class="container"> 
	
<?php componentes('titulo',compact('titulo','icono')); ?>

	<div class="row">
	
	<div class="col-sm-8 col-sm-offset-2">
		
<div class="panel panel-primary ">
	<div class="panel-header bg-primary">
		<div class="panel-title text-center " style="padding: 1em" > 

		<span  id="mi_reloj" > </span>  
		<span  class="glyphicon glyphicon-time" > </span>  
		---
		<span id="nombre_usuario"> </span>  
		<span  class="glyphicon glyphicon-user" > </span>  


		</div>
	</div>
				<div class="panel-body">
					
					<?php componentes($formulario) ?>
				</div>

				<div class="panel-footer text-center">
					<button id=botonGuardar class="btn btn-primary" disabled > Guardar </button>
					<button id=botonSalir class="btn btn-danger"> Salir </button>
				</div>
			</div>
		

	</div>
		
			
		</div>
	</div>

<div class="separacion"></div>	


