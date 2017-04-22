-- NUEVA TABLA USUARIOS
CREATE TABLE `joygle`.`usuarios` ( `id` INT NOT NULL , `usuario` VARCHAR(30) NOT NULL , `contrasenia` TEXT NOT NULL , `rol` ENUM('ADMIN','USER') NOT NULL ) ENGINE = InnoDB;
ALTER TABLE `usuarios` ADD PRIMARY KEY(`id`);
ALTER TABLE `usuarios` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

-- NUEVA TABLA FAVORITOS
CREATE TABLE `joygle`.`favoritos` ( `id` INT NOT NULL AUTO_INCREMENT , `casa_dato2` INT NOT NULL , `usuario_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- REGISTRAR USUARIO admin:secret
INSERT INTO `usuarios` (`id`, `usuario`, `contrasenia`, `rol`) VALUES
(1, 'admin', '$2y$12$iUB6U9KutI.Jl6C3WbRahewwUxugsJF4CLsrbMPjsEy1Q4WX6vgKa', 'ADMIN');

-- Identificador Plataforma
ALTER TABLE `favoritos` ADD `casa_id` INT NOT NULL AFTER `id`;
ALTER TABLE `favoritos` CHANGE `casa_id` `casa_id` INT(11) NULL DEFAULT NULL;


-- Nuevos Campos Abril 21 del 2017
ALTER TABLE `datoscasas` ADD `dato29` TEXT NULL DEFAULT NULL AFTER `description`, ADD `dato30` TEXT NULL DEFAULT NULL AFTER `dato29`, ADD `dato31` TEXT NULL DEFAULT NULL AFTER `dato30`;
