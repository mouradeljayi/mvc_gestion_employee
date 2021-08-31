<?php
if (isset($_POST['id'])) {

  $data = new EmployeeController();
  $emp = $data->getOneEmploye();
} else {
  Redirect::to('home');
}

if (isset($_POST['submit'])) {

  $data = new EmployeeController();
  $data->updateEmploye();
}

?>

<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Modifier Employé</h4>
      <a href="<?php echo BASE_URL;?>" class="btn btn-secondary mb-2">Home</a>
      <div class="card">
        <div class="card-body bg-light">
          <div class="table-responsive">
            <form method="post">
              <input type="hidden" name="id" value="<?php echo $emp->id ?>">
              <div class="form-group">
                <label>Nom*</label>
                <input type="text" name="nom" class="form-control" value="<?php echo $emp->nom ?>">
              </div>
              <div class="form-group">
                <label>Prénom*</label>
                <input type="text" name="prenom" class="form-control" value="<?php echo $emp->prenom ?>">
              </div>
              <div class="form-group">
                <label>Matricule*</label>
                <input type="text" name="matricule" class="form-control" value="<?php echo $emp->matricule ?>">
              </div>
              <div class="form-group">
                <label>Département*</label>
                <input type="text" name="depart" class="form-control" value="<?php echo $emp->depart ?>">
              </div>
              <div class="form-group">
                <label>Poste*</label>
                <input type="text" name="poste" class="form-control" value="<?php echo $emp->poste ?>">
              </div>
              <div class="form-group">
                <label>Date Embauche*</label>
                <input type="datetime-local" name="date_emb" class="form-control" value="<?php echo date('Y-m-d\TH:i:s', strtotime($emp->date_emb)); ?>">
              </div>
              <div class="form-group">
                <label>Status*</label>
                <select class="form-control" name="status">
                  <option value="1" <?php echo $emp->status ? "selected" : "" ?> >Active</option>
                  <option value="0" <?php echo !$emp->status ? "selected" : "" ?> >Inactive</option>
                </select>
              </div>
              <div class="form-group mt-4">
                <button type="submit" class="btn btn-warning" name="submit">Modifier</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
