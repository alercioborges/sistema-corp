CREATE TABLE curso (
	idcurso BIGINT(10) NOT NULL AUTO_INCREMENT,
	nomecompleto VARCHAR(254) NOT NULL DEFAULT '',
	nomebreve VARCHAR(255) NOT NULL DEFAULT '',
	descricao LONGTEXT NULL,
	id_categoria BIGINT(10) NULL DEFAULT NULL,
	PRIMARY KEY (idcurso),
	INDEX FK_curso_categoria (id_categoria),
	CONSTRAINT FK_curso_categoria FOREIGN KEY (id_categoria) REFERENCES categoria_curso (idcategoria)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;