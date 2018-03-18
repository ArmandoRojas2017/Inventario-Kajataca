<?php componentes('menu',compact('opciones')); ?>
<div class="separacion"></div>
<div class="container"> 
	<div class="row">
	
			<div class="panel-footer" style="margin-bottom: 2em">
				<h3 class="text-center">Consultar Usuarios</h3>
			</div>
		
		
	</div>
	<div class="row">
			
			<?php componentes('tabla',compact('encabezado','contenido')) ?>
		
		</div>
	</div>

</div>

