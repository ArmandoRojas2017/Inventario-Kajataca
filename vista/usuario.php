<?php componentes('menu',compact('opciones')); ?>
<div class="separacion"></div>
<div class="container"> 

	<?php componentes('titulo',compact('titulo','icono')); ?>

	<div class="row">

		
			<?php if(!$botonera) componentes("botoneraTabla")  ?>
			<?php componentes('tabla',compact('encabezado','contenido','status')) ?>
		
		</div>
	</div>


