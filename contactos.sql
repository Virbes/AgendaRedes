DROP DATABASE IF EXISTS agenda;
CREATE DATABASE IF NOT EXISTS agenda;
USE agenda;

CREATE TABLE contactos(
  id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(60) NOT NULL,
  correo varchar(100) NOT NULL,
  telefono varchar(15) NOT NULL,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO contactos(nombre, correo, telefono) VALUES
('Marianos', 'adolfo291@gmail.com', '9631611001'),
('Francisco Virbes', 'virbes@mail.com', '9632244506'),
('Alondra Ramirez', 'alondrita@gmail.com', '12356789');

SELECT * FROM contactos;
SELECT COUNT(id) FROM contactos;