<?php
include('verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lista de usuários</title>
  <!--inicio imports boostrap-->
  <link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
  <!--import arquivo de estilo-->
  <link rel="stylesheet" type="text/css" href="css/style_visualizar.css">    
  <!--import dos icones-->
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">  
  <!--inicio imports manual-->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="jQuery-mask\dist\jquery.mask.min.js"></script>
  <!--script consulta cep-->
  <script src="js/script_visualizar.js"></script>
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>
<body id="page-top">
  <?php include('crud_top_bar.php'); ?>
  <div id="wrapper">    
    <?php include('crud_sidebar.php'); ?>
    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Lista de usuários</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Lista de usuários
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Cidade</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Cidade</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  include('conexao.php');
                  $banco = abritBanco();
                  $banco->set_charset('utf8');

                  $sql = 'select u.idusuario, concat(u.firstname, " ", u.lastname) AS NOME, '
                  . 'u.email AS "E-MAIL", '
                  . 'e.cidade AS CIDADE '
                  . 'from usuario u inner join endereco e on e.id_usuario = u.idusuario '
                  .'order by u.firstname, u.lastname';

                  $resultado = $banco->query($sql); ?>
                  <?php if($resultado->num_rows > 0) { ?>
                   <?php while($row = $resultado->fetch_assoc()) : ?>
                    <tr>
                      <td>
                        <form name="perfil" action="perfil.php" method="POST">
                          <input type="hidden" id="perfilID" name="id" value="<?php echo htmlspecialchars( $row['idusuario'] ) ; ?>" />              
                          <a href="perfil.php?id=<?php echo htmlspecialchars( $row['idusuario'] ) ; ?>"><?php echo htmlspecialchars( $row['NOME'] ) ; ?></a>
                        </form>
                      </td>
                      <td>
                        <?php echo htmlspecialchars( $row['E-MAIL'] ) ; ?>
                      </td>
                      <td>
                        <?php echo htmlspecialchars( $row['CIDADE'] ) ; ?>
                      </td>
                      <td>
                        <div data-toggle="tooltip" data-placement="top" title="Editar">
                          <form name="alterar" action="alterar.php" method="POST" class="d-flex justify-content-center justify-content-md-center" >
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars( $row['idusuario'] ) ; ?>" />             
                            <input type="image" src="imagem/pencil-alt-solid-black.svg" width="20" height="20"  name="editar" />                
                          </form>
                        </div>
                      </td>
                      <td>
                        <div data-toggle="tooltip" data-placement="top" title="Excluir">
                          <form name="excluir" action="conexao.php" method="POST" class="d-flex justify-content-center justify-content-md-center">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars( $row['idusuario'] ) ; ?>" />
                            <input type="hidden" name="acao" value="excluir" />
                            <input type="image" src="imagem/trash-alt-solid-black.svg" width="20" height="20"  name="excluir" class="confirm" />      
                          </form>
                        </div>
                      </td><!--end coluna excluir-->
                    </tr><!--end linha da tabela-->
                  <?php endwhile ; }              
                  $banco->close(); ?>
                </tbody>
              </table>
            </div>
          </div>              
        </div>
      </div>
      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Alercio's Corporation 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>  <!-- /#wrapper -->

  <?php include("crud_footer.php"); ?>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
