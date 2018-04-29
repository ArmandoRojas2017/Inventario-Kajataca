
/* Mensaje de Ayuda con tooltip */

var tooltip_empresas = () =>{

	$("#inputNombre").tooltip_focus({titulo: 'Escribe Aqui' , 'contenido' : 'Ingresa aqui el nombre de la empresa'  }  )

	$("#inputCedula").tooltip_focus({titulo: 'Escribe Aqui' , 'contenido' : 'Ingresa aqui el RIF de la empresa'  }  )

	$("#botonGuardar").tooltip({titulo: 'Click Aqui ' , contenido: 'Haz click aqui para registrar a la nueva empresa' });

	$("#botonSalir").tooltip({titulo: 'Click Aqui ' , contenido: 'Haz click aqui para regresar al tabla de empresas (Dexia i love you <3)' });
}





//-------------------------------------------------










/*Mensajes de Alerta en el sistema */

const errorAlCargarPorAjax = () => "Problemas Tecnicos... Por favor notificar al 04145235969"

const mensajeValidacionClickDerecho = () => "Accion de Click derecho denegada..."




//-------------------------------------------------


/* Mensaje de Ayuda del sistema */


const mensajesIndex = {

	tituloBoton: "¡¡¡Haz Click Aqui!!!",
	botonIngresar: ""
}



//---------------------------------