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
					if (data == "Curso alterado com sucesso!") {
						window.location.href = "listacurso.php";
					} else if (data == "Nome breve de curso já existente") {
						$(function() {
							$("#nomebrevecurso").focus();
						});					
					}				
				}
			});
		});
	});
});
