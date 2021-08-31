<?php
if(isset($_POST['submit'])) {
  $createUser = new UsersController();
  $createUser->register();
}
?>

<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Inscription</h4>
      <a href="<?php echo BASE_URL;?>login" class="mb-3">Connexion</a>
      <div class="card">
        <div class="card-body bg-light">
            <form method="post">
              <div class="mb-3">
                <input type="text" name="fullname" placeholder="Nom et Prénom" class="form-control">
              </div>
              <div class="mb-3">
                <input type="text" name="pseudo" placeholder="Pseudo" class="form-control">
              </div>
              <div class="mb-3">
                <input type="password" name="password" placeholder="Mot de passe" class="form-control">
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">S'inscrire</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
