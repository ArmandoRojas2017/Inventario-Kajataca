<?php 
/*

	LLamar a la vistas
*/

	function view($archivo, $arreglo = []){

		$ruta = "vista/"; 
		
		extract($arreglo);


		if( file_exists($ruta.$archivo.".php") ){

			include $ruta.$archivo.".php"; 
			return true;

		}elseif (   file_exists("../".$ruta.$archivo.".php")) {

			include "../".$ruta.$archivo.".php";
			return true;

		}elseif (file_exists($ruta.$archivo.".html")) {

			include $ruta.$archivo.".html"; 
			return true;
		}
		
		else 
			return false; 
	}


	function controller($archivo){

		$ruta = "controlador/"; 


		if( file_exists($ruta.$archivo.".php") ){

			include $ruta.$archivo.".php"; 
			return true;

		}elseif (   file_exists("../".$ruta.$archivo.".php")) {

			include "../".$ruta.$archivo.".php";
			return true;

		}		
		else 
			return false; 
	}


	function componentes($archivo, $arreglo = []){

		$ruta = "vista/template/"; 
		
		extract($arreglo);


		if( file_exists($ruta.$archivo.".php") ){

			include $ruta.$archivo.".php"; 
			return true;

		}elseif (   file_exists("../".$ruta.$archivo.".php")) {

			include "../".$ruta.$archivo.".php";
			return true;

		}elseif (file_exists($ruta.$archivo.".html")) {

			include $ruta.$archivo.".html"; 
			return true;
		}
		
		else 
			return false; 

	}




 ?>