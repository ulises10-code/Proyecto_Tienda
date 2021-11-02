create database Venta;
use Venta;

Create table Lista_comp(
Identificador int not null auto_increment,
Nombre varchar(30) not null,
Precio_V float not null,
Cantidad int not null,
Precio_T float not null,
primary key (Identificador)
);

show tables;
select * from lista_comp;

INSERT INTO `Lista_comp` (`Nombre`,`Precio_V`, `Cantidad`, `Precio_T`) 
VALUES ('Papas', '12.90', '2', '15.80');