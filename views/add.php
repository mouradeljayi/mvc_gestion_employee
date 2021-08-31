<?php
if (isset($_POST['submit'])) {

  $data = new EmployeeController();
  $employees = $data->createEmploye();
}

?>

<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h4>Ajouter Employé</h4>
      <a href="<?php echo BASE_URL;?>" class="btn btn-secondary mb-2">Home</a>
      <div class="card">
        <div class="card-body bg-light">
          <div class="table-responsive">
            <form method="post">
              <div class="form-group">
                <label>Nom*</label>
                <input type="text" name="nom" class="form-control">
              </div>
              <div class="form-group">
                <label>Prénom*</label>
                <input type="text" name="prenom" class="form-control">
              </div>
              <div class="form-group">
                <label>Matricule*</label>
                <input type="text" name="matricule" class="form-control">
              </div>
              <div class="form-group">
                <label>Département*</label>
                <input type="text" name="depart" class="form-control">
              </div>
              <div class="form-group">
                <label>Poste*</label>
                <input type="text" name="poste" class="form-control">
              </div>
              <div class="form-group">
                <label>Date Embauche*</label>
                <input type="date" name="date_emb" class="form-control">
              </div>
              <div class="form-group">
                <label>Status*</label>
                <select class="form-control" name="status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>
              <div class="form-group mt-4">
                <button type="submit" class="btn btn-success" name="submit">Ajouter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
