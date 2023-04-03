select 
	u.idusuario, concat(u.firstname, " ", u.lastname) AS NOME, 
        u.sexo AS SEXO, 
        u.email AS "E-MAIL", 
        DATE_FORMAT(u.nascimento, "%d/%m/%Y") AS "DATA DE NASCIMENTO", 
        e.cep AS CEP, 
        e.logradouro AS LOGRADOURO,
        e.bairro AS BAIRRO,
        e.cidade AS CIDADE,
        e.estado AS ESTADO, 
        CASE WHEN t.tipo = "cel" THEN REPLACE(t.tipo, "cel", "CELULAR") 
		  WHEN t.tipo = "res" THEN REPLACE(t.tipo, "res", "RESIDENCIAL")
		  WHEN t.tipo = "com" THEN REPLACE(t.tipo, "com", "COMERCIAL") END AS "TIPO DO TELEFONE",
        t.numero AS "NÚMERO DO TEFEFONE"
        from usuario u
		  inner join endereco e on e.id_usuario = u.idusuario
        inner join telefone t on t.id_usuario = u.idusuario
		  order by u.firstname, u.lastname