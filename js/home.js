$(document).ready(function() {
	
Menu(); //invocamos los scripts del menu 

	setInterval(function(){

		$("#mi_reloj").html(miTiempo.hora_local())

	}, 1000);	


	/*-------------- Nombre de Usuario ------------------*/

	setTimeout( () => $("#nombre_usuario").html(localStorage.nombre)  ,0500)

		
	//--------------------------------

	
	/*Reproducto de Audio*/

	ajax("config/Canciones.json",

		function(json){

			let indice = numeroAleatorio()

		 		$("#tituloPista").html(json[indice].titulo)  
		 		$("#pista").html('<audio  src="'+json[indice].url+'" autoplay controls></audio>')  
		}
		,null)

	//-----------------




});



