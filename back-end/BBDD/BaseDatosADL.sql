-- crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS BaseDatosADL;

-- seleccionar la base de datos
USE BaseDatosADL;

-- crear la tabla ROL
CREATE TABLE IF NOT EXISTS ROL (
    id INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    admin TINYINT(0) NOT NULL
);

-- crear la tabla USUARIO
CREATE TABLE IF NOT EXISTS USUARIO (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50),
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    rol_id INT NOT NULL,
    FOREIGN KEY (rol_id) REFERENCES ROL(id)
);

-- crear la tabla MENSAJES
CREATE TABLE IF NOT EXISTS MENSAJES (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mensaje VARCHAR(255) NOT NULL,
    remitente_id INT NOT NULL,
    destinatario_id INT NOT NULL,
    FOREIGN KEY (remitente_id) REFERENCES USUARIO(id),
    FOREIGN KEY (destinatario_id) REFERENCES USUARIO(id)
);

-- crear la tabla NOTICIAS
CREATE TABLE IF NOT EXISTS NOTICIAS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    autor VARCHAR(50) NOT NULL,
    activa TINYINT(1) NOT NULL
);

-- insertar roles
INSERT INTO ROL (id, nombre, admin) VALUES (1, 'usuario', FALSE);
INSERT INTO ROL (id, nombre, admin) VALUES (2, 'admin', TRUE);

-- insertar usuarios
INSERT INTO USUARIO (nombre, apellido, email, password, rol_id) VALUES ('admin', 'admin', 'admin', 'admin', 2);
INSERT INTO USUARIO (nombre, apellido, email, password, rol_id) VALUES ('usuario', 'usuario', 'usuario@usuario.com', 'usuario', 1);

-- insertar una noticia
INSERT INTO NOTICIAS (titulo, descripcion, autor, activa) VALUES ('Noticia 1', 'Descripción de la noticia 1', 'Prueba', TRUE);

-- insertar un mensaje desde usuario a admin
INSERT INTO MENSAJES (mensaje, remitente_id, destinatario_id) VALUES ('Mensaje de prueba', 2, 1);