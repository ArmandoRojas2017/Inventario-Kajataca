<?php componentes('menu',compact('opciones')); ?>
<div class="separacion"></div>
<div class="container"> 
	<div class="row">
		<div class="jumbotron well text-center">
			<h1 >
				
					¡Hola! <br>
					<span id=nombre_usuario>Armando</span>	
					

			</h1>

			

			<br>

			<h2>
				
				te damos la Bienvenida al Sistema Kajataca
			</h2>
			<h3>
				<span id=mi_reloj> </span>
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2 ">
			
			<div class="panel panel-info">
				<div class="panel-header">
						<div class="panel-title text-muted text-center">
							<h2 id=tituloPista >Ed Sheeran - Kiss me </h2>
						 </div>
				 </div>

				 <div class="panel-body text-center" id=pista  >
				 	
				 	
				 </div>
				
			</div>

		 </div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1 ">
			
			<?php componentes('galeria',compact('imagenes'))  ?>

		</div>
	</div>
</div>

<footer> Armando Rojas 2018   </footer>


