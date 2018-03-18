<div class="modal show" tabindex="-1" role="dialog">
<div class="modal-backdrop">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<button type="button" class="close cerrar"  ><span aria-hidden="true">&times;</span>
</button>

  <h4 class="modal-title">
     <?= $datos['titulo'] ?>
   <i class='glyphicon glyphicon-user'></i>

  </h4>
</div>



<div class="modal-body">



<div class="modal-footer">
  
<button id=botonGuardar type="button" class="btn btn-success invisible" data-dismiss="modal"  >
  Guardar 
</button> 

<button id=botonCancelar type="button" class="btn btn-info invisible" data-dismiss="modal"  >
  Cancelar
</button>         

<button id=botonEditar type="button" class="btn btn-warning" data-dismiss="modal"  >
  Editar
</button>       

<button id=botonEstado type="button" class="btn btn-danger" data-dismiss="modal"  >
  <?= $estado="Desactivar" ?> 
</button>
  
<button id=botonCerrar type="button" class="btn btn-default cerrar" data-dismiss="modal"  >
	Cerrar
</button>



</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>


