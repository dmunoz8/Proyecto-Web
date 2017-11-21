CREATE DATABASE portfolio;

CREATE TABLE users(
id int AUTO_INCREMENT,
email varchar(255),
password varchar(255),
PRIMARY KEY(id)
);

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'portfolio@example.com', 'prueba'),
(2, 'prueba@ejemplo.com', '1a2b3c');

CREATE TABLE blog (
  eventId int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  description varchar(255) DEFAULT NULL,
  eventDate datetime DEFAULT NULL,
  place varchar(255) DEFAULT NULL,
  PRIMARY KEY (eventId)
);

CREATE TABLE metadata (
  preferences int NOT NULL AUTO_INCREMENT,
  camera varchar(50) DEFAULT NULL,
  lens varchar(100) DEFAULT NULL,
  shutterSpeed varchar(50) DEFAULT NULL,
  aperture varchar(50) DEFAULT NULL,
  ISO varchar(50) DEFAULT NULL,
  PRIMARY KEY (preferences)
);

INSERT INTO `metadata`(`camera`, `lens`, `shutterSpeed`, `aperture`, `ISO`) VALUES ('Canon t6i', '18-55mm', '1/100', '2.8', '100');

INSERT INTO `metadata`(`camera`, `lens`, `shutterSpeed`, `aperture`, `ISO`) VALUES ('Canon M10', '18-55mm', '1/100', '3.5', '200');

INSERT INTO `metadata`(`camera`, `lens`, `shutterSpeed`, `aperture`, `ISO`) VALUES ('Nikon', '70-200mm', '1/400', '5.0', '400');

INSERT INTO `metadata`(`camera`, `lens`, `shutterSpeed`, `aperture`, `ISO`) VALUES ('Sony a7', '50mm', '1/50', '1.4', '100');


CREATE TABLE photos (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(200) DEFAULT NULL,
  location varchar(255) DEFAULT NULL,
  tags varchar(255) DEFAULT NULL,
  likes int DEFAULT NULL,
  meta int,
  PRIMARY KEY(id),
  FOREIGN KEY (meta) REFERENCES metadata(preferences)
);

INSERT INTO photos (id, name, location, tags, likes, meta) VALUES
(1, 'Landscape', 'Snow.jpg', 'Landscape', 0,1),
(2, 'London', 'London.jpg', 'Landscape', 0,1),
(3, 'Golden Gate', 'Golden Gate.jpg', 'Urban', 0,2),
(4, 'Roadtrip', 'Roadtrip.jpg', 'Landscape', 0,2),
(5, 'Alcatraz', 'Alcatraz.jpg', 'Landscape', 0,3),
(6, 'Building', 'Building.jpg', 'Urban', 0,2),
(7, 'Chinatown', 'Chinatown.jpg', 'Urban', 0,3),
(8, 'Colors', 'Colors.jpg', 'Landscape', 0,4),
(9, 'Eiffel', 'Eiffel.jpg', 'Black&White', 0,2),
(10, 'London Eye', 'London Eye.jpg', 'Landscape', 0,2),
(11, 'Notre Dame', 'Notre Dame.jpg', 'Architecture', 0,3),
(12, 'Statue', 'Statue.jpg', 'Urban', 0,1),
(13, 'Tower', 'Tower.jpg', 'Black&White', 0,1);

