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

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="profil.php?id_user=<?= $_SESSION['userinfo']['id'] ?>">Bienvenue <?php echo $_SESSION['userinfo']['nom'] ." ".$_SESSION['userinfo']['prenom'] ?></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0" method="POST">
        <div class="input-group">
        <button type="button" class="dropbtn" data-toggle="modal" data-target="#exampleModalLong" style="background: url('<?= $_SESSION['userinfo']['photo_profil'] ?>'); background-size: contain;"></button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Information sur votre compte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="photo_profil" style="text-align: center;"><img style="width: 90px; height: 90px; border-radius: 50%; border: 1px solid gray;" src="  <?= $_SESSION['userinfo']['photo_profil'] ?>"/>
                </p>
                <div class="form-group">
                  <input type="text" class="form-control" name="identifie" value="<?= $_SESSION['userinfo']['username'] ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="nom" value="<?= $_SESSION['userinfo']['nom'] ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="prenom" value="<?= $_SESSION['userinfo']['prenom'] ?>">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="passwd" value="<?= $_SESSION['userinfo']['password'] ?>">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-success">Enregistrer vos modification</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="profil.php?id_user=<?= $_SESSION['userinfo']['id'] ?>">
            <i class="fa fa-home"></i>
            <span>Votre cloud</span>
          </a>
        </li>
        <li class="nav-item">
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
            <li class="breadcrumb-item">
              <a href=""><i class="fa fa-home"></i> Mon Cloud</a>
            </li>
          </ol>
        </div>
        <!-- /.container-fluid -->
        <div class="container" style="border: 1px solid gray; padding: 350px; border-radius: 10px;">
          <?php include_once('espace_baptiste'); ?>
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
