
/*****************************************/
/*Drops previos en caso de existir tablas*/
/*****************************************/
DROP TABLE IF EXISTS Aeropuerto;
DROP TABLE IF EXISTS Aerolinea;
DROP TABLE IF EXISTS Vuelo;
DROP TABLE IF EXISTS Auditoria;
DROP TABLE IF EXISTS Paquete;
DROP TABLE IF EXISTS Auto;
DROP TABLE IF EXISTS Transaccion;
DROP TABLE IF EXISTS Usuario;
DROP TABLE IF EXISTS Actividad;
DROP TABLE IF EXISTS Traslado;
DROP TABLE IF EXISTS Hotel;
DROP TABLE IF EXISTS Habitacion;
DROP TABLE IF EXISTS Realiza_accion;
DROP TABLE IF EXISTS Compra_pasaje;
DROP TABLE IF EXISTS Vuelo_paquete;
DROP TABLE IF EXISTS Auto_paquete;
DROP TABLE IF EXISTS Arrienda_auto;
DROP TABLE IF EXISTS Reserva_paqueteVH;
DROP TABLE IF EXISTS Reserva_actividad;
DROP TABLE IF EXISTS Hotel_paquete;
DROP TABLE IF EXISTS Reserva_habitacion;
DROP TABLE IF EXISTS Arrienda_traslado;
DROP TABLE IF EXISTS Contiene_Hab;
/*	Creacion de tablas con sus atributos */
CREATE TABLE Aeropuerto(
	cod_aeropuerto varchar(32) NOT NULL,
    pais varchar(255) NOT NULL,
    ciudad varchar(255) NOT NULL,
    longitud double NOT NULL,
    latitud double NOT NULL,
    PRIMARY KEY (cod_aeropuerto)
);
CREATE TABLE Aerolinea(
	ID_aerolinea INTEGER PRIMARY KEY,
    nombre_aerolinea varchar(255) NOT NULL,
    valoracion_aerolinea double default 1
);

/* DUDA CON ID_aerolinea, es parte de la PK o es foranea?*/
CREATE TABLE Vuelo(
	ID_vuelo INTEGER PRIMARY KEY,
	ID_aerolinea int NOT NULL,
	nombre_avion varchar(255),
	aeropuerto_origen varchar(255) NOT NULL,
	aeropuerto_destino varchar(255) NOT NULL,
	partida_vuelo date NOT NULL,
	llegada_vuelo date NOT NULL,
	formato_vuelo varchar(255),
	cap_turista int, 
	cap_ejecutivo int,
	cap_primera_clase int,
	cap_equipaje int,
	maletas_por_persona int,
	descuento int default 0,
	precio_normal int/*,
	PRIMARY KEY(ID_vuelo,ID_aerolinea)*/
);
CREATE TABLE Auditoria(
	ID_log INTEGER PRIMARY KEY,
	nombre_tabla varchar(255) NOT NULL,
	nombre_usuario varchar(255) NOT NULL,
	llave int not NULL,
	atributo varchar(255) NOT NULL,
	tipo_dato varchar(255) NOT NULL,
	valor_antiguo varchar(255) NOT NULL,
	valor_nuevo varchar(255) NOT NULL,
	descripcion_accion varchar(255) NOT NULL,
	fecha_realizado date NOT NULL
);
CREATE TABLE Paquete(
	ID_paquete INTEGER PRIMARY KEY,
	descripcion varchar(2048),
	descuento int default 0,
	precio_normal int NOT NULL
);
CREATE TABLE Auto(
	ID_auto INTEGER PRIMARY KEY,
	patente varchar(255) NOT NULL,
	compania varchar(255),
	tipo_auto varchar(255),
	modelo_auto varchar(255),
	pais varchar(255) NOT NULL,
	ciudad varchar(255) NOT NULL,
	calle varchar(510),
	capacidad int,
	precio_por_dia int NOT NULL,
	descripcion_auto varchar(2048),
	detalles_auto varchar(2048),
	descuento int default 0
);
/*usuario foranea o parte de pk?*/
CREATE TABLE Transaccion(
	ID_transaccion INTEGER PRIMARY KEY,
	ID_usuario int NOT NULL,
	descripcion varchar(1024),
	monto int NOT NULL,
	ya_cancelado boolean NOT NULL,
	numero_cuenta_compra int/*,
	PRIMARY KEY(ID_transaccion,ID_usuario)*/
);
CREATE TABLE Usuario(
	ID_usuario INTEGER PRIMARY KEY,
	tipo_usuario varchar(255) NOT NULL default 'normal',
	nombre_usuario varchar(255) NOT NULL UNIQUE,
	contrasena varchar(255) NOT NULL,
	correo varchar(255) NOT NULL UNIQUE,
	cuenta_bancaria int,
	banco_origen varchar(255),
	fondos_disponibles bigint
);
CREATE TABLE Actividad(
	ID_actividad INTEGER PRIMARY KEY,
	nombre_actividad varchar(255),
	descripcion_actividad varchar(2048),
	fecha_inicio date NOT NULL,
	fecha_fin date,
	pais varchar(255) NOT NULL,
	ciudad varchar(255) NOT NULL,
	calle varchar(255),
	valor_entrada int NOT NULL,
	cupos int,
	descuento int default 0,
	precio_normal int
);
CREATE TABLE Traslado(
	ID_traslado INTEGER PRIMARY KEY,
	tipo_vehiculo varchar(255),
	patente varchar(255) NOT NULL,
	pais varchar(255),
	ciudad varchar(255),
	inicio_servicio date,
	fin_servicio date,
	numero_pasajeros int,
	tarifa_por_kilometro int,
	descuento int default 0
);
CREATE TABLE Hotel(
	ID_hotel INTEGER PRIMARY KEY,
	nombre_hotel varchar(255) NOT NULL,
	pais varchar(255) NOT NULL,
	ciudad varchar(255) NOT NULL,
	valoracion double default 1,
	latitud double,
	longitud double,
	habitaciones_disponibles int
);
CREATE TABLE Habitacion(
	ID_habitacion INTEGER PRIMARY KEY,
	clase_habitacion varchar(255),
	valoracion_habitacion double default 1 ,
	capacidad int,
	precio_por_noche int NOT NULL,
	detalles_habitacion varchar(2048),
	descuento int default 0,
	precio_normal int
);
CREATE TABLE Realiza_accion(
	ID_usuario int NOT NULL,
	ID_log int NOT NULL,
	PRIMARY KEY(ID_usuario,ID_log)
);
CREATE TABLE Compra_pasaje(
	ID_usuario int NOT NULL,
	ID_vuelo int NOT NULL,
	fecha_compra date,
	numero_asiento int,
	PRIMARY KEY(ID_usuario,ID_vuelo)
);
CREATE TABLE Auto_paquete(
	/*Como referencio este ID? si no lleva a niun lado,*propuestaAbajo*/
	/*Mismo problema para todos los ID_paqueteXX*/
	ID_paqueteVA int NOT NULL, 
	ID_auto int NOT NULL,
	descuento int default 0,
	PRIMARY KEY(ID_paqueteVA,ID_auto)
);
CREATE TABLE Vuelo_paquete(
	ID_vuelo int NOT NULL,
	ID_paqueteVA int NOT NULL,
	descuento int default 0,
	PRIMARY KEY(ID_vuelo,ID_paqueteVA)
);
CREATE TABLE Arrienda_auto(
	ID_auto int NOT NULL,
	ID_usuario int NOT NULL,
	inicio_arriendo date,
	fecha_compra date,
	fin_arriendo date,
	PRIMARY KEY(ID_auto,ID_usuario)
);
CREATE TABLE Reserva_paqueteVH(
	ID_usuario int NOT NULL,
	ID_paqueteVH int NOT NULL,
	fecha_compra date,
	PRIMARY KEY(ID_usuario,ID_paqueteVH)
);
CREATE TABLE Reserva_actividad(
	ID_usuario int NOT NULL,
	ID_actividad int NOT NULL,
	fecha_compra date,
	fecha_reserva date NOT NULL,
	PRIMARY KEY(ID_usuario,ID_actividad)
);
CREATE TABLE Hotel_paquete(
	ID_habitacion int NOT NULL,
	ID_paquete int NOT NULL,
	descuento int default 0,
	PRIMARY KEY (ID_habitacion,ID_paquete)
);
CREATE TABLE Reserva_habitacion(
	ID_usuario int NOT NULL,
	ID_habitacion int NOT NULL,
	fecha_reserva date NOT NULL,
	inicio_reserva date NOT NULL,
	fin_reserva date NOT NULL,
	PRIMARY KEY(ID_usuario,ID_habitacion)
);
CREATE TABLE Arrienda_traslado( 
	ID_usuario int NOT NULL,
	ID_traslado int NOT NULL,
	fecha_compra date NOT NULL,
	fecha_reserva date NOT NULL,
	PRIMARY KEY (ID_usuario,ID_traslado)
);
CREATE TABLE Contiene_Hab(
	ID_hotel int NOT NULL,
	ID_habitacion int NOT NULL,
	PRIMARY KEY(ID_hotel,ID_habitacion)
);

/*Referenciacion para las llaves foraneas*/

/* Referencias Llaves foraneas tabla intermedia Realiza_accion*/
ALTER TABLE Realiza_accion 
	ADD CONSTRAINT FK_Realiza_accion_ID_usuario 
	FOREIGN KEY (ID_usuario) REFERENCES Usuario(ID_usuario);
ALTER TABLE Realiza_accion 
	ADD CONSTRAINT FK_Realiza_accion_ID_log 
	FOREIGN KEY (ID_log) REFERENCES Auditoria(ID_log);

/* Referencias Llaves foraneas tabla intermedia Compra_pasaje*/
ALTER TABLE Compra_pasaje
	ADD CONSTRAINT FK_Compra_pasaje_ID_usuario 
	FOREIGN KEY (ID_usuario) REFERENCES Usuario(ID_usuario);
ALTER TABLE Compra_pasaje
	ADD CONSTRAINT FK_Compra_pasaje_ID_vuelo 
	FOREIGN KEY (ID_vuelo) REFERENCES Vuelo(ID_vuelo);

/* Referencias Llaves foraneas tabla intermedia Auto_paquete*/
/*Referencia tentativa de ID_PaqueteVA*/
ALTER TABLE Auto_paquete
	ADD CONSTRAINT FK_Auto_paquete_ID_paqueteVA 
	FOREIGN KEY (ID_paqueteVA) REFERENCES Paquete(ID_paquete);
/**************************************/	
ALTER TABLE Auto_paquete
	ADD CONSTRAINT FK_Auto_paquete_ID_auto
	FOREIGN KEY (ID_auto) REFERENCES Auto(ID_auto);

/* Referencias Llaves foraneas tabla intermedia Vuelo_paquete*/
ALTER TABLE Vuelo_paquete
	ADD CONSTRAINT FK_Vuelo_paquete_ID_vuelo 
	FOREIGN KEY (ID_vuelo) REFERENCES Vuelo(ID_vuelo);
ALTER TABLE Vuelo_paquete
	ADD CONSTRAINT FK_Vuelo_paquete_ID_paqueteVA
	FOREIGN KEY (ID_paqueteVA) REFERENCES Paquete(ID_paquete);

/* Referencias Llaves foraneas tabla intermedia Arrienda_auto*/
ALTER TABLE Arrienda_auto
	ADD CONSTRAINT FK_Arrienda_auto_ID_auto 
	FOREIGN KEY (ID_auto) REFERENCES Auto(ID_auto);
ALTER TABLE Arrienda_auto
	ADD CONSTRAINT FK_Arrienda_auto_ID_usuario 
	FOREIGN KEY (ID_usuario) REFERENCES Usuario(ID_usuario);

/* Referencias Llaves foraneas tabla intermedia Reserva_paqueteVH*/
ALTER TABLE Reserva_paqueteVH
	ADD CONSTRAINT FK_Reserva_paqueteVH_ID_usuario
	FOREIGN KEY (ID_usuario) REFERENCES Usuario(ID_usuario);
ALTER TABLE Reserva_paqueteVH
	ADD CONSTRAINT FK_Reserva_paqueteVH_ID_paqueteVH
	FOREIGN KEY (ID_paqueteVH) REFERENCES Paquete(ID_paquete);

/* Referencias Llaves foraneas tabla intermedia Reserva_actividad*/
ALTER TABLE Reserva_actividad
	ADD CONSTRAINT FK_Reserva_actividad_ID_usuario
	FOREIGN KEY (ID_usuario) REFERENCES Usuario(ID_usuario);
ALTER TABLE Reserva_actividad
	ADD CONSTRAINT FK_Reserva_actividad_ID_actividad
	FOREIGN KEY (ID_actividad) REFERENCES Actividad(ID_actividad);

/* Referencias Llaves foraneas tabla intermedia Hotel_paquete*/
ALTER TABLE Hotel_paquete
	ADD CONSTRAINT FK_Hotel_paquete_ID_habitacion
	FOREIGN KEY (ID_habitacion) REFERENCES Habitacion(ID_habitacion);
ALTER TABLE Hotel_paquete
	ADD CONSTRAINT FK_Hotel_paquete_ID_paquete
	FOREIGN KEY (ID_paquete) REFERENCES Paquete(ID_paquete);

/* Referencias Llaves foraneas tabla intermedia Reserva_habitacion*/
ALTER TABLE Reserva_habitacion
	ADD CONSTRAINT FK_Reserva_habitacion_ID_usuario
	FOREIGN KEY (ID_usuario) REFERENCES Usuario(ID_usuario);
ALTER TABLE Reserva_habitacion
	ADD CONSTRAINT FK_Reserva_habitacion_ID_habitacion
	FOREIGN KEY (ID_habitacion) REFERENCES Habitacion(ID_habitacion);

/* Referencias Llaves foraneas tabla intermedia Arrienda_traslado*/
ALTER TABLE Arrienda_traslado
	ADD CONSTRAINT FK_Arrienda_traslado_ID_usuario
	FOREIGN KEY (ID_usuario) REFERENCES Usuario(ID_usuario);
ALTER TABLE Arrienda_traslado
	ADD CONSTRAINT FK_Arrienda_traslado_ID_traslado
	FOREIGN KEY (ID_traslado) REFERENCES Traslado(ID_traslado);

/* Referencias Llaves foraneas tabla intermedia Contiene_Hab*/
ALTER TABLE Contiene_Hab
	ADD CONSTRAINT FK_Contiene_Hab_ID_hotel
	FOREIGN KEY (ID_hotel) REFERENCES Hotel(ID_hotel);
ALTER TABLE Contiene_Hab
	ADD CONSTRAINT FK_Contiene_Hab_ID_habitacion
	FOREIGN KEY (ID_habitacion) REFERENCES Habitacion(ID_habitacion);
