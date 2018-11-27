<?php 
  session_start();
  $adresse = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].$_SERVER["REQUEST_URI"];
  $_SESSION['adresse'] = $adresse;
  include_once('../data_base.php');
  if(isset($_POST['deconnexion'])){
    include_once('../deconnexion.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cloud</title>

    <?php 
    include_once('lib.php');
    ?>

  </head>

  <body id="page-top">

    <?php include_once('nav.php') ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="profil.php?id_user=<?= $_SESSION['userinfo']['id'] ?>">
            <i class="fa fa-home"></i>
            <span>Votre cloud</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="share.php?id_user=<?= $_SESSION['userinfo']['id'] ?>">
            <i class="fa fa-folder-open"></i>
            <span>Fichier partagé</span></a>
        </li>
        <?php if($_SESSION['userinfo']['grade'] == "Administrateur"){ ?>
        <li class="nav-item">
          <a class="nav-link" href="comptes.php?id_user=<?= $_SESSION['userinfo']['id'] ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Gestion de comptes</span></a>
        </li>
        <?php } ?>
        <?php if($_SESSION['userinfo']['grade'] == "Administrateur" || $_SESSION['userinfo']['grade'] == "Developpeur"){ ?>
        <li class="nav-item">
          <a class="nav-link" href="developeur.php?id_user=<?=$_SESSION['userinfo']['id'] ?>">
            <i class="fa fa-gears"></i>
            <span>Option développeur</span></a>
        </li>
        <?php } ?>
      </ul>

      <div id="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb" style="background: #C0C0C0;">
              <li class="breadcrumb-item active" style="color: black;"><i class="fa fa-folder-open"></i> Fichier partagé</li>
            </ol>
          </div>
          <!-- Sticky Footer -->
          <footer class="sticky-footer">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright © Your Website <?= date("Y") ?></span>
              </div>
            </div>
          </footer>

        </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>