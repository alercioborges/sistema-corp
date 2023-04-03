CREATE TABLE `usuario` (
	`idusuario` BIGINT(10) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(30) NOT NULL DEFAULT '',
	`password` VARCHAR(255) NOT NULL DEFAULT '',
	`firstname` VARCHAR(30) NOT NULL DEFAULT '',
	`lastname` VARCHAR(30) NOT NULL DEFAULT '',
	`sexo` ENUM('MASCULINO','FEMININO') NOT NULL,
	`email` VARCHAR(60) NOT NULL DEFAULT '',
	`nascimento` DATE NOT NULL,
	PRIMARY KEY (`idusuario`),
	UNIQUE INDEX `username` (`username`),
	UNIQUE INDEX `email` (`email`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;
