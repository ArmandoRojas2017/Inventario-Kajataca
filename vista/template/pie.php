<script src="vendor/jquery/crazy.js" > </script>
<script src="vendor/bootstrap/js/bootstrap.min.js" > </script>
<script src="vendor/wow/wow.js" > </script>

<script src="vendor/jquery-flyout-master/jquery.flyout.js" > </script>

<script src="vendor/notify-bootstrap/bootstrap-notify.min.js" > </script>

<script src="vendor/select/bootstrap-select.js" > </script>
<script src="vendor/sweetAlert2/sweetalert2.js" > </script>

<script src="js/jquery.kajataca.js" > </script>

<script src="js/Menu.js" > </script>

<!-- Script para cada Pagina  -->

<?php if( file_exists("js/".$url.".js")  ): ?>
	
	<script src=<?= "'js/".$url.".js'" ?>  > </script>

<?php endif ?>



</body>
</html>

