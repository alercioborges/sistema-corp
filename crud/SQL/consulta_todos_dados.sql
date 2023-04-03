select u.idusuario, 
u.username, u.password, u.firstname, 
u.lastname, u.sexo, u.email, 
DATE_FORMAT(u.nascimento, '%d/%m/%Y') as nascimento,  
e.logradouro, e.numcasa, 
e.complemento, e.cep, 
e.bairro, e.cidade, 
e.estado, t.tipo, t.numero from usuario u 
inner join endereco e on e.id_usuario = u.idusuario 
inner join telefone t on t.id_usuario = u.idusuario 
where u.idusuario = 90