DROP DATABASE `bd_impresoras`;
CREATE DATABASE IF NOT EXISTS `bd_impresoras` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_impresoras`;

# ------------------------------CREATE------------------------------------
#______________________________ADMINISTRADOR________________________________
CREATE TABLE `administrador` (
  `nombre` varchar(20) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  primary key(nombre),
  constraint Uk_Administrador_nombre unique(nombre)
  );
#______________________________USUARIO________________________________
CREATE TABLE `usuario` (
  `codigo` varchar(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nombrecompleto` varchar(60) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `correo_inst` varchar(40) NOT NULL,
  primary key(codigo),
  constraint Uk_Usuario_nombre unique(nombre),
  constraint Uk_Usuario_correo unique(correo),
  constraint Uk_Usuario_correo_inst unique(correo_inst)
);
#______________________________ESTUDIANTE________________________________
CREATE TABLE `Estudiante` (
  `id_usuario` varchar(11) NOT NULL,
  `promedio` float,
  primary key(id_usuario),
  constraint fk_estudiante_usuario foreign key (id_usuario)
  references Usuario(codigo)
);
#______________________________CONTENIDO________________________________
CREATE TABLE `Contenido`(
`id` int,
`titulo` varchar(100) NOT NULL,
`texto` text,
primary key(id)
);
#______________________________HORARIO________________________________
CREATE TABLE `Horario`(
`id` int,
`dia` date NOT NULL,
`hora_inicio` time NOT NULL,
`hora_fin` time NOT NULL,
primary key(id)
);
#______________________________PRUEBA________________________________
CREATE TABLE `Prueba`(
`id` int,
`nombre` varchar(100) NOT NULL,
`id_contenido` int NOT NULL,
constraint fk_prueba_contenido foreign key (id_contenido)
references Contenido(id),
primary key(id)
);
#______________________________PREGUNTA________________________________
CREATE TABLE `Pregunta`(
`id` int,
`enunciado` text NOT NULL,
`id_prueba` int NOT NULL,
constraint fk_Pregunta_prueba foreign key (id_prueba)
references Prueba(id),
primary key(id)
);
#______________________________CALIFICACION________________________________
CREATE TABLE `Calificacion`(
`id` int,
`nota` int NOT NULL,
`intentos` int NOT NULL,
`id_prueba` int NOT NULL,
`id_estudiante` varchar(11) NOT NULL,
constraint fk_calificacion_prueba foreign key (id_prueba)
references Prueba(id),
constraint fk_calificacion_estudiante foreign key (id_estudiante)
references Estudiante(id_usuario),
primary key(id)
);
#______________________________IMPRESORA________________________________
CREATE TABLE `Impresora`(
`id` int,
`estado` varchar(50) NOT NULL,
`id_horario` int NOT NULL,
constraint fk_impresora_horario foreign key (id_horario)
references Horario(id),
primary key(id)
);
#______________________________PRESTAMO________________________________
CREATE TABLE `Prestamo`(
`id` int,
`fecha_prestamo` date NOT NULL,
`hora_inicio` time,
`hora_devolucion` time,
`prestado` boolean NOT NULL,
`id_usuario` varchar(11) NOT NULL,
`id_impresora` int NOT NULL,
constraint fk_prestamo_usuario foreign key (id_usuario)
references Usuario(codigo),
constraint fk_prestamo_impresora foreign key (id_impresora)
references Impresora(id),
primary key(id)
);
#______________________________OPCION________________________________
CREATE TABLE `Opcion`(
`id` int,
`texto` text NOT NULL,
`correcta` boolean NOT NULL,
`id_pregunta` int NOT NULL,
constraint fk_opcion_pregunta foreign key (id_pregunta)
references Pregunta(id),
primary key(id)
);
#______________________________CONTENIDO_REVISADO________________________________
CREATE TABLE `Contenido_revisado`(
`id` int,
`id_estudiante` varchar(11) NOT NULL,
`id_contenido` int NOT NULL,
constraint Uk_contenido_revisado_revisado_id_estudiante_id_contenido unique(id_estudiante, id_contenido),
constraint fk_contenido_revisado_estudiante foreign key (id_estudiante)
references Estudiante(id_usuario),
constraint fk_contenido_revisado_contenido foreign key (id_contenido)
references Contenido(id),
primary key(id)
);
#_______________________________INTENTO_INICIO_DE_SESION______________________________
CREATE TABLE `Intento_inicio_de_sesion`(
`id` int,
`nombre_usuario` varchar(30) NOT NULL,
`contraseña` varchar(30) NOT NULL,
`direccion_ip` VARCHAR(45) NOT NULL,
`exitoso` boolean NOT NULL,
`tiempo` TIMESTAMP NOT NULL,
primary key(id),
constraint fk_intento_inicio_de_sesion_usuario foreign key (nombre_usuario)
references Usuario(nombre)
);
#________________________________DEVOLUCION______________________________________
CREATE TABLE `Devolucion`(
`id` int,
`id_prestamo` int,
`buenas_condiciones` boolean,
`descripcion` text,
primary key(id),
constraint fk_devolucion_prestamo foreign key (id_prestamo)
references Prestamo(id)
);
#______________________________RESTAURACIÓN DE CONTRASEÑA TOKEN_______________________
CREATE TABLE restauracion_de_contraseña_token (
    `id` INT AUTO_INCREMENT,
    `usuario_email` VARCHAR(255) NOT NULL,
    `token` VARCHAR(40) NOT NULL,
    `timestamp` TIMESTAMP NOT NULL,
    primary key(id),
	constraint Uk_restauracion_de_contraseña_token_usuario_email unique(usuario_email),
	constraint Uk_restauracion_de_contraseña_token unique(token),
    constraint fk_restauracion_contraseña_usuario foreign key (usuario_email)
	references Usuario(correo)
);
#------------------------------INSERT------------------------------------------------------------------

#______________________________ADMINISTRADOR________________________________

INSERT INTO `administrador` 
(`nombre`,
`contraseña`) VALUES ('admin','admin123');

#______________________________USUARIO________________________________

INSERT INTO `usuario` 
(`codigo`,
`nombre`,
`nombrecompleto`, 
`contraseña`,
`correo`,
`correo_inst`) VALUES
('1234567890','Juan', 'Juan Antonio Perez Sanchez', 'megustaelvalorant', 'juan33@gmail.com', 'juan33@udistrital.edu.co'),
('1234566890','Kevin', 'Kevin Herrera Morales','maskappapito', 'morales33@gmail.com', 'morales33@udistrital.edu.co'),
('1235678970','Kevin Martinez', 'Kevin Alejandro Martinez Guerrero', 'megustalariata', 'kevin34martinez@gmail.com', 'kevin34martinez@udistrital.edu.co'),
('1264567890','Luis', 'Luis Riaño Kardashian', '1234567', 'luisc8gamer@gmail.com', 'luisc8@udistrital.edu.co'),
('1234555590','Nicolas', 'Nicolas Prieto Londoñez', '12345', 'ngagames23@gmail.com', 'ngames23@udistrital.edu.co');
#______________________________ESTUDIANTE________________________________
INSERT INTO `bd_impresoras`.`estudiante`
(`id_usuario`,
`promedio`)
VALUES
(1264567890,
37.5),
(1234555590,
25);

#______________________________CONTENIDO________________________________
INSERT INTO `bd_impresoras`.`contenido`
(`id`,
`titulo`,
`texto`)
VALUES
(1,
"introducción",
"La impresoras 3D consisten en: Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
Duis purus nisl, tempor nec odio ac, lobortis malesuada sapien. Morbi convallis convallis
 tempus. Nulla iaculis auctor dapibus. In non urna a eros venenatis placerat. Phasellus
 ligula velit, consequat vitae venenatis vitae."),
 (2,
 "mantenimiento",
"El mantenimiento de las impresoras 3D consiste en: Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
Duis purus nisl, tempor nec odio ac, lobortis malesuada sapien. Morbi convallis convallis
 tempus. Nulla iaculis auctor dapibus. In non urna a eros venenatis placerat. Phasellus
 ligula velit, consequat vitae venenatis vitae.");

#______________________________HORARIO________________________________
INSERT INTO `bd_impresoras`.`horario`
(`id`,
`dia`,
`hora_inicio`,
`hora_fin`)
VALUES
(1,
'lunes',
'09:30:00',
'03:30:00'),
(2,
'sabado',
'08:00:00',
'12:00:00');

#______________________________PRUEBA________________________________
INSERT INTO `bd_impresoras`.`prueba`
(`id`,
`nombre`,
`id_contenido`)
VALUES
(1,
"prueba introduccion",
1),
(2,
"prueba mantenimiento",
2);

#______________________________PREGUNTA________________________________
INSERT INTO `bd_impresoras`.`pregunta`
(`id`,
`enunciado`,
`id_prueba`)
VALUES
(1,
"pregunta 1 introduccion",
1),
(2,
"pregunta 2 introduccion",
1),
(3,
"pregunta 3 introduccion",
1),
(4,
"pregunta 4 introduccion",
1),
(5,
"pregunta 1 mantenimiento",
2),
(6,
"pregunta 2 mantenimiento",
2),
(7,
"pregunta 3 mantenimiento",
2);

#______________________________CALIFICACION________________________________
INSERT INTO `bd_impresoras`.`calificacion`
(`id`,
`nota`,
`intentos`,
`id_prueba`,
`id_estudiante`)
VALUES
(1,
30,
2,
1,
'1264567890'),
(2,
45,
1,
2,
"1264567890"),
(3,
25,
1,
1,
"1234555590");

#______________________________IMPRESORA________________________________
INSERT INTO `bd_impresoras`.`impresora`
(`id`,
`estado`,
`id_horario`)
VALUES
(1,
"prestado",
1),
(2,
"en mantenimiento",
1),
(3,
"disponible",
1);
#______________________________PRESTAMO________________________________
INSERT INTO `bd_impresoras`.`prestamo`
(`id`,
`fecha_prestamo`,
`hora_inicio`,
`hora_devolucion`,
`prestado`,
`id_usuario`,
`id_impresora`)
VALUES
(1,
'2023-10-29',
'10:00:00',
'12:00:00',
true,
"1264567890",
3);
#______________________________OPCION________________________________
INSERT INTO `bd_impresoras`.`opcion`
(`id`,
`texto`,
`correcta`,
`id_pregunta`)
VALUES
(1,
"la mayoria de impresiones toman 5 min",
false,
1),
(2,
"la mayoria de impresiones toman más de 5 min",
true,
1);
#______________________________CONTENIDO_REVISADO________________________________
INSERT INTO `bd_impresoras`.`contenido_revisado`
(`id`,
`id_estudiante`,
`id_contenido`)
VALUES
(1,
"1264567890",
1),
(2,
"1264567890",
2),
(3,
"1234555590",
1);
