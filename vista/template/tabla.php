<button class="btn btn-danger"> Imprimir </button>  
<button class="btn btn-primary"> Registrar Usuario </button>


<table id="search-example" class="table table-responsive ">
  
  <thead class="bg-primary">
    <tr>
      <!-- Cargar datos  -->
      <?php for( $i = 0; $i < count($encabezado); $i++ ): ?>
      <th data-dynatable-column=<?= $encabezado[$i]['filtro'] ?> class="dynatable-head">
      	 <?= $encabezado[$i]['texto'] ?>
      </th>
    <?php endfor ?>

        <th>
          Ver 
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
          <!-- Boton de Editar y Desactivar -->
          <button class="btn btn-default"  onclick="return verProducto(this.value)"  value=<?= $contenido[$i]['id'] ?>   > 
            <i class="glyphicon glyphicon-eye-open" > </i>  
          </button>

        


      </td>

  </tr>


  <?php endfor ?>

 

  </tbody>
</table>

