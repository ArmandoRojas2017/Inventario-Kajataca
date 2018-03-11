create database Mi_Cerenis_Cabrera

create table usuarios (

	id int(10) NOT NULL AUTO_INCREMENT ,
	nombre varchar(100),
	clave varchar(100),
	pregunta varchar(100),
	respuesta varchar(100),
	tipo_usuario int(2),
	status TINYINT(1), 

	primary key ('id')

); 