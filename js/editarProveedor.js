/*
	Consulta individual,
	Editar,
	Eliminar...

 */

$(document).ready(function() {
	
	var nombre = $("#distribuidora")
	var rif = $("#rif")

	let eliminar = {

	url       : 'eliminarDistribuidora',
	direct    : 'distribuidora',
	variables :  {id: rif.val()}
}


		$("input").disabled(true)
		$("select").disabled(true)

	// cerrar el modal activa los inputs y select

	$(".cerrar").click(function(){
		$("input").disabled(false)
		$("select").disabled(false)

	});




	
Menu(); //invocamos los scripts del menu 
usuarios_validaciones();




// eliminar Usuario 
boton_eliminar(eliminar)

// Editar estado de un Usuario

$("#botonEstado").click(() => {


	mensajeSiNo(
			{ 
				titulo: "¡Alerta!",
				contenido: "¿Estas seguro que desas Cambiar su estado actual?",
				titulo2: "¡Listo!",
				contenido2: "Estado actual modificado"

			},
			() => {


						ajax(localStorage.ajax + 'statusDistribuidora', (rsp) =>{

					
							mensajeOk2({
								titulo   : 'Estado Cambiado' ,
							 	contenido: `El estado de la distribuidora ${nombre.val()} fue cambiado ` 
							 } ,  
							 	() => {window.location.href = '?url=distribuidora'} 
							)
							
						}, {id: rif.val()} )// fin de ajax
						 
						
						
			}
		)

});


// Modificar un usuario
$("#botonEditar").click(()=>{
	
	$(".cerrar").addClass('invisible')
	$("#botonEditar").addClass('invisible')
	$("#botonEstado").addClass('invisible')
	$("#botonEliminar").addClass('invisible')
	
	$("#botonGuardar").removeClass('invisible');
	$("#botonCancelar").removeClass('invisible');

	nombre.disabled(false)
	rif.disabled(true)

})


// boton cancelar 

$("#botonCancelar").click( () => {


	$(".cerrar").removeClass('invisible');
	$("#botonEditar").removeClass('invisible')
	$("#botonEstado").removeClass('invisible')
	$("#botonEliminar").removeClass('invisible')

	$("#botonGuardar").addClass('invisible')
	$("#botonCancelar").addClass('invisible')

	nombre.disabled(true)

})

$("#botonGuardar").click( ()=> {


	ajax(
	localStorage.ajax + 'editarDistribuidora', 
		(rsp) =>{
		
			if(rsp.trim() == 1){
				mensajeOk2({
					titulo : 'Nombre de Empresa Modificado' ,
				 contenido: 'El Nombre de la Empresa fue modificado exitosamente'
				},()=>{window.location.href = '?url=distribuidora'}  )
			
			}//if
			else {
			
				mensajeNo({
					titulo : 'No se puede Modificar el nombre' ,
				 contenido: 'El Nombre de la Empresa ya existe intente con otro'
				})
			}
		},
		{
			
			distribuidora: nombre.val(),
			id : rif.val(),
		
		}

		)
});







})