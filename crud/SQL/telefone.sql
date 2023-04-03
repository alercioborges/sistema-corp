CREATE TABLE `telefone` (
	`idtelefone` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`tipo` ENUM('com','res','cel') NULL DEFAULT NULL,
	`numero` VARCHAR(15) NULL DEFAULT '',
	`id_usuario` BIGINT(20) NULL DEFAULT NULL,
	PRIMARY KEY (`idtelefone`),
	INDEX `FK_telefone_usuario` (`id_usuario`),
	CONSTRAINT `FK_telefone_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;
