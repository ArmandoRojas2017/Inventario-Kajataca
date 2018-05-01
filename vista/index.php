<section class="container login"> 
<div id=hora class="col-md-2 bg-info text-dark"> </div>
	<div class="row " style="margin-top: 10%">
		<div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1  ">
			<br>
			<div class="panel  panel-info sombra_roja ">
				<div class="panel-footer">
					<div class="panel-title text-center text">
						<h3>
					 Iniciar Sessión <i class="glyphicon glyphicon-user"> </i>  
					</h3>
					</div>
				</div>
				<div class="panel-body">



					<div class="col-md-8 col-md-offset-2 ">
					<img src="images/logo.gif" class="img-responsive img-thumbnail">
					</div>
					
					<div class="col-md-8 col-md-offset-2 ">
						<div class="separacion"></div>
					</div>


					<form method="post" class="form-horizontal">
						
						<!-- Usuario  -->
						<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error1 >
							
						</label> 
						<div class="form-group">
						

							<div class="col-md-4 col-md-offset-1  col-sm-2 col-sm-offset-2">
								<label class="form-control" id=labelUsuario >
								Usuario:
							</label>

							</div>

							<div class="col-sm-6">
							
							
							 <div class="input-group">
	      						
	      						<input type="text" class="form-control" name="usuario"  >
	      						<div class="input-group-addon">
	      							<i class="glyphicon glyphicon-user" ></i>
	      						</div>
	    					</div>

							</div>
						</div>


	<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error2 ></label> 
						<div class="form-group">
							<div class="col-md-4 col-md-offset-1 col-sm-offset-2 col-sm-2">
								<label class="form-control">
								Contraseña:
							</label>

							</div>

							<div class="col-sm-6">
						<div class="input-group">

							<input type="password" class="form-control" name="clave" >

							<div class="input-group-addon">
	      							

	      							<i class="glyphicon glyphicon-lock" ></i>
	      						</div>
	    				</div>

							</div>
						</div>

					</form>
<div class="row">
					<div class="col-sm-offset-1 col-sm-4">
							<button class="btn btn-block btn-primary" id=ingresar > 
								Ingresar 
								
							</button>
					</div>
					<div class="col-sm-6">
							<button class="btn btn-block btn-danger" id=cambiar > Cambiar Contraseña</button>
					</div>
				

				</div>
					
				</div>
				<div class="panel-footer">
				
				<div class="row">
					
					
					<div class="col-sm-offset-1 col-sm-10 text-center">
							UNEFA 2018 - version Beta 3.0.1
					</div>
					
				

				</div>


					
				</div>
				
				
			</div>


		</div>
	</div>
	<br>

	<?php for ($i=0; $i < 10 ; $i++): ?> 
		<br>
	<?php endfor ?>

	



<div id=area > </div>
</section>


