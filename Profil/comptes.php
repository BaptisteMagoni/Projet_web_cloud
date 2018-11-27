<?php 
  session_start();
  $adresse = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].$_SERVER["REQUEST_URI"];
  $_SESSION['adresse'] = $adresse;
  include_once('../data_base.php');
  include_once('formulaire_ajout_membre.php');

  if(isset($_POST['deconnexion'])){
    include_once('../deconnexion.php');
  }

  $req_users = $bdd->query("SELECT * FROM users");
  
  if(isset($_POST['supprimer'])){
    $id_user = (int) $_GET['supprimer'];
    $req_user = $bdd->query("DELETE FROM users WHERE id=".$id_user);
    $list = array();
    $list = explode("&", $adresse);
    header("Location: ".$list[0]);
  }

  if(isset($_POST['modifier'])){
    $id_user = (int) $_GET['modifie'];
    //$req_user = $bdd->query("DELETE FROM users WHERE id=".$id_user);
    $list = array();
    $list = explode("&", $adresse);
    header("Location: ".$list[0]);
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
        <li class="nav-item">
          <a class="nav-link" href="share.php?id_user=<?= $_SESSION['userinfo']['id'] ?>">
            <i class="fa fa-folder-open"></i>
            <span>Fichier partagé</span></a>
        </li>
        <?php if($_SESSION['userinfo']['grade'] == "Administrateur"){ ?>
        <li class="nav-item active">
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
              <li class="breadcrumb-item active" style="color: black;"><i class="fas fa-fw fa-table"></i> Gestion de comptes</li>
            </ol>
            <table class="table table-striped table-dark">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom d'utilisateur</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prenom</th>
                  <th scope="col">Grade</th>
                  <th scope="col">Suppression</th>
                  <th scope="col">Modification</th>
                </tr>
              </thead>
              <tbody>
                <?php while($m = $req_users->fetch()){ $gp = array($m);?>
                <tr>
                  <th scope="row"><?=$m['id']?></th>
                  <th><?=$m['username']?></th>
                  <th><?=$m['nom']?></th>
                  <th><?=$m['prenom']?></th>
                  <th><?=$m['grade']?></th>
                  <th>
                    <form method="POST" action="<?= $adresse."&supprimer=".$m['id'] ?>">
                      <button type="submit" name="supprimer" class="btn btn-danger">Supprimer</button>
                    </form>
                  </th>
                  <th>
                    <form method="POST" action="<?= $adresse."&modifie=".$m['id'] ?>">
                      <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
                    </form>
                  </th>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <form method="POST">
              <div align="center">
                <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#exampleModalLong">Ajouter un nouvelle utilisateur</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <input type="text" class="form-control" name="identifie" placeholder="Identifiant">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="nom" placeholder="Nom">
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="passwd" placeholder="Mot de passe">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" name="valide" class="btn btn-success">Valider</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
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