<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>


<?php for ($i=1; $i < count($imagenes) ; $i++): ?>
<li data-target="#carousel-example-generic" data-slide-to=<?= $i ?>  ></li>
<?php endfor ?>


</ol>
<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">


<div class="item active">
<img src=<?= $imagenes[0] ?> alt="..." class="img-thumbnail">

</div>

<?php for ($i=1; $i < count($imagenes); $i++): ?>
<div class="item">
<img src=<?= $imagenes[$i] ?> alt="...">

</div>
<?php endfor ?>


</div>
<!-- Controls -->
<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Anterior</span>
</a>
<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Siguiente</span>
</a>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
