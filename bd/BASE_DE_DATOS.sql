/*
	Base de datos del Sistema de Inventario Kajataca,
	la base de datos se llama igual que mi novia <3

	by: Armando Rojas - 2018 
 
	1 = TRUE 
	0 = FALSE 

 */

create database Cerenis;

use Cerenis;

create table modulos (

	id_modulos int unsigned auto_increment,
	descripcion varchar(100) not null unique,
	fecha_c datetime default now(),
	fecha_m datetime default now(),
	status TINYINT(1) default 1, 
	
	primary key (id_modulos)

);



create table sub_modulos (

	id_sub_modulos int unsigned auto_increment,
	id_modulos int unsigned,
	descripcion varchar(100) not null unique,
	fecha_c datetime default now(),
	fecha_m datetime default now(),
	status TINYINT(1) default 1, 
	primary key (id_sub_modulos),
	constraint pk49 foreign key ( id_modulos ) references  modulos (id_modulos)
);

/*

 ##############
	Modulos y sub modulos
############### 

*/
insert into modulos (descripcion) values ('usuarios');


/*modulo usuarios*/
insert into sub_modulos ( id_modulos , descripcion) values (1 , 'consultar');
insert into sub_modulos ( id_modulos , descripcion) values (1 , 'imprimir');
insert into sub_modulos ( id_modulos , descripcion) values (1 , 'registrar');
insert into sub_modulos ( id_modulos , descripcion) values (1 , 'modificar');
insert into sub_modulos ( id_modulos , descripcion) values (1 , 'desactivar');
insert into sub_modulos ( id_modulos , descripcion) values (1 , 'TODO');




create table roles (

	id_roles int unsigned auto_increment,
	descripcion varchar(100) not null unique,
	fecha_c datetime default now(),
	fecha_m datetime default now(),
	status TINYINT(1) default 1, 
	
	primary key (id_roles)

);

create table permisos(

	id_roles int unsigned,
	id_sub_modulos int unsigned,

	constraint pk50 foreign key  ( id_roles ) references  roles (id_roles),
	constraint pk51 foreign key ( id_sub_modulos ) references  sub_modulos (id_sub_modulos)

);



create table usuarios (

	id_usuarios int unsigned ,
	id_roles int unsigned,
	nick varchar(12) not null unique,
	nombre varchar(100) not null,
	clave varchar(100),
	pregunta varchar(100),
	respuesta varchar(100),
	
	fecha_c datetime default now(),
	fecha_m datetime default now(),
	status TINYINT(1) default 1, 
	
	primary key (id_usuarios),
	constraint pk44 foreign key ( id_roles ) references  roles (id_roles)

);



create table eventos (

	id_eventos int unsigned auto_increment,
	descripcion varchar(70) not null unique,
	status TINYINT(1) default 1, 
	
	primary key  (id_eventos)
		
); 


/*Volcando datos para eventos*/


create table configuracion (

	id_configuracion int unsigned auto_increment,
	descripcion varchar(100) not null,
	fecha datetime,
	
	primary key  (id_configuracion)
		
); 

insert configuracion (descripcion, fecha) values ( '137627911d58602826fd657b3caccb1e' , 20180311003744 );

insert configuracion (descripcion, fecha) values ( '137627911d58602826fd657b3caccb1e' , 20180311003744 );

create table logs (

	fecha datetime default now(),


	id_eventos int unsigned, 
	id_usuarios int unsigned, 

	descripcion varchar(100) not null unique,
	
	
	constraint pk3 foreign key ( id_eventos ) references  eventos (id_eventos),
	
	constraint pk4 foreign key ( id_usuarios ) references  usuarios (id_usuarios)
); 


create table categorias (

	id_categorias int unsigned auto_increment,
	descripcion varchar(45) not null unique,
	fecha_c datetime default now(),
	fecha_m datetime default now(),
	status TINYINT(1) default 1, 
	
	primary key (id_categorias)
); 



create table sub_categorias (

	id_sub_categorias int unsigned auto_increment,
	id_categorias int unsigned, 
	descripcion varchar(45) not null unique,
	fecha_c datetime default now(),
	fecha_m datetime default now(),
	status TINYINT(1) default 1, 

	primary key pk2 (id_sub_categorias),
	
	constraint pk foreign key ( id_categorias ) references  categorias (id_categorias)
); 




create table presentacion (

	id_presentacion int unsigned auto_increment,
	descripcion varchar(45) not null unique,
	fecha_c datetime default now(),
	fecha_m datetime default now(),
	status TINYINT(1) default 1, 

	primary key  (id_presentacion)
		
); 


create table empresas (
	
	id_empresas int unsigned auto_increment,
	descripcion varchar(45) not null unique,
	fecha_c datetime default now(),
	fecha_m datetime default now(),
	status TINYINT(1) default 1, 

	primary key  (id_empresas)
);

insert into empresas (descripcion) values ("La Polar");

create table distribuidora (

	id_distribuidora int unsigned auto_increment,
	id_empresas int unsigned,
	descripcion varchar(45) not null unique,
	nombre varchar(100),
	telefono varchar(12)  not null unique,
	fecha_c datetime default now(),
	fecha_m datetime default now(),
	status TINYINT(1) default 1, 

	primary key  (id_distribuidora),
	constraint pk323 foreign key ( id_empresas ) references  empresas (id_empresas)
		
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

	fecha_c datetime default now(),
	fecha_m datetime default now(),
	status TINYINT(1) default 1, 

	primary key  (id_productos),


	constraint pk5 foreign key ( id_sub_categorias ) references  sub_categorias (id_sub_categorias),
	constraint pk6 foreign key ( id_distribuidora ) references  distribuidora (id_distribuidora),
	constraint pk7 foreign key ( id_presentacion ) references  presentacion (id_presentacion)

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
	constraint pk11 foreign key ( id_productos ) references  productos (id_productos)

);

create table abastecimiento(
	
	id_abastecimiento int unsigned auto_increment,
	id_productos int unsigned,
	cantidad int,
	fecha_c datetime,
	fecha_m datetime,
	status TINYINT(1),
	
	primary key  (id_abastecimiento),
	constraint pk12 foreign key ( id_productos ) references  productos (id_productos)

);

/*
##############################

 Volcado de Datos   
#############################
 */

/*Tipos de usuario*/
insert into roles (descripcion) values ("Root");
insert into roles (descripcion) values ("Administrador");


/*Usuarios*/

insert into usuarios (id_usuarios, nick , nombre,clave,pregunta,respuesta, id_roles) values (26059573, 'ARMANDO2018',"ARMANDOROJAS", md5('12345678') , '¿Eres Chavizta?' ,	'TU ERES MARICO', 1 );
insert into usuarios (id_usuarios, nick , nombre,clave,pregunta, respuesta, id_roles) values (2,'CAPERUCITA',"NELSIBETH DE MADURO", md5('12345678') , '¿Eres Chavizta?' ,'TU ERES MARICO', 2 );
insert into usuarios (id_usuarios, nick , nombre,clave,pregunta, respuesta, id_roles) values (3,'CRISTIANK',"CRISTIAN HEREDIA", md5('12345678') , '¿Eres Chavizta?' ,'TU ERES MARICO', 2 );
insert into usuarios (id_usuarios, nick , nombre,clave,pregunta, respuesta, id_roles) values (4,'PANDITA',"CERENIS CABRERA", md5('12345') , '¿Eres Chavizta?' , 'TU ERES MARICO', 2 );
insert into usuarios (id_usuarios, nick , nombre,clave,pregunta,	respuesta, id_roles) values (5,'PELUCA',"VILMARYS CASTILLO", md5('12345678') , '¿Eres Chavizta?' ,'TU ERES MARICO', 2 );






/* Eventos*/


insert into eventos (descripcion)  values ('Ingresó al Sistema'); 
insert into eventos (descripcion)  values ('Salio exitosamente del Sistema'); 
insert into eventos (descripcion)  values ('Ingreso a '); 
insert into eventos (descripcion)  values ('Genero un nuevo  '); 
insert into eventos (descripcion)  values ('Genero una nuevo  '); 
insert into eventos (descripcion)  values ('Modificando un '); 
insert into eventos (descripcion)  values ('Modificando una '); 
insert into eventos (descripcion)  values ('Desactivando un '); 
insert into eventos (descripcion)  values ('Desactivando una '); 
insert into eventos (descripcion)  values ('Abastecio ');
insert into eventos (descripcion)  values ('Despacho ');


/*Categoria*/

insert into categorias (descripcion) values ("Bebidas Alcoholicas");
insert into categorias (descripcion) values ("Otro tipo de Bebidas" );

/*Sub categorias*/

	/*Categoria 1 -- Bebidas alcoholica... */

insert into sub_categorias (id_categorias,descripcion)	values (1,'Cerveza');
insert into sub_categorias (id_categorias,descripcion)	values (1,'Cucuy de Penca');

	/*otro tipo de Bebidas */

insert into sub_categorias (id_categorias,descripcion)	values (2,'Malta');
insert into sub_categorias (id_categorias,descripcion)	values (2,'Jugo');

/*Presentacion*/

insert into presentacion (descripcion) values ('Caja de 32 unidades'); 
insert into presentacion (descripcion) values ('Caja de 28 unidades'); 
insert into presentacion (descripcion) values ('Litros '); 
insert into presentacion (descripcion) values ('Mililitros '); 


/*Empresas*/

insert into empresas (descripcion) values ("La Polar");
insert into empresas (descripcion) values ("La Regional");
insert into empresas (descripcion) values ("UnicornioLandia en Revolucion");


/*Distribuidora  */

insert distribuidora (id_empresas , descripcion , nombre , telefono ) values (1, 'Doña Oliva Serrada','Nelsibeth Oliva','04145235969'); 
insert distribuidora (id_empresas , descripcion , nombre , telefono ) values (2, 'Mafia Cabrera','Cerenis Cabrera','04245452248'); 


/*
	Rol => administrador , id => 2
	Permiso => 1..5 Usuarios = acceso denegado
 */
insert permisos values(2,1);
insert permisos values(2,2);
insert permisos values(2,3);
insert permisos values(2,4);	
insert permisos values(2,5);
insert permisos values(2,6);


drop database Cerenis;