<?php 

	require_once '../../modelo/Rol.php';
	require_once '../../include/Helpers.php';

	$modelo = new Rol();
	$modelo->preparar_consulta();

	$opc = $modelo->get_array();
 ?>
	<option value="">TODOS</option>
	
 	<?php for ($i=0; $i < count($opc) ; $i++):?>

 	<option <?= value($opc[$i]['id_roles']) ?>>
 	 <?= $opc[$i]['descripcion']  ?>
 	  </option>
 	<?php endfor ?>
 