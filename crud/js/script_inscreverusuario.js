$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();

	$('#meuModal').on('shown.bs.modal', function () {
		$('#meuInput').trigger('focus');
	})	

	$(function() {
		$(".auto").autocomplete({
			source: "search.php",
			minLength: 1
		});
	});

	$(function () {
		$('#dadosUsuario').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				type: 'post',
				url: 'conexao.php',
				data: $('form').serialize(),
				success: function (data) {
					alert(data);					
				}
			});
		});
	});

});	
