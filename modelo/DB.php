<?php 
//activar sesion
session_start();

// Buscar la configuracion

if(file_exists('../../config/DB.php')) 
		require_once ('../../config/DB.php');
	elseif (file_exists('../config/DB.php')) {
		require_once ('../config/DB.php');
	}

	elseif (file_exists('../../../config/DB.php')   ) {
		require_once ('../../../config/DB.php');
	}
	elseif (file_exists('../config/DB.php')   ) {
		require_once ('../config/DB.php');
	}
	elseif (file_exists('config/DB.php')   ) {
		require_once ('config/DB.php');
	}
	else 
		exit("NO EXISTE LA CONEXION CON LA CONFIGURACION");


	// Status 
	// true = 1
	// false = 0



	class DB
	{
		var $link; 
		var $control;
		var $resultado; 

		function DB(){
			
			$this->control = false; 

			if ($this->link = mysql_connect(SERVIDOR_BD,USUARIO_BD,CLAVE_BD) ) 

				if (mysql_select_db(BASE_DE_DATOS)) $this->control = true;
		}

		function getControl(){

			return $this->control;
		}

		function consulta($consulta,$opc='0'){

			$this->resultado = mysql_query($consulta,$this->link);

			if($opc != '0'){

			  if( mysql_numrows($this->resultado) > 0) return true; 
				else return false; 
			}
			else return false; 
			
		}

		function getCantidad(){

			return mysql_numrows($this->resultado); 
		}

		function getResultado($atributo,$indice=0){

			return mysql_result($this->resultado, $indice, $atributo); 
		}

		function cerrar(){

			mysql_close(); 
		}

		function getId($tabla, $dato){
				$control = 0;
				$id=0;
				


				do{

				$id = (rand() % 10000 )+ 1; 
				$control = 
				$this->consulta("SELECT * FROM $tabla WHERE $id = $dato",1);

				}while($control == true); 

				return $id; 

		}

		function valorExiste($tabla,$dato,$valor){

			$control =  $this->consulta("SELECT * FROM $tabla WHERE '$valor' = $dato ",1);

			if($control == true) return true; 
			else return false; 

		}


		
	}



 ?>
