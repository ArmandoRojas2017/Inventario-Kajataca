 <?php if (($status) == 1): ?>
 	<div class="form-group">
 	<div class="col-sm-6">
            <h6 class="btn btn-success btn-sm" style="display: inline;  ">
              Activo
            </h6>
            </div>
            </div>


            <?php elseif ($status == 3): ?>

          <?php else: ?>

          	 	<div class="form-group">
 	<div class="col-sm-6">
            <h6 class="btn btn-info btn-sm" style="display: inline;  ">
            Desactivado
            </h6>
             </div>
            </div>
          <?php endif  ?>