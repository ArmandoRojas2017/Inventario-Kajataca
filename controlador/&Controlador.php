<?php 
	

	


	abstract class Controlador 
	{
		
		protected $menu;
		protected $modelo;
		protected $logs;
		protected $reportes; 


		function __construct($modelo=null)
		{	

			$array = glob(RUTAS['model']."*.php");
			
			foreach (  $array as $file  ) { 
		
				require $file;
			
			}

			$this->menu = new Menu(); 
			$this->logs = new Logs(); 
			$this->reportes = new ReportesFPDF();


			if($modelo != null)
				$this->modelo = new $modelo(); 

		}
		// agregar registros del sistema 
		public function addLog($evento , $descrip = "" ){

			$datos = array( 
				"id"        => $_SESSION['id'] ,  
				"evento"    => $evento ,
				"descrip"   => $descrip
 				);

			$this->logs->add($datos);
			
		}


		// funcion para agregar al compact,
		// el cual es utilizado para pasar variables a la vista 
		public function addToCompact($datos=array()){
		
		// Opciones del Menu para La Vista 
			$opciones = $this->menu->getOpciones();
		

			$x = array('opciones');

			if (count($datos) > 0 ){

				extract($datos);


				foreach ($datos as $key => $value) {
					
					array_push($x, $key);
				}

			}   
				

			return compact($x);

		}// fin de la funcion

		public function vista($view, $datos=array()){

			view($view, $this->addToCompact($datos) );
		}


		public function getMethod($method){
			//controller name
			$controller = $this->controller; 

			// create the object 
			$object = new $controller();

			//call method






			return $object->$method();
		}

		// verificar Acceso

		public function acceso($modulo){


			$permisos = new Permisos(); 

			if ($permisos->validaPantalla($modulo) == 1 )
				view("505");

		}


		public function getReporte($titulo , $data ){

			$this->reportes->SetFont('Arial','',14);
			$this->reportes->AddPage();
			$this->reportes->Estado($data,$titulo);
			$this->reportes->Output();


		}



	}


 ?>