$(document).ready(function() {
	
Menu(); //invocamos los scripts del menu 

	setInterval(function(){

		$("#mi_reloj").html(miTiempo.hora_local())

	}, 1000);	


	/*-------------- Nombre de Usuario ------------------*/

		$("#nombre_usuario").html(localStorage.nombre)
	//--------------------------------

	

});



