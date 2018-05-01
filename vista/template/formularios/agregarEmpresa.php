<?php if(isset($inputs))extract($inputs) ?>

<form class="form-horizontal">


<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error1 >
</label> 

<div class="form-group">
<label for="ci" class="col-sm-4 control-label">Rif</label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="inputCedula" placeholder="Ejemplo: 26059573" <?php if(isset($id_empresas) ) echo  value($id_empresas) ?> >
</div>
</div>



<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error2 >
</label> 



<div class="form-group">
<label for="nombre" class="col-sm-4 control-label">Nombre de la Empresa</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNombre" placeholder="Ejemplo: Armando Rojas" <?php if(isset($descripcion) ) echo  value($descripcion) ?> >
</div>
</div>



<?php componentes("statusFormulario",compact('status')) ?>


</form>