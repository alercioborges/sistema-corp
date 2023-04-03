DELIMITER $
CREATE PROCEDURE CADASTRO_USUARIO(
	
	IN  p_username VARCHAR(30),
	IN p_password VARCHAR(255),
	IN p_firstname VARCHAR(30),
	IN p_lastname VARCHAR(30),
	IN p_sexo ENUM('MASCULINO','FEMININO'),
	IN p_email VARCHAR(60),
	IN p_nascimento DATE,
	IN p_imagem VARCHAR(255),

	IN p_logradouro VARCHAR(50),
	IN p_numcasa VARCHAR(30),
	IN p_complemento VARCHAR(30),
	IN p_cep VARCHAR(9),
	IN p_bairro VARCHAR(50),
	IN p_cidade VARCHAR(50),
	in p_estado VARCHAR(2),

	IN p_tipo ENUM('com','res','cel'),
	IN p_numero VARCHAR(15)
)
BEGIN

DECLARE FK BIGINT unsigned default 0;

INSERT INTO usuario VALUES(
	null,
	p_username,
	p_password,
	p_firstname,
	p_lastname,
	p_sexo,
	p_email,
	p_nascimento,
	p_imagem);


SET FK = (SELECT idusuario FROM usuario WHERE idusuario = LAST_INSERT_ID());

INSERT INTO endereco VALUES(	
	null,
	p_logradouro,
	p_numcasa,
	p_complemento,
	p_cep,
	p_bairro,
	p_cidade,
	p_estado,	
	FK);

INSERT INTO telefone VALUES(
	null,
	p_tipo,
	p_numero,
	FK); 

END
$
DELIMITER ;