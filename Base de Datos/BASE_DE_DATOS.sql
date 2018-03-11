create database Mi_Cerenis_Cabrera;

use Mi_Cerenis_Cabrera;

create table usuarios (

	id int unsigned auto_increment,
	nombre varchar(100) not null unique,
	clave varchar(100),
	pregunta varchar(100),
	respuesta varchar(100),
	tipo_usuario int(2),
	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1), 
	
	primary key (id)

); 