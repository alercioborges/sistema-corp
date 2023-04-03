$(document).ready(function() {
	$('#opcao').change(function() {
		if ($(this).val() == 'moverCategoria') {
			$('.categoria').show();
			$("#categoria").prop('required',true);
		} else {
			$('.categoria').hide();
			$("#categoria").prop('required',false);
		}		
	});

	$(function () {
		$('form').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				type: 'post',
				url: 'conexao.php',
				data: $('form').serialize(),
				success: function (data) {
					alert(data);
					if (data == "Categoria e cursos excluidos com sucesso!") {
						window.location.href = "listacategoria.php";
					} else if (data == "Cursos movidos e categoria excluida com sucesso!") {
						window.location.href = "listacategoria.php";
					}
				}
			});
		});
	});
});

