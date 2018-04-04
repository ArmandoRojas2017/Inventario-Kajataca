/*
	Consulta individual,
	Editar,
	Eliminar...

 */

$(document).ready(function() {
	
	let nombre = $("#inputNombre")
	let cedula = $("#inputCedula")
	let nick = $("#inputNick")
	let clave = $("#inputClave")
	let clave2 = $("#inputClave2")
	let pregunta = $("#inputPregunta")
	let respuesta1 = $("#inputRespuesta1")
	let respuesta2 = $("#inputRespuesta2")


	// funcion para controlar los inputs del formulaio
	
	let inputs = (estado) =>{
	// al abrir el modal desactiva los paneles 
	$("input").disabled(!estado)
	$("select").disabled(!estado)

	if(!estado){
		// esconde los inputs de respuesta
		respuesta1.addClass('invisible')
		respuesta2.addClass('invisible')
		clave.addClass('invisible')
		clave2.addClass('invisible')
		pregunta.addClass('invisible')
		$(".oculto").addClass('invisible')

	}else{

		respuesta1.removeClass('invisible')
		respuesta2.removeClass('invisible')
		clave.removeClass('invisible')
		clave2.removeClass('invisible')
		pregunta.removeClass('invisible')
		$(".oculto").removeClass('invisible')

	}
		

	

	}
	


	inputs(false)

	// cerrar el modal activa los inputs y select

	$(".cerrar").click(function(){
		$("input").disabled(false)
		$("select").disabled(false)

	});


//boton salir para volver al consultar
$("#botonSalir").ruta("usuario")

// asignar roles al select 
	ajax("ajax/Roles/select.php",function(resp){

		$("#rol").html(resp)
	},null)





	
Menu(); //invocamos los scripts del menu 
usuarios_validaciones();

insertar_Hora_NombreDeUsuario("#mi_reloj" , "#nombre_usuario")



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


						ajax("ajax/Usuarios/cambiar.php", (rsp) =>{

							reiniciarTabla()

							setTimeout( () => {

								$("body").html(rsp)
							} , 1300 )

						},{
							id: cedula.val()
						})
						 
						
						
			}
		)

});


// Modificar un usuario
$("#botonEditar").click(()=>{
	
	$(".cerrar").addClass('invisible')
	$("#botonEditar").addClass('invisible')
	$("#botonEstado").addClass('invisible')
	
	$("#botonGuardar").removeClass('invisible');
	$("#botonCancelar").removeClass('invisible');

	inputs(true)

})


// boton cancelar 

$("#botonCancelar").click( () => {


	$(".cerrar").removeClass('invisible');
	$("#botonEditar").removeClass('invisible')
	$("#botonEstado").removeClass('invisible')

	$("#botonGuardar").addClass('invisible')
	$("#botonCancelar").addClass('invisible')

	inputs(false)

})





// Reiniciar tabla 
	let reiniciarTabla = () =>{

		ajax("ajax/Usuarios/consultar.php",function(rsp){

							$("#search-example").html(rsp)
							}, { rol: 0 , status: 3 } 
						)
	}

})