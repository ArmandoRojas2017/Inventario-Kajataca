<?php 

if(isset($inputs)) 

  extract($inputs); 

else {

    $id_distribuidora = ""; 
    $nombre = "";
    $descripcion = "";
    $telefono = "";
    $status = 3; 

  }

?>

<form class="form-horizontal">


<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error1 >
</label> 

<div class="form-group">
<label for="ci" class="col-sm-4 control-label">Rif</label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="rif" placeholder="Ejemplo: 260595730" <?= value($id_distribuidora) ?> >
</div>
</div>



<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error2 >
</label> 


<div class="form-group">
<label for="nombre" class="col-sm-4 control-label">Nombre de la Distribuidora</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="distribuidora" placeholder="Ejemplo: Armando Rojas" <?= value($descripcion) ?> >
</div>
</div>


<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error3 >
</label> 


<div class="form-group">
<label for="ci" class="col-sm-4 control-label">Empresa</label>
<div class="col-sm-6">
  <select name="rol" id="empresa" class="form-control rol"></select>
</div>
</div>



<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error4 >
</label> 

<div class="form-group">
<label for="inputNick" class="col-sm-4 control-label">Nombre y Apellido del Propietario</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="nombre" placeholder="Ejemplo: Armando Rojas" <?= value($nombre) ?>>
</div>
</div>




<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error5 >
</label> 

<div class="form-group oculto">
<label for="clave" class="col-sm-4 control-label">Telefono </label>
<div class="col-sm-6">
<input type="text" class="form-control" id="telefono" placeholder="Ejemplo: 04145235969"  <?= value($telefono) ?> >
	
</div>
</div>





<?php componentes("statusFormulario",compact('status')) ?>


</form>