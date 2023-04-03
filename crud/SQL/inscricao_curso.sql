CREATE TABLE inscricao_curso (
	idinscricao BIGINT(10) NOT NULL AUTO_INCREMENT,
	id_curso BIGINT(10) NULL DEFAULT NULL,
	id_usuario BIGINT(10) NULL DEFAULT NULL,
	PRIMARY KEY (idinscricao),
	INDEX FK_inscricao_curso (id_curso),
	CONSTRAINT FK_inscricao_curso FOREIGN KEY (id_curso) REFERENCES curso (idcurso),
	INDEX FK_inscricao_usuario (id_usuario),
	CONSTRAINT FK_inscricao_usuario FOREIGN KEY (id_usuario) REFERENCES usuario (idusuario)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;