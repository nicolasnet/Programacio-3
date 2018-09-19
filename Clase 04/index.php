<?PHP
//      MYSQL Mariadb
/*
usamos en Crhome: phpMyAdmin
Nombre:  y codificacion: "spanish2_ci"

INSERT INTO `personas`(`id`, `nombre`, `apellido`, `dni`) VALUES ([value-1],[value-2],[value-3],[value-4]),([value-1],[value-2],[value-3],[value-4])

UPDATE INTO 'localidades' SET `nombre`="ejemplo" WHERE id IN (1,2) //de esta manera con "IN" cambiamos el valor de una columna en varios ID

//pongo alias a las tablas, cambio de nombre a una columna y relaciono una tabla con la otra
SELECT e.nombre, l.nombre as "localidad" FROM `empleados` e INNER JOIN `localidades` l ON l.id=e.localidad

//Funciones de AGREGACION:
SUM
AVG (average)
MIN
MAX
COUNT

SELECT AVG(sueldo) AS "Promedio" FROM `empleados`

//uso funciones de agregacion y muestro las localidades relacionando las tablas
SELECT AVG(sueldo) AS "Promedio", l.nombre FROM `empleados` e INNER JOIN `localidades` l ON l.id=e.localidad GROUP BY e.localidad

*/


/*Ejercicios PDF:

1- SELECT * FROM `productos` ORDER BY pNombre
2- SELECT * FROM `provedores` WHERE localidad LIKE "%Quilmes%"
3- SELECT * FROM `envios` WHERE cantidad>200 && cantidad<=300
4- SELECT SUM(cantidad) AS CantTotal FROM `envios`
5- SELECT * FROM `envios` LIMIT 3
6- (no terminado) SELECT e.numero, prod.pNombre as "Producto"
    FROM `envios` e INNER JOIN `productos` prod ON e.pNumero=prod.pNumero


*/




?>