/*
	Base de datos del Sistema de Inventario Kajataca,
	la base de datos se llama igual que mi novia <3

	by: Armando Rojas - 2018 

 */

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


create table configuracion (

	id_configuracion int unsigned auto_increment,
	descripcion varchar(100) not null,
	fecha datetime,
	
	primary key  (id_configuracion)
		
); 

insert configuracion (descripcion, fecha) values 
	( '137627911d58602826fd657b3caccb1e' , 20180311003744 );

insert configuracion (descripcion, fecha) values 
	( '137627911d58602826fd657b3caccb1e' , 20180311003744 );

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

	id_distribuidora int unsigned auto_increment,
	id_empresa int unsigned,
	descripcion varchar(45) not null unique,
	nombre varchar(100),
	telefono varchar(12),
	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1), 

	primary key  (id_distribuidora)
		
); 

create table productos(

	id_productos int unsigned auto_increment,
	
	id_sub_categorias int unsigned,
	id_distribuidora int unsigned,
	id_presentacion int unsigned,

	descripcion varchar(60) not null unique,
	stock_max int,
	stock_min int,
	cantidad int,

	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1), 

	primary key  (id_productos),


	constraint pk5

		foreign key 

			( id_sub_categorias ) references  sub_categorias (id_sub_categorias),

	constraint pk6

		foreign key 

			( id_distribuidora ) references  distribuidora (id_distribuidora),
	
	constraint pk7

		foreign key 

			( id_presentacion ) references  presentacion (id_presentacion)

); 


/*

	Tablas transacciopnales 
 */

create table despacho(
	
	id_despacho int unsigned auto_increment,
	id_productos int unsigned,
	cantidad int,
	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1),
	
	primary key  (id_despacho),

	constraint pk11

		foreign key 

			( id_productos ) references  productos (id_productos)

);

create table abastecimiento(
	
	id_abastecimiento int unsigned auto_increment,
	id_productos int unsigned,
	cantidad int,
	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1),
	
	primary key  (id_abastecimiento),

	constraint pk12

		foreign key 

			( id_productos ) references  productos (id_productos)

);


