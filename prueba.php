<?php 
	
require_once 'config/Config.php';  
require_once 'include/Helpers.php'; 
require_once 'include/Rutas.php';
require_once 'modelo/&Modelo.php';
require_once 'modelo/Empresas.php';


$rutas = new Empresas();

$arreglo = array( 'id' => '12' , 'nombre' => 'PAPAS'  );

echo $rutas->add($arreglo)

 ?>