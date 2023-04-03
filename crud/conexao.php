<?php
if(isset($_POST["acao"])){

    if ($_POST["acao"] == "inserir"){
        inserirPessoa();
    }

    if($_POST["acao"] == "alterar"){
        alterarUsuario();
    }

    if($_POST["acao"] == "excluir"){
        excluirUsuario();
        retornaVisualizar();
    }

    if($_POST["acao"] == "logar"){
        loginSession();
    }

    if($_POST["acao"] == "categoria"){
        criarCetegoria();
    }

    if($_POST["acao"] == "alterarCategoria"){
        alterarCategoria();
    }    

    if($_POST["acao"] == "excluirCategoria"){
        excluirCategoria();
    }

    if($_POST["acao"] == "curso"){
        criarCurso();
    }

    if($_POST["acao"] == "excluirCurso"){
        excluirCurso();        
    }

    if($_POST["acao"] == "alterarCurso"){
        alterarCurso();
    }

    if($_POST["acao"] == "inscreverUsuario"){
        inscreverUsuario();
    }
    
}

function abritBanco(){
    $conexao = new mysqli("186.192.160.186:3314","crud","1234","crud");
    return $conexao;
}

function inserirPessoa(){
    $banco = abritBanco();
    $banco->set_charset('utf8');

    //dados usuario        
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $firstname = addslashes($_POST['firstname']);
    $lastname = addslashes($_POST['lastname']);
    $sexo = addslashes($_POST['sexo']);
    $email = addslashes($_POST['email']);
    $nascimento = addslashes($_POST['nascimento']);
    $imagemPerfil = 'Arqiovo vazio';


    //adicionando valor a imagem de perfil
    /*if(isset($_FILES['arquivo']['name'])){
        $novo_nome = 'arquivo enviado';
        $novo_nome = $_FILES['arquivo']['name'];
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
        $novo_nome = md5(time()).$extensao;
        $diretorio = "upload/";

        move_uploaded_file($_FILES['arquivo']['temp_name'], $diretorio.$novo_nome);
    } else{
        $novo_nome = 'arquivo vazio';
    }*/

        //dadosendereco
    $logradouro = addslashes($_POST['logradouro']);
    $cep = addslashes($_POST['cep']);
    $numcasa = addslashes($_POST['numcasa']);
    $complemento = addslashes($_POST['complemento']);
    $bairro = addslashes($_POST['bairro']);
    $cidade = addslashes($_POST['cidade']);
    $estado = addslashes($_POST['estado']);
    //dados telefone
    $tipo = addslashes($_POST['tipo']);
    $telefone = addslashes($_POST['telefone']);

    //verifica se o username e eimal ja existe
        //querys de consulta
    $contUsername = "SELECT * FROM usuario WHERE username = '$username'";
    $contEmail = "SELECT * FROM usuario WHERE email = '$email'";
        //executando as querys bo banco
    $queryUsername = $banco->query($contUsername);
    $queryEmail = $banco->query($contEmail);


    if( $queryUsername->num_rows > 0 ) { //se o username existe
        echo "Nome de usuário já existente";        
        $banco->close();

    } else if( $queryEmail->num_rows > 0 ) { //se o e-mail existe
        echo "E-mail Já existente";
        $banco->close();

    } else{

        $sql = "CALL CADASTRO_USUARIO('$username', '$password', '$firstname', '$lastname', '$sexo', '$email', '$nascimento', '$imagemPerfil', '$logradouro', '$numcasa', '$complemento', '$cep', '$bairro', '$cidade', '$estado', '$tipo', '$telefone')";

        $banco->query($sql);
        $banco->close();
        echo "Usuário cadastrado com sucesso!";
    }// fim da verificação
}

function selectIdUsuario($id){
    $banco = abritBanco();
    $banco->set_charset('utf8');

    $sql = "select u.idusuario, " 
    . "u.username, u.password, u.firstname, "
    . "u.lastname, u.sexo, u.email, "
    . "DATE_FORMAT(u.nascimento, '%d/%m/%Y') as nascimento, "
    . "e.logradouro, e.numcasa, "
    . "e.complemento, e.cep, "
    . "e.bairro, e.cidade, "
    . "e.estado, "
    . "CASE WHEN t.tipo = 'cel' THEN REPLACE(t.tipo, 'cel', 'CELULAR') "
    . "WHEN t.tipo = 'res' THEN REPLACE(t.tipo, 'res', 'RESIDENCIAL') "
    . "WHEN t.tipo = 'com' THEN REPLACE(t.tipo, 'com', 'COMERCIAL') END AS tipo, "
    . "t.numero from usuario u "
    . "inner join endereco e on e.id_usuario = u.idusuario "
    . "inner join telefone t on t.id_usuario = u.idusuario "
    . "where u.idusuario = ".$id;

    $resultado = $banco->query($sql);
    $banco->close();
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

function alterarUsuario(){
    $banco = abritBanco();
    $banco->set_charset('utf8');

    //ID do susario
    $idusuario = addslashes($_POST['id']);
    //Dados do usuário
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $firstname = addslashes($_POST['firstname']);
    $lastname = addslashes($_POST['lastname']);
    $sexo = addslashes($_POST['sexo']);
    $email = addslashes($_POST['email']);
    $nascimento = addslashes($_POST['nascimento']);
    //dados od endereço do usuário
    $logradouro = addslashes($_POST['logradouro']);
    $cep = addslashes($_POST['cep']);
    $numcasa = addslashes($_POST['numcasa']);
    $complemento = addslashes($_POST['complemento']);
    $bairro = addslashes($_POST['bairro']);
    $cidade = addslashes($_POST['cidade']);
    $estado = addslashes($_POST['estado']);
    //dados do telefone do usuário
    $tipo = addslashes($_POST['tipo']);
    $telefone = addslashes($_POST['telefone']);

    //verificando se username e email ja existe
        //verifica se username já existe e é diferente do usuario a alterar
    $contUsername = "SELECT * FROM usuario WHERE username = '$username' and idusuario != '$idusuario'";
        //verifica se email já existe e é diferente do usuario a alterar
    $contEmail = "SELECT * FROM usuario WHERE email = '$email' and idusuario != '$idusuario'";

        //executando as querys bo banco
    $queryUsername = $banco->query($contUsername);
    $queryEmail = $banco->query($contEmail);

    if( $queryUsername->num_rows > 0 ) { //se o username existe
        echo "Nome de usuário já existente";        
        $banco->close();

    } else if( $queryEmail->num_rows > 0 ) { //se o e-mail existe
        echo "E-mail Já existente";
        $banco->close();

    } else{ //alterar usuario
        $sql = "update usuario u "
        . "inner join endereco e on e.id_usuario = u.idusuario "
        . "inner join telefone t on t.id_usuario = u.idusuario "
        . "set "
        . "u.username = '$username', "
        . "u.password = '$password', "
        . "u.firstname = '$firstname', "
        . "u.lastname = '$lastname', "
        . "u.sexo = '$sexo', "
        . "u.email = '$email',  "
        . "u.nascimento = '$nascimento', "
        . "e.logradouro = '$logradouro', "
        . "e.numcasa = '$numcasa', "
        . "e.complemento = '$complemento', "
        . "e.cep = '$cep', "
        . "e.bairro = '$bairro', "
        . "e.cidade = '$cidade', "
        . "e.estado = '$estado', "
        . "t.tipo = '$tipo', "
        . "t.numero = '$telefone ' "
        . "where u.idusuario = '$idusuario' ";

        $banco->query($sql);
        $banco->close();
        echo "Usuário alterado com sucesso!";        
    }
}

function excluirUsuario(){
    $banco = abritBanco();

    $idusuario = $_POST['id'];

    $sql1="delete from endereco "
    . "where endereco.id_usuario = '$idusuario' "; 

    $sql2="delete from telefone "
    . "where telefone.id_usuario = '$idusuario' ";

    $sql3="delete from usuario "
    . "where usuario.idusuario = '$idusuario' ";

    $banco->query($sql1);
    $banco->query($sql2);
    $banco->query($sql3);
    $banco->close();

}

function voltarVisualizar(){
    header('Location: http://localhost/crud/visualizar.php');
}

function retornaVisualizar(){
  header('Location: visualizar.php');
}

function retornaListaCategoria(){
    header('Location: listacategoria.php');
}

function loginSession(){

    session_start();

    $banco = abritBanco();

    $nomeUsuario = addslashes($_POST['nomeUsuario']);
    $senha = addslashes($_POST['senha']);

    $sql="select username from usuario where username = '$nomeUsuario' and password = '$senha'";
    $resultado = $banco->query($sql);

    if($resultado->num_rows == 0) {
        $_SESSION['nao_autenticado'] = true;
        header('Location: login.php');
        exit();
        $banco->close();
    } else{
        $_SESSION['nomeUsuario'] = $nomeUsuario;

        // Definindo a sessão de idusuario
        $sqlid = "select u.idusuario from usuario u where u.username = '$nomeUsuario'";
        $resulsqlid = $banco->query($sqlid);
        $row = mysqli_fetch_array($resulsqlid);
        $idUsuario = $row['idusuario'];
        $_SESSION['idUsuario'] = $idUsuario;

        // Definindo a sessão de Nome do usuário
        $sqlfirstname = "select u.firstname from usuario u where u.username = '$nomeUsuario'";
        $resulsqlfirstname = $banco->query($sqlfirstname);
        $rowfirstname = mysqli_fetch_array($resulsqlfirstname);
        $firstnameUsuario = $rowfirstname['firstname'];
        $_SESSION['firstnameUsuario'] = $firstnameUsuario;        

        header('Location: ../index.php');
        exit();
        $banco->close();
    }
}

function criarCetegoria(){

    $banco = abritBanco();
    $banco->set_charset('utf8');

    $nomeCategoria = addslashes($_POST['nomeCategoria']);
    $categoriapai = addslashes($_POST["categoria-pai"]);
    $descricao = addslashes($_POST["descricao"]);

    $contCategoria = "SELECT nome FROM categoria_curso WHERE nome = '$nomeCategoria'";

    $queryCategoria = $banco->query($contCategoria);

    if($queryCategoria->num_rows > 0 ) {
        echo "Nome de categoria já existente";        
        $banco->close();
    } else{
        $sqlInsertCat = "INSERT INTO categoria_curso VALUES (NULL, '$nomeCategoria', '$descricao');";

        $banco->query($sqlInsertCat);

        $sqlSelectId = "select c.idcategoria from categoria_curso c where c.nome = '$nomeCategoria'";

        $resulSelectId = $banco->query($sqlSelectId);
        $row = mysqli_fetch_array($resulSelectId);
        $idcate = $row['idcategoria'];

        $sqlcatpai = "INSERT INTO catego_pai VALUES(NULL, '$categoriapai', $idcate)";

        $banco->query($sqlcatpai);

        $banco->close();
        echo "Categoria criada com sucesso!";
    }

}

function alterarCategoria(){
    $banco = abritBanco();
    $banco->set_charset('utf8');

    $idcategoria = addslashes($_POST["id"]);
    $nomeCategoria = addslashes($_POST["nomeCategoria"]);
    $categoriapai = addslashes($_POST["categoria-pai"]);
    $descricao = addslashes($_POST["descricao"]);

    $contCategoria = "SELECT nome FROM categoria_curso WHERE nome = '$nomeCategoria' and idcategoria != '$idcategoria'";

    $queryCategoria = $banco->query($contCategoria);

    if($queryCategoria->num_rows > 0) {
        echo "Nome de categoria já existente";        
        $banco->close();
    } else{

        $sql = "UPDATE categoria_curso cc INNER JOIN catego_pai cp ON cp.id_categoria = cc.idcategoria SET cc.nome = '$nomeCategoria', cc.descricao = '$descricao', cp.nome = '$categoriapai' WHERE cc.idcategoria = $idcategoria";

        $banco->query($sql);
        $banco->close();
        echo "Categoria alterado com sucesso!";
    }
}

function selectIdCategoria($id) {
    $banco = abritBanco();
    $banco->set_charset('utf8');

    $sql = "SELECT cc.idcategoria, cc.nome, cc.descricao, cp.nome AS categoriapai FROM categoria_curso cc INNER JOIN catego_pai cp ON cp.id_categoria = cc.idcategoria WHERE cc.idcategoria = ".$id;

    $resultado = $banco->query($sql);
    $banco->close();
    $categoria = mysqli_fetch_assoc($resultado);
    return $categoria;
}

function excluirCategoria(){
    $banco = abritBanco();
    $banco->set_charset('utf8');

    $idcategoria = $_POST['id'];
    $opcao = $_POST['opcao'];
    $categoriaSelecionada = $_POST['categoria'];

    if($opcao ==  "excluirCategoria"){

        $sql1="delete from catego_pai where id_categoria = '$idcategoria'";
        $sql2="delete from curso where id_categoria = '$idcategoria'";
        $sql3="delete from categoria_curso where idcategoria = '$idcategoria'";

        $banco->query($sql1);
        $banco->query($sql2);
        $banco->query($sql3);
        $banco->close();
        echo "Categoria e cursos excluidos com sucesso!";

    } else if ($opcao ==  "moverCategoria"){

        $sqlIdCategoria = "SELECT c.idcategoria FROM categoria_curso c         WHERE c.nome = '$categoriaSelecionada'";

        $sqlIdCurso = "SELECT cs.idcurso FROM curso cs INNER JOIN categoria_curso cc ON cc.idcategoria = cs.id_categoria WHERE cc.idcategoria = '$idcategoria'";

        $sqlResultIdCurso = $banco->query($sqlIdCurso);
        $sqlResultIdCategoria = $banco->query($sqlIdCategoria);

        $rowCategoria = mysqli_fetch_assoc($sqlResultIdCategoria);

        if($sqlResultIdCurso->num_rows > 0) {
            while($row = $sqlResultIdCurso->fetch_assoc()) {

                $sqlAlteraCurso = "UPDATE curso SET id_categoria = " .$rowCategoria['idcategoria'] ." WHERE idcurso = " .$row['idcurso'];

                $banco->query($sqlAlteraCurso);
                
            }
            
        }

        $sqlDeleteCatePai = "delete from catego_pai where id_categoria = '$idcategoria'";
        $sqlDeleteCate = "delete from categoria_curso where idcategoria = '$idcategoria'";

        $banco->query($sqlDeleteCatePai);
        $banco->query($sqlDeleteCate);
        $banco->close();

        echo "Cursos movidos e categoria excluida com sucesso!";
    } 
}

function criarCurso(){

    $banco = abritBanco();
    $banco->set_charset('utf8');

    $categoria = addslashes($_POST["categoria"]);
    $nomeCurso = addslashes($_POST["nomecurso"]);
    $nomeBreveCurso = addslashes($_POST["nomebrevecurso"]);
    $descricao = addslashes($_POST["descricao"]);

    $contNomeCurso = "SELECT c.nomecompleto FROM curso c WHERE c.nomecompleto = '$nomeCurso'";

    $contNomeBreveCurso = "SELECT c.nomebreve FROM curso c WHERE c.nomebreve = '$nomeBreveCurso'";

    $querynomeCurso = $banco->query($contNomeCurso);
    $querynomeBreveCurso = $banco->query($contNomeBreveCurso);

    if($querynomeCurso->num_rows > 0) {
        echo "Nome de curso já existente";
        $banco->close();
    } else if($querynomeBreveCurso->num_rows > 0) {
        echo "Nome breve do curso já existente";
        $banco->close();
    } else{
        $sql = "INSERT INTO curso VALUES(NULL, '$nomeCurso', '$nomeBreveCurso', '$descricao', '$categoria')";

        $banco->query($sql);
        $banco->close();
        echo "Curso criado com sucesso!";
    }
}

function excluirCurso(){

    $banco = abritBanco();
    $banco->set_charset('utf8');

    $idcurso = $_POST['id'];
    
    $sqlDelInsc = "DELETE FROM inscricao_curso WHERE id_curso = " .$idcurso;
    $banco->query($sqlDelInsc);

    $sqlDelCurso = "DELETE FROM curso WHERE idcurso = " .$idcurso;
    $banco->query($sqlDelCurso);

    $banco->close();

    retornaCurso();    

}

function retornaCurso(){
   $retornaCurso = header('Location: listacurso.php');
   return $retornaCurso;
}

function selectIdCurso($id) {
    $banco = abritBanco();
    $banco->set_charset('utf8');

    $sql = "SELECT idcurso, nomecompleto, nomebreve, descricao, id_categoria FROM curso WHERE idcurso = ".$id;

    $resultado = $banco->query($sql);
    $banco->close();
    $curso = mysqli_fetch_assoc($resultado);
    return $curso;
}

function alterarCurso(){
    $banco = abritBanco();
    $banco->set_charset('utf8');

    $idcurso = addslashes($_POST["id"]);
    $categoria = addslashes($_POST["categoria"]);
    $nomeCurso = addslashes($_POST["nomecurso"]);
    $nomeBreveCurso = addslashes($_POST["nomebrevecurso"]);
    $descricao = addslashes($_POST["descricao"]);

    $contCurso = "SELECT nomebreve FROM curso WHERE nomebreve = '$nomeBreveCurso' and idcurso != '$idcurso'";

    $queryCurso = $banco->query($contCurso);

    if($queryCurso->num_rows > 0) {
        echo "Nome breve de curso já existente";

    } else {

        $selectIdCategoria = "SELECT idcategoria FROM categoria_curso WHERE nome = '$categoria'";

        $resultado = $banco->query($selectIdCategoria);
        $id_categoria = mysqli_fetch_assoc($resultado);

        $sql = "UPDATE curso cs INNER JOIN categoria_curso cc ON cc.idcategoria = cs.id_categoria SET cs.nomecompleto = '$nomeCurso', cs.nomebreve = '$nomeBreveCurso', cs.descricao = '$descricao', cs.id_categoria = " .$id_categoria['idcategoria'] ." WHERE idcurso = $idcurso";

        $banco->query($sql);
        echo "Curso alterado com sucesso!";
        
    }

    $banco->close();
}

function listaDeCurso(){
    $banco = abritBanco();
    $banco->set_charset('utf8');    

    $sql = "SELECT nomecompleto FROM curso";

    $resultado = $banco->query($sql);

    $query = $banco->prepare("SELECT nomecompleto FROM curso");
    $query->execute();
    $query->store_result();

    $rows = $query->num_rows;

    for($i=1; $i>=1 && $i<=$rows; $i++) {
        $dadosCurso[$i] = mysqli_fetch_assoc($resultado);
    }

    $banco->close();

    return $dadosCurso;
}

function inscreverUsuario(){
    $banco = abritBanco();
    $banco->set_charset('utf8');

    $idcurso = $_POST['idcurso'];    
    $idusuario = $_POST['usuario'];

    $numPosicoes = count($idusuario);

    for($i=0; $i>=0 && $i<$numPosicoes; $i++) {
        $sql = "INSERT INTO inscricao_curso VALUES(NULL, $idcurso, " .$idusuario[$i] .")";
        $banco->query($sql);

    }

    echo "Usuário(s) inscrito(s) com sucesso!";

    $banco->close();

}