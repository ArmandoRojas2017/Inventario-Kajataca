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

   	 <td style="text-align: left;">
      		<?= $contenido[$i]['nombre'] ?>
    	</td>
  </tr>

  <?php endfor ?>

  </tbody>
</table>

