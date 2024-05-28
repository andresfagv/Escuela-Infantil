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
    password_hash VARCHAR(255) NOT NULL,
    password_salt VARCHAR(255) NOT NULL,
    tipo_usuario ENUM('admin', 'educador', 'padre') NOT NULL
);

-- Creación de la tabla Educador
CREATE TABLE Educador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    DNI VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    f_nacimiento DATE NOT NULL,
    sexo ENUM('hombre', 'mujer') NOT NULL,
    img VARCHAR(200),
    FOREIGN KEY (id_user) REFERENCES Users(id) ON DELETE CASCADE
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
    sexo ENUM('hombre', 'mujer') NOT NULL,
    DNI VARCHAR(20) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES Users(id) ON DELETE CASCADE
);



-- Creación de la tabla Estudiante
CREATE TABLE Estudiante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    f_nacimiento DATE NOT NULL,
    sexo ENUM('hombre', 'mujer') NOT NULL,
    alergias TEXT,
    img VARCHAR(200),
    comentarios TEXT
);

-- Creación de la tabla Clase
CREATE TABLE Clase (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    nivel VARCHAR(100) NOT NULL,
    descripcion TEXT
);

-- Creación de la tabla ClaseEducador (tabla intermedia)
CREATE TABLE ClaseEducador (
    id_clase INT NOT NULL,
    id_educador INT NOT NULL,
    PRIMARY KEY (id_clase, id_educador),
    FOREIGN KEY (id_clase) REFERENCES Clase(id) ON DELETE CASCADE,
    FOREIGN KEY (id_educador) REFERENCES Educador(id) ON DELETE CASCADE
);

-- Creación de la tabla Inscripcion
CREATE TABLE Inscripcion (
    id_clase INT NOT NULL,
    id_estudiante INT NOT NULL,
    PRIMARY KEY (id_clase, id_estudiante),
    FOREIGN KEY (id_clase) REFERENCES Clase(id) ON DELETE CASCADE,
    FOREIGN KEY (id_estudiante) REFERENCES Estudiante(id) ON DELETE CASCADE
);

-- Creación de la tabla Contacto
CREATE TABLE Contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    relacion VARCHAR(100) NOT NULL,
    id_alumno INT NOT NULL,
    FOREIGN KEY (id_alumno) REFERENCES Estudiante(id) ON DELETE CASCADE
);

-- Creación de la tabla Fotografias
CREATE TABLE Fotografias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_clase INT NOT NULL,
    ruta_foto VARCHAR(255) NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (id_clase) REFERENCES Clase(id)
);

-- Crear la tabla MenuSemanal
CREATE TABLE MenuSemanal (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_clase INT NOT NULL,
    dia ENUM('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes') NOT NULL,
    comida1 VARCHAR(255) NOT NULL,
    comida2 VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_clase) REFERENCES Clase(id) ON DELETE CASCADE
);

-- Crear la tabla Productos
CREATE TABLE Productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45) NOT NULL,
    tipo ENUM('Juguete', 'Libro') NOT NULL,
    descripcion VARCHAR(255)
);

-- Crear la tabla Prestamo
CREATE TABLE Prestamo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT NOT NULL,
    id_alumno INT NOT NULL,
    fecha_prestamo DATE NOT NULL,
    FOREIGN KEY (id_producto) REFERENCES Productos(id),
    FOREIGN KEY (id_alumno) REFERENCES Estudiante(id)
);


-- Triggers para eliminar datos despues de eliminar algunos campos

DELIMITER //

CREATE TRIGGER eliminar_padre_despues_de_eliminar_alumno 
AFTER DELETE ON Estudiante 
FOR EACH ROW 
BEGIN 
    DELETE FROM Padre WHERE id_alumno = OLD.id; 
END; //

DELIMITER ;


DELIMITER //

CREATE TRIGGER eliminar_usuario_despues_de_eliminar_padre 
AFTER DELETE ON Padre 
FOR EACH ROW 
BEGIN 
    DELETE FROM Users WHERE id = OLD.id_user; 
END; //

DELIMITER ;

