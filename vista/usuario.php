<?php componentes('menu',compact('opciones')); ?>
<div class="separacion"></div>
<div class="container"> 
	<div class="row">
	
			<div class="panel-footer" style="margin-bottom: 2em">
				<h3 class="text-center">Consultar Usuarios</h3>
			</div>
		
		
	</div>
	<div class="row">

			<select id="armando" name="nick">
  <option></option>
  <option>Focus</option>
  <option>PANDITA</option>
  <option>2008</option>
  <option>2013</option>
</select>
			<?php if(!$botonera) componentes("botoneraTabla")  ?>
			<?php componentes('tabla',compact('encabezado','contenido','status')) ?>
		
		</div>
	</div>


</div>

