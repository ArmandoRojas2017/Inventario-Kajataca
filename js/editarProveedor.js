/*
	Consulta individual,
	Editar,
	Eliminar...

 */

$(document).ready(function() {
	
	let objecto = {
		id         : {id: $("#rif").val()} ,
		principal  : 'distribuidora',
		secundario : 'Distribuidora',
		v :{ 

			id              : $("#rif").val(),
			distribuidora   : $("#distribuidora").val(),
			empresa         : $("#empresa").val(),
			telefono        : $("#telefono").val(),
			nombre          : $("#nombre").val(),
			
		},
		sms : 'Incorrecto!'

	}


	editar_modal(objecto , proveedor_validaciones() ) 







})