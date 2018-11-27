<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="profil.php?id_user=<?= $_SESSION['userinfo']['id'] ?>">Bienvenue <?php echo $_SESSION['userinfo']['nom'] ." ".$_SESSION['userinfo']['prenom'] ?></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0" method="POST">
        <div class="input-group">
        <button class="btn btn-secondary" type="submit" name="deconnexion">Déconnexion</button>
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