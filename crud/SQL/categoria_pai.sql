CREATE TABLE catego_pai (
	idcategoria_pai BIGINT(10) NOT NULL AUTO_INCREMENT,
	nome VARCHAR(254) NOT NULL DEFAULT '',
	id_categoria BIGINT(10) NOT NULL,
	PRIMARY KEY (`idcategoria`),
	INDEX FK_categoriapai_categoria (id_categoria),
	CONSTRAINT FK_categoriapai_categoria FOREIGN KEY (id_categoria) REFERENCES categoria_curso (idcategoria)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1