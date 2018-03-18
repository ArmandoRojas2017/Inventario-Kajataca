

<table id="search-example" class="table table-responsive " style="margin-top: 2em">
  
  <thead class="bg-primary">
    <tr>
      <!-- Cargar datos  -->
      <?php for( $i = 0; $i < count($encabezado); $i++ ): ?>
      <th data-dynatable-column=<?= $encabezado[$i]['filtro'] ?> class="dynatable-head">
      	 <?= $encabezado[$i]['texto'] ?>
      </th>
    <?php endfor ?>

        <th data-dynatable-column="estado" class="dynatable-head" >
          Estado
        </th>
    </tr>
  </thead>


  <tbody>
    <?php for( $i = 0; $i < count($contenido); $i++ ): ?>
  
  <tr>
      <?php foreach (   $contenido[$i] as $texto ): ?>
   	 <td style="text-align: left;">
      		<?= $texto ?>
    	</td>
      <?php endforeach ?>

      <td>
            
          <?php if (($status[$i]) == 1): ?>
            <h6 class="btn btn-success btn-sm" style="display: inline;  ">
              Activo
            </h6>
          <?php else: ?>
            <h6 class="btn btn-info btn-sm" style="display: inline;  ">
            Desactivado
            </h6>
          <?endif  ?>
         
          <!-- Boton de Editar y Desactivar -->
          <button class="btn btn-default "  onclick="return verProducto(this.value)"  value=<?= $contenido[$i]['id'] ?>   > 
            <i class="glyphicon glyphicon-eye-open" > </i>  

          </button>

        


      </td>

  </tr>


  <?php endfor ?>

 

  </tbody>
</table>

