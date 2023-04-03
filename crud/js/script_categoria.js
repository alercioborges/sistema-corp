$(document).ready(function(){
	$(function () {
		$('form').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				type: 'post',
				url: 'conexao.php',
				data: $('form').serialize(),
				success: function (data) {
					alert(data);
					if (data == "Categoria criada com sucesso!") {
						window.location.href = "listacategoria.php";
					} else if (data == "Nome de categoria já existente") {
						$(function() {
							$("#nomeCategoria").focus();
						});					
					}				
				}
			});
		});
	});
});
