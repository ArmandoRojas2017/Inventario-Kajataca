<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

<?php 

	require_once 'include/Helpers.php'; 
	


	view('template/cabezera');

?>



<?php 

$url = empty($_GET['url']) ?  'index':$_GET['url'];



if( !controller($url) ) view('404');




?>
	
<?php 
	view('template/pie', compact("url") );

?>