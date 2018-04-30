<?php if($inputs)extract($inputs) ?>

<form class="form-horizontal">


<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error1 >
</label> 

<div class="form-group">
<label for="ci" class="col-sm-4 control-label">Rif</label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="inputCedula" placeholder="Ejemplo: 26059573" <?= value($id_empresas) ?> >
</div>
</div>



<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error2 >
</label> 



<div class="form-group">
<label for="nombre" class="col-sm-4 control-label">Nombre de la Empresa</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNombre" placeholder="Ejemplo: Armando Rojas" <?= value($descripcion) ?> >
</div>
</div>




 <?php if (($status) == 1): ?>
 	<div class="form-group">
 	<div class="col-sm-6">
            <h6 class="btn btn-success btn-sm" style="display: inline;  ">
              Activo
            </h6>
            </div>
            </div>
          <?php else: ?>

          	 	<div class="form-group">
 	<div class="col-sm-6">
            <h6 class="btn btn-info btn-sm" style="display: inline;  ">
            Desactivado
            </h6>
             </div>
            </div>
          <?php endif  ?>


</form>