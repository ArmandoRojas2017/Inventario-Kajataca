/*
	Consulta individual,
	Editar,
	Eliminar...

 */

$(document).ready(function() {
	
	var nombre = $("#inputNombre")
	var rif = $("#inputCedula")



	nombre.disabled(true)
	rif.disabled(true)


	// cerrar el modal activa los inputs y select

	$(".cerrar").click(function(){
		$("input").disabled(false)
		$("select").disabled(false)

	});




	
Menu(); //invocamos los scripts del menu 
usuarios_validaciones();

insertar_Hora_NombreDeUsuario("#mi_reloj" , "#nombre_usuario")


// eliminar Usuario 

$("#botonEliminar").click(()=>{

mensajeSiNo(
			{ 
				titulo: "¡Alerta!",
				contenido: "¿Estas seguro que desas Eliminar a Este Usuario?",
				titulo2: "¡Listo!",
				contenido2: "Eliminado"

			},
			() => {


						ajax(localStorage.ajax + 'eliminarEmpresa', (rsp) =>{


							if(rsp.trim() == 1){


								mensajeOk2({titulo : '¡Listo!' , contenido: `Eliminado...` }, 
									 () => {
										window.location.href = '?url=empresas'
										}
									)
							}
							else 
								mensajeNo({
									titulo : '¡No se puede eliminar!' , 
									contenido: `porque se ha utilizado esta empresa en otros registros, solo puede cambiar su estado` 
								})
							

						},{
							id: rif.val()
						})
						 
						
						
			}
		)


});


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


						ajax(localStorage.ajax + 'statusEmpresa', (rsp) =>{

					
							mensajeOk2({
								titulo   : 'Estado Cambiado' ,
							 	contenido: `El estado de la empresa ${nombre.val()} fue cambiado ` 
							 } ,  
							 	() => {window.location.href = '?url=empresas'} 
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
	localStorage.ajax + 'editarEmpresa', 
		(rsp) =>{
		
			if(rsp.trim() == 1){
				mensajeOk2({
					titulo : 'Nombre de Empresa Modificado' ,
				 contenido: 'El Nombre de la Empresa fue modificado exitosamente'
				},()=>{window.location.href = '?url=empresas'}  )
			
			}//if
			else {
			
				mensajeNo({
					titulo : 'No se puede Modificar el nombre' ,
				 contenido: 'El Nombre de la Empresa ya existe intente con otro'
				})
			}
		},
		{
			
			nombre : nombre.val(),
			id : rif.val(),
		
		}

		)
});







})