/*
	Consulta individual,
	Editar,
	Eliminar...

 */

$(document).ready(function() {

	// asignar roles al select 
	ajax("?url=selectEmpresa",function(resp){

		$("#empresa").html(resp)
	},null)
	
	setTimeout( ()=>{

	let objecto = {
		id         : $("#rif") ,
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



	$("#empresa option[value="+localStorage.auxiliar+"]").attr("selected",true)



	}



		,
	 500)






})