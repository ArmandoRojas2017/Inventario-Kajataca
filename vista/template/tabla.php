<button class="btn btn-danger"> Imprimir </button>  
<button class="btn btn-primary"> Registrar Usuario </button>

<table id="search-example" class="table table-responsive ">
  
  <thead class="bg-primary">
    <tr>
      <?php for( $i = 0; $i < count($encabezado); $i++ ): ?>
      <th data-dynatable-column=<?= $encabezado[$i]['filtro'] ?> class="dynatable-head">
      	 <?= $encabezado[$i]['texto'] ?>
      </th>
    <?php endfor ?>
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
        <button class="btn btn-warning"  value="123" >
            <i class="glyphicon glyphicon-edit" >  </i>
        </button>
      </td>

      <td>
        <button  class="btn btn-danger" value="123" >
            <i class="glyphicon glyphicon-erase"> </i>
         </button>
      </td>
  </tr>

  <?php endfor ?>

  </tbody>
</table>

