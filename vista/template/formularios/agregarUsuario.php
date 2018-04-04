<?php if($inputs)extract($inputs) ?>

<form class="form-horizontal">


<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error1 >
</label> 

<div class="form-group">
<label for="ci" class="col-sm-4 control-label">Cedula de Identidad</label>
<div class="col-sm-6">
<input  type="text" class="form-control" id="inputCedula" placeholder="Ejemplo: 26059573" <?= value($id_usuarios) ?> >
</div>
</div>



<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error2 >
</label> 



<div class="form-group">
<label for="nombre" class="col-sm-4 control-label">Nombre y Apellido</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNombre" placeholder="Ejemplo: Armando Rojas" <?= value($nombre) ?> >
</div>
</div>

<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error3 >
</label> 

<div class="form-group">
<label for="inputNick" class="col-sm-4 control-label">Nombre de Usuario </label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNick" placeholder="Ejemplo: Unicornio123" <?= value($nick) ?>>
</div>
</div>

<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error4 >
</label> 


<div class="form-group">
<label for="ci" class="col-sm-4 control-label">Rol</label>
<div class="col-sm-6">
	<select name="rol" id="rol" class="form-control"></select>
</div>
</div>


<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error5 >
</label> 


<div class="form-group oculto">
<label for="clave" class="col-sm-4 control-label">Contraseña <span id=ver1 class="glyphicon glyphicon-eye-open"></span> </label>
<div class="col-sm-6">
<input type="password" class="form-control" id="inputClave" placeholder="Ejemplo: Azhk123ñP" >
	
</div>
</div>


<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error6 >
</label> 


<div class="form-group oculto">
<label for="ci" class="col-sm-4 control-label">
Repita Contraseña  
<span id=ver2 class="glyphicon glyphicon-eye-open"></span> 
</label>

<div class="col-sm-6">
<input type="password" class="form-control" id="inputClave2" placeholder="Ejemplo: Azhk123ñP ">
	
</div>
</div>

<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error7 >
</label> 


<div class="form-group oculto">
<label for="ci" class="col-sm-4 control-label">Pregunta Secreta</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputPregunta" placeholder="Ejemplo: ¿Comida Favorita?">
	
</div>
</div>


<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error8 >
</label> 


<div class="form-group oculto">
<label for="ci" class="col-sm-4 control-label">
Respuesta a la pregunta Secreta
<span id=ver3 class="glyphicon glyphicon-eye-open"></span>
</label>
<div class="col-sm-6">
<input type="password" class="form-control" id="inputRespuesta1" placeholder="Ejemplo: Ensalada de Pollo :v">
	
</div>
</div>


<label for="ci" class="col-sm-offset-5 control-label text-danger oculto" id=error9 >
</label> 


<div class="form-group">
<label for="ci" class="col-sm-4 control-label oculto">
Repita la Respuesta
<span id=ver4 class="glyphicon glyphicon-eye-open"></span>
</label>
<div class="col-sm-6">
<input type="password" class="form-control" id="inputRespuesta2" placeholder="Ejemplo: Ensalada de Pollo :v">
	
</div>
</div>




 <?php if (($status) == 1): ?>
            <h6 class="btn btn-success btn-sm" style="display: inline;  ">
              Activo
            </h6>
          <?php else: ?>
            <h6 class="btn btn-info btn-sm" style="display: inline;  ">
            Desactivado
            </h6>
          <?endif  ?>
<?= $status  ?>

</form>