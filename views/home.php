<?php

$data = new EmployeeController();

if (isset($_POST['find'])) {
  $employees = $data->findEmployes();
}else {
  $employees = $data->getAllEmployees();
}


?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="d-flex justify-content-between">
        <a href="<?php echo BASE_URL;?>add" class="btn btn-primary mb-2">Ajouter employe</a>
        <span><?php echo $_SESSION['pseudo'] ?></span>
        <a href="<?php echo BASE_URL;?>logout" class="btn btn-primary mb-2">Déconnexion </a>
        <div>
          <form class="d-flex" method="post">
            <input type="text" name="search" placeholder="Recherche" class="form-control me-2">
            <button type="submit" class="btn btn-success" name="find">Recherche</button>
          </form>
        </div>
      </div>
      <div class="card mt-2">
        <div class="card-body bg-light">
          <div class="table-responsive">
            <?php if(!empty($employees)) {  ?>
            <table class="table responsive-sm">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Matricule</th>
                  <th>Département</th>
                  <th>Poste</th>
                  <th>Date Embauche</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($employees as $emp ): ?>
                <tr>
                  <td> <?php echo $emp['nom'] ?> </th>
                  <td> <?php echo $emp['prenom'] ?> </th>
                  <td> <?php echo $emp['matricule'] ?> </th>
                  <td> <?php echo $emp['depart'] ?> </th>
                  <td> <?php echo $emp['poste'] ?> </th>
                  <td> <?php echo $emp['date_emb'] ?> </th>
                  <td> <?php echo $emp['status'] ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>' ?> </th>
                  <td class="d-flex justify-content-center items-center">
                    <div>
                      <form method="post" action="update">
                        <input type="hidden" name="id" value="<?php echo $emp['id'] ?>">
                        <button type="submit" class="btn btn-warning" class="mr-4">Modifier</button>
                      </form>
                    </div>
                    <div>
                      <form method="post" action="delete">
                        <input type="hidden" name="id" value="<?php echo $emp['id'] ?>">
                        <button type="submit" class="btn btn-danger  ms-2">Supprimer</button>
                      </form>
                    </div>
                 </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          <?php } else {  ?>
            <div class="text-center">
              Il n'y a aucun nom ou prénom semblable à "<?php echo $_POST['search'] ?>"
            </div>
            <?php  } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
