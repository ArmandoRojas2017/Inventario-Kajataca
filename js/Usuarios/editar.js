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

	// al abrir el modal desactiva los paneles 
	$("input").disabled(true)
	$("select").disabled(true)
	// esconde los inputs de respuesta
	respuesta1.css('display', 'none');
	respuesta2.css('display', 'none');
	clave.css('display', 'none');
	clave2.css('display', 'none');
	pregunta.css('display', 'none');
	

	$(".oculto").css('display', 'none');
	

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



$("#botonGuardar").click(() => {

	ajax("ajax/Usuarios/registrar.php", function(resp){
		alert(resp)
	}, { 

		id : cedula.val(),
		nombre : nombre.val(),
		nick : nick.val(),
		clave: clave.val(),
		pregunta: pregunta.val(),
		respuesta : respuesta1.val()
	})

});



$("#botonEstado").click(() => {


	alert()

});



})