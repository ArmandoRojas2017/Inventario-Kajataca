$(document).ready(function() {



//boton salir para volver al consultar
$("#botonSalir").ruta("empresas")

$("h6").visibilidad(false) // ocultar estatus 

	
Menu(); //invocamos los scripts del menu 
proveedor_validaciones(); //invocamos los scripts del menu 
tooltip_proveedor();

insertar_Hora_NombreDeUsuario("#mi_reloj" , "#nombre_usuario")

let nombre = $("#inputNombre")
let cedula = $("#inputCedula")



/*Mensaje en pantalla*/
//modalImagen("Todos los campos del formulario son obligatorios")




$("#botonGuardar").click(() => {

	ajax( localStorage.ajax+'nuevaEmpresa' , function(resp){

		if(resp.trim() == 1){

			mensajeOk2(
				{
					titulo:'Empresa Registrada' , 
					contenido: 'La empresa fue registrada Correctamente'
				} , () => {  window.location.href = '?url=empresas'  } )
		}else{

			mensajeNo({titulo:'Empresa No Registrada' , contenido: 'El Rif o El nombre ya ha sido usado, por favor verifique los datos o consulte en la tabla de empresas'} )
		}
	
	}, { 

		id        : cedula.val(),
		nombre    : nombre.val(),
		
	})

});



});
