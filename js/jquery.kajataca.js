 /*
	Plugin el funcionamiento Visual del Software
	El cual integra cada vendor de manera practica y limpia 

	El cual maneja validaciones, mensajes notify, sweet2...

	Uso del tooltip de manera practica 

	Author = Armando Rojas - UNEFA 2017 

*/



/*Utilizacion de Modal con SweetAlert2*/
function modalImagen(texto){
			swal({
					  title: texto, timer: 5000,
					  html: $('<div>').addClass('some-class').text('by: Armando Rojas.'),
					  animation: true, customClass: 'animated tada',
					  imageUrl: 'images/logo.gif',
					  imageWidth: 300, imageHeight: 200,

			});
		}
//------------------------------------------


/*Utilizacion de Alert con notify */
	// { mensaje, tipo }
	function mensajeNotify(arreglo){
		
		let tiempo = null;
		
		if (!arreglo['mensaje']) arreglo['mensaje'] = 'NULL';

		if (!arreglo['tipo']) arreglo['tipo'] = 'success';

		switch(arreglo['tipo']){

			case 'warning': tiempo = 0.1;   break;
			default: tiempo = 500; break;
		}

		$.notify(
			{
			  icon: 'glyphicon glyphicon-remove',
			  message: "<strong >"+arreglo['mensaje']+"</strong>"
			},{
				type: arreglo['tipo'], delay: tiempo,
				placement: { from: "top",align: "center"},
				showProgressbar: false,
				allow_duplicates: false,
				animate: {
					enter: 'animated swing', exit: 'animated zoomOut'
				},
			}
		);
	}

function mensajeSiNo( arreglo , funcion ){

swal({
  title: arreglo['titulo'],
  text: arreglo['contenido'],
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No'
}).then((result) => {
  if (result.value) {
    swal(
      arreglo['titulo2'],
      arreglo['contenido2'],
      'success'
    );

    
    funcion();
  
  }

});

}
//------------------------------------------

/*
	Se requiere bootstrap
	Bootstrap 4 
	y notify.bootstrap.js
*/


//valida email
function verificacorreo(objecto){
		// Expresion regular para validar el correo
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

		    	// Se utiliza la funcion test() nativa de JavaScript
			    if (regex.test(objecto.val().trim())) {
			        return true;//Correo valido
			    }
			    else {
			       	return false;//Invalido
			    }
}

// solo letras 
function soloLetras(objecto){

$(function(){
                  objecto.validCampo('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ');
  	});
 

}
// valida ncik
function soloNick(objecto){

$(function(){
                   objecto.validCampo('abcdefghijklmnopqrstuvwxyz-_.1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ');


  	});
}





(function($){

	$.fn.extend({

		/*Manipulacion de elementos Basicos */

		// efecto de sombra 
			sombra : function(color){
				return this.each(function(){

					if(!color) $(this).css("box-shadow",".1em .1em 1em white"); 
					$(this).css("box-shadow",".1em .1em 1em "+color);

				});
			},

		// desabilitar botones 
			disabled : function(valor){

				return this.each(function(){

					$(this).prop('disabled', valor );
				});
			}, 
		// ocultar y mostrar elementos 

			visibilidad : function(val){

				return this.each(function(){
					
					if(val) $(this).css('display', 'block');
					else $(this).css('display', 'none');

				});
			},
		//----------------------------

		/*Animacion simplificada de WoW.js y Animate.css*/

		// animar un elemento, requiere de wow Js 

			animar: function(tipo){
				return this.each(function(){

					$(this).addClass('WOW '+tipo);
			 		new WOW().init()


				})
			},

		// animar un boton 
			animarBoton : function(){

				return this.each(function(){
					$(this).mouseover(function(){$(this).animar('shake')});

					$(this).mouseleave(function(){$(this).removeClass('WOW shake')});
				});

			},



		//----------------------------



		/*Validacion de Formularios*/
		
		// no permite copiar y pegar en la caja de texto
		noCopiar: function(){

			return this.each(function(){
				$(this).bind("cut copy paste", function(e){
				e.preventDefault();
				return false;
				});
			});
		},

		// transformar letras a mayuscula 
		mayuscula: function(){

			return this.each(function() {
				$(this).keyup(function(event) {
   					$(this).val($(this).val().toUpperCase());
  				 });
			});
		},

		// validar entrada por teclado
		validCampo: function(b){
			$(this).on(
				{
					keypress:function(a){
					var c=a.which,
					d=a.keyCode,
					e=String.fromCharCode(c).toLowerCase(),
					f=b;
					(-1!=f.indexOf(e)||9==d||37!=c&&37==d||39==d&&39!=c||8==d||46==d&&46!=c)&&161!=c||a.preventDefault();
					
					}
			});
		},

		// validar maximo de cadena 
		
		longitudMax: function(value){

			this.each(function(){
  
				$(this).attr('maxlength', value.toString() );
			});
		},

	

		
		//---------------------------------

		/*Validacion con mensajes notify.js */

		// longitud del campo requiere de notify.js 
		longitud: function(boton , arreglo ){

					return this.each(function(){
						$(this).keydown(function() {
				
								if (  $(this).val().length < arreglo['min']){

									var texto = 'Debe ser mayor a '+arreglo['min']+' caracteres ';
									mensajeNotify({mensaje:texto, tipo:'danger'});

									$(this).sombra('red');
									boton.disabled(true);

								}else if( $(this).val().length > (arreglo['max']-2) ) {
								
									var texto = 'Debe ser menor a '+arreglo['max']+' caracteres ';
									mensajeNotify({mensaje:texto, tipo:'danger'});

									$(this).sombra('red');	
									boton.disabled(true);

								}else{
										mensajeNotify({mensaje:'Campo Listo '});
										$(this).sombra('green'); 
										boton.disabled(false);	
								}// ELSE

						});							
					});				
				},
		//----------------------------

		/* Tooltip con JQuery.flyout.js */

			tooltip : function(arreglo){
				
				return this.each(function(){

					$(this).flyout({
					    title: arreglo['titulo'],
					    content: arreglo['contenido'],
					    html: true,
					    trigger: 'manual'
					  }).mouseover(function() {
					    $(this).flyout('show');
					  }).mouseout(function() {
					    $(this).flyout('hide');
					  });

				});
			},

			ruta: function(url){

				return this.each(function(){

					$(this).click(function() {
						
						window.location.href = '?url='+url; 

					});
				});
			},
		//---------------------------------

		/*Prueba de alerta  */

		//prueba del objecto 

		alerta: function(){
			alert("Te Amo Cerenis Paola <3"); 
		}

		//------------------------------------


	});
})(jQuery);


/*	Libreria para Mostrar Hora y Fecha */

const miTiempo = {

	hora_local : function(){

		var data = new Date(); // obtener la hora y fecha del sistema
		var hora = data.getHours(); // obtener hora
		var minutos = data.getMinutes(); // obtener minutos 
		var segundos = data.getSeconds(); 

		var regimen = "am"; 
		
		/* Agregar un 0 al izquiera si es necesario*/
		if(hora < 10) hora = "0"+hora.toString();
		if(minutos < 10) minutos = "0"+minutos.toString();
		if(segundos < 10) segundos = "0"+segundos.toString();

		/*Cambiar Regimen y establecer formato 12h*/
		if(hora > 12) {
			regimen = "pm"; 
			hora -= 12; 
		}

			/*Devuelve Formato*/
		return hora+":"+minutos+":"+segundos+regimen;
	}
};

/*
	Expresiones Regulares 
 */

function soloLetras_Numeros(){

	return "{1234567890ABCDEFGHIJKMNLOPQRSTUVWXYZÑabcdefghijklmnopqrstuvwxyzñ}"
}

function soloNumeros(){

	return "{1234567890}"
}

function soloClaves(){

	return "{1234567890ABCDEFGHIJKMNLOPQRSTUVWXYZÑabcdefghijklmnopqrstuvwxyzñ.$_-@}"
}




 	
 
