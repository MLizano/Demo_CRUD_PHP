# Demo_CRUD_PHP


/////////////////////////////////////////////////////////////////////////////////////////////////
Para este proyecto se utilizo:

-Apache 2.4
-Bootstrap 5
-Jquery 3.5
-Sweetalert 2
-Javascript
-Html 5
-CSS 3
-DB MySQL 8
-PHP 8


/////////////////////////////////////////////////////////////////////////////////////////////////
1- Para le ejecucion del proyecto se debe instalar Xampp o WampServer para levantar el proyecto por Apache, tambien se debe crear una DB con MySQL con nombre "demo_php".

2- Se copia el contenido del proyecto en la carpeta "htdocs" (Xampp) o "www" (WampServer).

3- Se ejecutan los querys en PHP MyAdmin para la creacion de las tablas y su contenido:


//tablas--------------------------------------------------------
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

//indices--------------------------------------------------------
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRol` (`idRol`);

//auto increment--------------------------------------------------------
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

//llave foranea--------------------------------------------------------
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

//insert--------------------------------------------------------
INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Colaborador');

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `idRol`) VALUES
(1, 'admin', 'admin', 1),
(31, 'demo', 'demo', 2),
(32, 'demo2', 'demo2', 2),
(34, 'demo3', 'demo3', 1),
(36, 'demo4', 'demo4', 1),
(58, 'demo5', 'demo5', 2);