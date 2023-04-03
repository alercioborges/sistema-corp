CREATE TABLE `endereco` (
	`idendereco` BIGINT(10) NOT NULL AUTO_INCREMENT,
	`logradouro` VARCHAR(50) NOT NULL,
	`numcasa` VARCHAR(30) NOT NULL,
	`complemento` VARCHAR(30) NOT NULL,
	`cep` VARCHAR(9) NOT NULL,
	`bairro` VARCHAR(50) NOT NULL,
	`cidade` VARCHAR(50) NOT NULL,
	`estado` CHAR(2) NOT NULL,
	`id_usuario` BIGINT(10) NULL DEFAULT NULL,
	PRIMARY KEY (`idendereco`),
	INDEX `FK_endereco_usuario` (`id_usuario`),
	CONSTRAINT `FK_endereco_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;
