<?php 
namespace views;
?>
<!DOCTYPE html>
<html lang="en">

    <?php include_once (VIEWS."headAdmin.php");?>

  <body id="page-top">

      <?php include_once (VIEWS."navAdmin.php");?>

    <div id="wrapper">
      <?php include_once (VIEWS."sidebarAdmin.php");?>

      <div id="content-wrapper">

        <div class="container-fluid">


            <h3>Crear Categoria</h3>

            <form action="<?php echo BASE; ?>category/create" method="post">
                <div class="form-group">
                    <label for="descrption">Descripcion de categoria:</label>
                    <input type="text" class="form-control" id="description" placeholder="Descripcion" name="description" required>
                </div>

                <button type="submit" class="btn btn-primary">Crear categoria</button>
            </form>
            
            <hr>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i> Categorias
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Descripcion</th>
                      <th>ID</th>
                      <th></th><!-- para el boton de borrar-->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Titulo</th>
                      <th>Categoria</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php if($list != false) { ?>
                  <?php foreach ($list as $key => $category){ ?>
                    <tr>
                      <td><?php echo $category->getDescription(); ?></td>
                      <td><?php echo $category->getId(); ?></td>
                      <td> <form class="text-center" action="<?php echo BASE; ?>category/delete" method="post">
          <button type="submit" class="btn btn-danger" name="dni" value="<?php echo $category->getDescription();?>"><i class="fas fa-trash"></i></button>
          </form> </td>
                    </tr>
                    <?php } }?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo BASE; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo BASE; ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo BASE; ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo BASE; ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo BASE; ?>assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo BASE; ?>assets/js/demo/datatables-demo.js"></script>
    <script src="<?php echo BASE; ?>assets/js/demo/chart-area-demo.js"></script>

  </body>

</html>