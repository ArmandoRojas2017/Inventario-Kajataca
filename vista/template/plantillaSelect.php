 
<?php if (isset($label)): ?>
 <div class="col-sm-1">
<label class=" control-label form-control " > <?= $label ?> </label>
</div>
<div class="col-sm-2">
<select name="status" id=<?= "'".$idSelect."'"  ?> class="form-control">
<?php endif?>

		<?php if (isset($opcionExtra)): ?>
		<option <?= value($opcionExtra['id']) ?> ><?= $opcionExtra['descripcion']  ?></option>
		<?php endif ?>


		<?php if (isset($data)): ?>

			<?php foreach ($data as $arreglo): ?>
				<?php extract($arreglo) ?>

				<option <?= value($id) ?>  ><?= $texto ?></option>

			<?php endforeach ?>
		
		<?php endif ?>

<?php if (isset($label)): ?>
</select>
</div>
<?php endif ?>
