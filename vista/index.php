<section class="container login"> 
<div id=hora class="col-md-2 bg-info text-dark"> </div>
	<div class="row " style="margin-top: 10%">
		<div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1  ">
			<br>
			<div class="panel  panel-info ">
				<div class="panel-footer">
					<div class="panel-title text-center text">
					 Iniciar Sessión <i class="glyphicon glyphicon-user"> </i>  
					</div>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal">
						
						<!-- Usuario  -->

						<div class="form-group">
							<div class="col-md-4 col-md-offset-1  col-sm-2 col-sm-offset-2">
								<label class="form-control" id=labelUsuario >
								Usuario:
							</label>

							</div>

							<div class="col-sm-6">
							<input type="text" class="form-control" name="usuario">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-4 col-md-offset-1 col-sm-offset-2 col-sm-2">
								<label class="form-control">
								Contraseña:
							</label>

							</div>

							<div class="col-sm-6">
							<input type="password" class="form-control" name="clave" >
							</div>
						</div>

					</form>
				</div>
				<div class="panel-footer">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-4">
							<button class="btn btn-block btn-success" id=ingresar > Ingresar </button>
					</div>
					<div class="col-sm-6">
							<button class="btn btn-block btn-danger" id=cambiar > Cambiar Contraseña</button>
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


</section>

