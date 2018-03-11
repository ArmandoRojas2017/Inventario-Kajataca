

create database Mi_Cerenis_Cabrera;

use Mi_Cerenis_Cabrera;

create table usuarios (

	id_usuarios int unsigned auto_increment,
	nombre varchar(100) not null unique,
	clave varchar(100),
	pregunta varchar(100),
	respuesta varchar(100),
	tipo_usuario int(2),
	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1), 
	
	primary key (id_usuarios)

);

insert into usuarios 
	(nombre,clave,pregunta,
		respuesta,tipo_usuario,fecha_c,
		fecha_m,status) values
	('ARMANDO2018', md5('12345678') , '¿Eres Chavizta?' ,
		'tu eres marico', 1 , now() , now() , 1  );

create table eventos (

	id_eventos int unsigned auto_increment,
	descripcion varchar(70) not null unique,
	status TINYINT(1), 
	
	primary key  (id_eventos)
		
); 

insert into eventos (descripcion,status)  
	values ('Ingresó al Sistema',1); 

insert into eventos (descripcion,status)  
	values ('Salio exitosamente del Sistema',1); 

insert into eventos (descripcion,status)  
	values ('Ingreso a ',1); 

insert into eventos (descripcion,status)  
	values ('Genero un nuevo  ',1); 

create table logs (

	fecha datetime,


	id_eventos int unsigned, 
	id_usuarios int unsigned, 

	descripcion varchar(100) not null unique,
	
	
	constraint pk3

		foreign key 

			( id_eventos ) references  eventos (id_eventos),
	
	constraint pk4

		foreign key 

			( id_usuarios ) references  usuarios (id_usuarios)
); 


create table categorias (

	id_categorias int unsigned auto_increment,
	descripcion varchar(45) not null unique,
	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1), 
	
	primary key (id_categorias)
); 

create table sub_categorias (

	id_sub_categorias int unsigned auto_increment,
	id_categorias int unsigned, 
	descripcion varchar(45) not null unique,
	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1), 

	primary key pk2 (id_sub_categorias),
	
	constraint pk

		foreign key 

			( id_categorias ) references  categorias (id_categorias)
); 


create table presentacion (

	id_presentacion int unsigned auto_increment,
	descripcion varchar(45) not null unique,
	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1), 

	primary key  (id_presentacion)
		
); 

create table distribuidora (

	id_presentacion int unsigned auto_increment,
	id_empresa int unsigned,
	descripcion varchar(45) not null unique,
	nombre varchar(100),
	telefono varchar(12),
	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1), 

	primary key  (id_presentacion)
		
); 


