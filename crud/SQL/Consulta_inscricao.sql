SELECT
u.*,
ic.*,
c.*	
	
	FROM inscricao_curso ic
		INNER JOIN usuario u ON u.idusuario = ic.id_usuario
			INNER JOIN curso c ON c.idcurso = ic.id_curso