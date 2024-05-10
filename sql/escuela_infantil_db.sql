-- Eliminar la base de datos si existe
DROP DATABASE IF EXISTS escuela_infantil;

-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS escuela_infantil;

-- Seleccionar la base de datos recién creada
USE escuela_infantil;

-- Creación de la tabla Users
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    tipo_usuario ENUM('admin', 'educador', 'padre') NOT NULL
);

-- Creación de la tabla Eduacador
CREATE TABLE Educador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    DNI VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    f_nacimiento DATE NOT NULL,
    img VARCHAR(20),
    FOREIGN KEY (id_user) REFERENCES Users(id)
);

-- Creación de la tabla Padre
CREATE TABLE Padre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    id_alumno INT NOT NULL,
    relacion VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES Users(id)
);

-- Creación de la tabla Estudiante
CREATE TABLE Estudiante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    f_nacimiento DATE NOT NULL,
    alergias TEXT,
    img VARCHAR(20),
    comentarios TEXT
);

-- Creación de la tabla Clase
CREATE TABLE Clase (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_educador INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    nivel VARCHAR(100) NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (id_educador) REFERENCES Educador(id)
);

-- Creación de la tabla Inscripcion
CREATE TABLE Inscripcion (
    id_clase INT NOT NULL,
    id_estudiante INT NOT NULL,
    PRIMARY KEY (id_clase, id_estudiante),
    FOREIGN KEY (id_clase) REFERENCES Clase(id),
    FOREIGN KEY (id_estudiante) REFERENCES Estudiante(id)
);

-- Creación de la tabla contacto
CREATE TABLE Contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    relacion VARCHAR(100) NOT NULL,
    id_alumno INT NOT NULL,
    FOREIGN KEY (id_alumno) REFERENCES Estudiante(id)
);

CREATE TABLE Fotografias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_clase INT NOT NULL,
    ruta_foto VARCHAR(255) NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (id_clase) REFERENCES Clase(id)
);
