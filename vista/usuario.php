<?php 

componentes('menu',compact('opciones')); ?>


<div class="separacion"></div>
<div class="container"> 

	<?php componentes('titulo',compact('titulo','icono')); ?>

	<div class="row">

		
			<?php 

				if(!isset($botonera)) componentes("botoneraTabla",compact("select")) ;
				else componentes($botonera,compact("select"))

			 ?>

			

			<?php componentes('tabla',compact('encabezado','contenido')) ?>
		
		</div>
	</div>


