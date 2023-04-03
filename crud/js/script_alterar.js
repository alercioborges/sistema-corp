//mascaras
$(document).ready(function(){
  $("#cep").mask("00000-000");
  $("#telefone").mask("(00) 0000-00009");

  $("#telefone").blur(function(event){
    if ($(this).val().length == 15){
      $("#telefone").mask("(00) 00000-0009")
    }else{
      $("#telefone").mask("(00) 0000-00009")
    }
  })
});

//focus no username
$(function() {
  $("#username").focus();
});

//alert para username e email já existemtes
$(function () {
  $('form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'post',
      url: 'conexao.php',
      data: $('form').serialize(),
      success: function (data) {
        alert(data);
        if (data == "Usuário alterado com sucesso!") {
          window.location.href = "visualizar.php";
        } else if (data == "Nome de usuário já existente") {
          $(function() {
            $("#username").focus();
          });
        } else if (data == "E-mail Já existente") {
          $(function() {
            $("#email").focus();
          });
        }
      }
    });
  });
});

//Consulta CEP
$(document).ready(function() {

  function limpa_formulario_cep() {
//Limpa valores do formulário de cep.
$("#cep").val("");
$("#logradouro").val("");
$("#bairro").val("");
$("#cidade").val("");
$("#estado").val("");
$("#cidadeibge").val("");
}

function apenas_leitura(){

  $("#logradouro").attr("readonly", true);
  $("#bairro").attr("readonly", true);
  $("#cidade").attr("readonly", true);
  $("#estado").attr("readonly", true);
  $("#cidadeibge").attr("readonly", true);

}

function liberar_edicao(){
  $("#logradouro").removeAttr("readonly");
  $("#bairro").removeAttr("readonly");
  $("#cidade").removeAttr("readonly");
  $("#estado").removeAttr("readonly");
  $("#cidadeibge").removeAttr("readonly");
}

//Quando o campo cep perde o foco.
$("#cep").blur(function() {

//Nova variável "cep" somente com dígitos.
var cep = $(this).val().replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

//Expressão regular para validar o CEP.
var validacep = /^[0-9]{8}$/;

//Valida o formato do CEP.
if(validacep.test(cep)) {

//Preenche os campos com "..." enquanto consulta webservice.
$("#logradouro").val("pesquisando...");
$("#bairro").val("pesquisando...");
$("#cidade").val("pesquisando...");
$("#estado").val("pesquisando...");
$("#cidadeibge").val("pesquisando...");
apenas_leitura();

//Consulta o webservice viacep.com.br/
$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

  if (!("erro" in dados)) {
//Atualiza os campos com os valores da consulta.
$("#logradouro").val(dados.logradouro);
$("#bairro").val(dados.bairro);
$("#cidade").val(dados.localidade);
$("#estado").val(dados.uf);
$("#cidadeibge").val(dados.ibge);
$("#numero").focus();
apenas_leitura();
} //end if.
else {
//CEP pesquisado não foi encontrado.
limpa_formulario_cep();
//$("#cep").focus();
alert("CEP não encontrado.");
liberar_edicao();
$("#cep").focus();
}
});
} //end if.
else {
//cep é inválido.
limpa_formulario_cep();
//$("#cep").focus();
alert("Formato de CEP inválido.");
liberar_edicao();
$(function() {
  $("#cep").focus();
});
}
} //end if.
else {
//cep sem valor, limpa formulário.
limpa_formulario_cep();
liberar_edicao();
}
});
});
