<?php
if(isset($_POST['submit'])) {
  $loginUser = new UsersController();
  $loginUser->login();
}
?>

<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Connexion</h4>
      <a href="<?php echo BASE_URL;?>register" class="mb-3">Inscription</a>
      <div class="card">
        <div class="card-body bg-light">
            <form method="post">
              <div class="mb-3">
                <input type="text" name="pseudo" placeholder="Pseudo" class="form-control">
              </div>
              <div class="mb-3">
                <input type="password" name="password" placeholder="Mot de passe" class="form-control">
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit">Se connectez</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
