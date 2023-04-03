$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();

	$('#meuModal').on('shown.bs.modal', function () {
		$('#meuInput').trigger('focus');
	})
});