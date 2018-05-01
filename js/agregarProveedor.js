$(document).ready(function() {



//boton salir para volver al consultar
$("#botonSalir").ruta("distribuidora")

$("h6").visibilidad(false) // ocultar estatus 

	
Menu(); //invocamos los scripts del menu 
proveedor_validaciones(); //invocamos los scripts del menu 
tooltip_proveedor();

insertar_Hora_NombreDeUsuario("#mi_reloj" , "#nombre_usuario")





/*Mensaje en pantalla*/
modalImagen("Todos los campos del formulario son obligatorios")




$("#botonGuardar").click(() => {

	ajax( localStorage.ajax+'nuevaDistribuidora' , function(resp){

		if(resp.trim() == 1){

			mensajeOk2(
				{
					titulo:'Distribuidora Registrada' , 
					contenido: 'La distribuidora fue registrada Correctamente'
				} , () => {  window.location.href = '?url=distribuidora'  } )
		}else{


			mensajeNo({
				titulo:'Distribuidora No Registrada' , 
				contenido: 'El Rif , El nombre o el telefono ya ha sido usado, por favor verifique los datos o consulte en la tabla de distribuidoras'} 
				)
		}
	
	}, { 

		id              : $("#rif").val(),
		distribuidora   : $("#distribuidora").val(),
		empresa         : $("#empresa").val(),
		telefono        : $("#telefono").val(),
		nombre          : $("#nombre").val(),
		
	})

});



});
