<?php 

	class LogsControlador extends Controlador
	{
		
	

		public function get(){

	
			$this->addLog(EVENTOS['ingreso_a'],'consulta de usuarios');
			

			$array = $this->logs->consultar();
			$contenido = [];

			for ($i=0; $i < count($array) ; $i++) { 
				
				$contenido[$i]['fecha'] = $array[$i]['fecha'] ;
				$contenido[$i]['nick'] = $array[$i]['nick'] ;
				$contenido[$i]['descripcion'] = $array[$i]['evento'] . $array[$i]['descripcion'] ;
			}
			
		

			$encabezado = array(

			array('texto' => 'Fecha y Hora' , 'filtro' => 'fecha y hora' ),
			array('texto' => 'Usuario' , 'filtro' => 'usuario' ),
			array('texto' => 'Descripcion' , 'filtro' => 'Descripcion' )
			
			);


			$datos = array(

				'titulo'     => "Logs del Sistema",
				'icono'      => 'search',
				'select'     => "select/selectUsuarios",
				'encabezado' => $encabezado,
				'contenido'  => $contenido
				

			);
			$this->vista("usuario",$datos);

		}

		
	}



	


 

	

	 
 ?>
