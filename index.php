

<?php  
session_start();

require_once 'config/Config.php';

require_once 'include/Helpers.php'; 

require_once 'include/Rutas.php';

if( !isset($_SESSION['id'])) $_SESSION['id'] = -1;

/*controlador base*/
?>

<?php if ($rutas->getJs() != "no" ): ?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kajataca 1.0</title>

	<!-- Agregando Estilos  -->

	<!-- Resetear la Pantalla -->
	<link rel="stylesheet" href="vendor/normalize.css">
	<!-- Agregar Bootstrap´mas el Tema -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">


	
	<link rel="stylesheet" href="css/ack.css">
	<!-- Paquete de iconos -->
	<link rel="stylesheet" href="vendor/icono/stylesheet.css">

	<!-- Plugins -->

	<!-- Para mostrar una descripcion -->
	<link rel="stylesheet" href="vendor/jquery-flyout-master/jquery.flyout.css">
	<!--  Wow Js -->
	<link rel="stylesheet" href="vendor/wow/animate.css">
	
	<link rel="stylesheet" href="vendor/table/jquery.dynatable.css">
	

	<!-- fin de lo estilos -->

		<!-- Icono  -->
	<link rel="shortcut icon" href="images/icono.ico">
</head>

<body>
<?php endif ?>


<?php $rutas->getController() ?>

<?php if ($rutas->getJs() != "no" ): ?>

<footer> 
	<span id=Hora> </span>
	-
	<span id=Nombre_Usuario > Armando Rojas 2018    </span>
	

</footer>


<script src="vendor/jquery/crazy.js" > </script>
<script src="vendor/bootstrap/js/bootstrap.min.js" > </script>
<script src="vendor/wow/wow.js" > </script>
<script src="vendor/table/jquery.dynatable.js" > </script>
<script src="vendor/jquery-flyout-master/jquery.flyout.js" > </script>
<script src="vendor/notify-bootstrap/bootstrap-notify.min.js" > </script>
<script src="vendor/select/bootstrap-select.js" > </script>
<script src="vendor/sweetAlert2/sweetalert2.js" > </script>
<script src="js/mensajes.js" > </script>
<script src="js/animar_all.js" > </script>
<script src="js/jquery.kajataca.js" > </script>
<script src="js/Menu.js" > </script>
<script src="js/validacion_formulario.js" > </script>

<!-- Script para cada Pagina  -->

<?php if( file_exists("js/".$rutas->getJs().".js")  ): ?>
	
	<script src=<?= "'js/".$rutas->getJs().".js'" ?>  > </script>

<?php endif ?>



<script type="text/javascript"> 

	localStorage.ajax = <?= "'". RUTAS['ajax'] . "'"  ?>
</script>

</body>
</html>

<?php endif ?>

