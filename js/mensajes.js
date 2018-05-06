
/* Mensaje de Ayuda con tooltip */


var tooltip_login = () =>{

	$("input[name=usuario]").tooltip_focus({titulo:"¡¡¡Escribe Aqui!!!", contenido:"Ingresa tu nombre de Usuario"})

	$("input[name=clave]").tooltip_focus({titulo:"¡¡¡Escribe Aqui!!!", contenido:"Ingresa tu clave super secreta"})
	/* ------------- Mensajes tooltip de ayuda -------------------- */



$("#ingresar").tooltip({
				titulo:"¡¡¡Click Aqui!!!" ,
				contenido: "Si haces click aqui verificara tu usuario y clave, si son correctos ingresaras al sistema" 
			})

$("#cambiar").tooltip({
				titulo:"¡¡¡Click Aqui!!!"  ,
				contenido: "¿Haz olvidado tu clave? no te preocupes, haz click aqui para ingresar al sistema de recuperacion de claves" 
			})


$("#botonUsuario i").tooltip({
				titulo:"¡¡¡Click Aqui!!!"  ,
				contenido: "Click aqui para mostrar u ocultar el nombre de usuario" 
			})

$("#botonClave i").tooltip({
				titulo:"¡¡¡Click Aqui!!!"  ,
				contenido: "Click aqui para mostrar u ocultar la clave de usuario" 
			})

// -------------------------------------------------------------






}


// -------------------------------------------------------------





var tooltip_empresas = () =>{

	$("#inputNombre").tooltip_focus({titulo: 'Escribe Aqui' , 'contenido' : 'Ingresa aqui el nombre de la empresa'  }  )

	$("#inputCedula").tooltip_focus({titulo: 'Escribe Aqui' , 'contenido' : 'Ingresa aqui el RIF de la empresa'  }  )

	$("#botonGuardar").tooltip({titulo: 'Click Aqui ' , contenido: 'Haz click aqui para registrar a la nueva empresa' });

	$("#botonSalir").tooltip({titulo: 'Click Aqui ' , contenido: 'Haz click aqui para regresar al tabla de empresas (Dexia i love you <3)' });
}


var tooltip_proveedor = () =>{

	$("#inputNombre").tooltip_focus({titulo: 'Escribe Aqui' , 'contenido' : 'Ingresa aqui el nombre de la empresa'  }  )

	$("#inputCedula").tooltip_focus({titulo: 'Escribe Aqui' , 'contenido' : 'Ingresa aqui el RIF de la empresa'  }  )

	$("#botonGuardar").tooltip({titulo: 'Click Aqui ' , contenido: 'Haz click aqui para registrar a la nueva distribuidora' });

	$("#botonSalir").tooltip({titulo: 'Click Aqui ' , contenido: 'Haz click aqui para regresar al tabla de consultas de distribuidora' });
}

var tooltip_usuario = () =>{

	$("#inputClave").tooltip_focus({titulo: 'Clave Segura' ,
		 contenido: 'Para que tu clave sea segura debe tener por lo menos 1 letra y un digito'}
		 );
	


	$("#inputNombre").tooltip_focus({titulo: 'Escribe Aqui' , 'contenido' : 'Ingresa aqui el nombre y apellido del nuevo usuario'  }  )

	$("#inputCedula").tooltip_focus({titulo: 'Escribe Aqui' , 'contenido' : 'Ingresa aqui el numero de cedula del nuevo usuario'  }  )

	$("#botonGuardar").tooltip({titulo: 'Click Aqui ' , contenido: 'Haz click aqui para registrar al nuevo usuario' });

	$("#botonSalir").tooltip({titulo: 'Click Aqui ' , contenido: 'Haz click aqui para regresar al tabla de consultas de usuarios' });
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