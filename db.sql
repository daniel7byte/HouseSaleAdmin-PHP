-- NUEVA TABLA USUARIOS
CREATE TABLE `joygle`.`usuarios` ( `id` INT NOT NULL , `usuario` VARCHAR(30) NOT NULL , `contrasenia` TEXT NOT NULL , `rol` ENUM('ADMIN','USER') NOT NULL ) ENGINE = InnoDB;
ALTER TABLE `usuarios` ADD PRIMARY KEY(`id`);
ALTER TABLE `usuarios` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

-- NUEVA TABLA FAVORITOS
CREATE TABLE `joygle`.`favoritos` ( `id` INT NOT NULL AUTO_INCREMENT , `casa_dato2` INT NOT NULL , `usuario_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;