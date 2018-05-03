<div class="modal show" tabindex="-1" role="dialog">
<div class="modal-backdrop">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<button type="button" class="close cerrar"  ><span aria-hidden="true">&times;</span>
</button>

  <h4 class="modal-title text-center">
     <?= $datos['titulo'] ?>
   <i class='glyphicon glyphicon-user'></i>

  </h4>
</div>



<div class="modal-body">


<?php componentes("".$formulario,compact('inputs')) ?>

<?php if(!isset($botonera)): ?>

<div class="modal-footer">
  <?php componentes('botoneraModal',compact('estado')) ?>
</div>
<?php 	else: ?>
	<div class="modal-footer">
  	<?php componentes($botonera,compact('estado')) ?>
	</div>

<?php endif ?>

</div><!-- /.modal-content -->

</div><!-- /.modal-dialog -->

</div><!-- /.modal -->
</div>




