CREATE TABLE categoria_curso (
	idcategoria BIGINT(10) NOT NULL AUTO_INCREMENT,
	nome VARCHAR(254) NOT NULL DEFAULT '',	
	descricao LONGTEXT NULL,
	PRIMARY KEY (`idcategoria`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1