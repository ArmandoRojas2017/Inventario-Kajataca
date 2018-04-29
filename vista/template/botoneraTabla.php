<div class="row">
<div class="form-group">


<div class="col-sm-2">
<label class="form-control" > Estado</label>

</div>

<div class="col-sm-2">
<select name="status" id="status" class="form-control">
	<option value="-3">TODOS</option>
	<option value="1">ACTIVOS</option>
	<option value="0">DESACTIVADOS</option>
	
</select>
</div>

<?php 

if(isset($select)) componentes($select) ;

?>


<div class="col-sm-1">
<button id=botonImprimir class="btn btn-danger"> Imprimir </button>  


</div>
<div class="col-sm-1">
<button id=botonRegistrar class="btn btn-primary"> Registrar </button>
</div>

</div>
</div>






