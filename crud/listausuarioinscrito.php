<div class="card-header">
	<i class="fas fa-table"></i>
	Usuários inscritos no curso <?php echo $colunaCurso['nomecompleto']; ?>
</div>

<div class="card-body">
	<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">E-mail</th>
					<th scope="col">Cidade</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">E-mail</th>
					<th scope="col">Cidade</th>
					<th scope="col"></th>	
				</tr>
			</tfoot>
			<tbody>
				<?php 
				$banco = abritBanco();
				$banco->set_charset('utf8');

				$sql = "SELECT ic.idinscricao, CONCAT(u.firstname, ' ', u.lastname) AS nome, u.email, e.cidade FROM inscricao_curso ic INNER JOIN usuario u ON u.idusuario = ic.id_usuario INNER JOIN endereco e ON u.idusuario = e.id_usuario INNER JOIN curso c ON c.idcurso = ic.id_curso WHERE c.idcurso = " .$colunaCurso['idcurso'];

				$resultado = $banco->query($sql); ?>
				<?php if($resultado->num_rows > 0) { ?>
					<?php while($row = $resultado->fetch_assoc()): ?>
						<tr>
							<td><?php echo $row['nome']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['cidade']; ?></td>
							<td><div data-toggle="tooltip" data-placement="top" title="Cancelar inscrição">
								<form name="cancelarInscricao" id="cancelarInscricao" action="action_cancelar_inscricao.php" method="POST" class="d-flex justify-content-center justify-content-md-center" >
									<input type="hidden" name="idInscricao" value="<?php echo $row['idinscricao']; ?>" />
									<input type="hidden" name="acao" value="cancelarInscricao" />
									<input type="image" src="imagem/trash-alt-solid-black.svg" width="20" height="20"  name="excluirCategoria" />
								</form>
							</div>
						</td>
					</tr>
				<?php endwhile ; }
				$banco->close(); ?>
			</tbody>
		</table>
	</div>
</div>
