<?php

if (isset($_POST['id'])) {
  $data = new EmployeeController();
  $data->deleteEmploye();
}


 ?>
