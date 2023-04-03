$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();

	$('#meuModal').on('shown.bs.modal', function () {
		$('#meuInput').trigger('focus');
	})
});

jQuery(function($) {
	$(".confirm").click(function() {
		if (confirm("Deseja realmente excluir este usuário?")) {
			return true;
		} else {
			return false;
		}
	});
});