<?php

/**
 * Class EmployeeController
 */
class EmployeeController
{

  public function getAllEmployees()
  {
    $employees = Employee::getAll();
    return $employees;
  }

  public function getOneEmploye()
  {
    if (isset($_POST['id'])) {
      $data = array(
        'id' => $_POST['id']
      );
      $emp = Employee::getEmploye($data);
      return $emp;
    }

  }

  public function findEmployes()
  {
    if (isset($_POST['search'])) {
      $data = array('search' => $_POST['search']);
    }
    $employees = Employee::searchEmployee($data);
    return $employees;
  }

  public function createEmploye()
  {
    if(isset($_POST['submit'])) {
      $data = array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'matricule' => $_POST['matricule'],
        'depart' => $_POST['depart'],
        'date_emb' => $_POST['date_emb'],
        'poste' => $_POST['poste'],
        'status' => $_POST['status'],
      );

      $result = Employee::add($data);
      if ($result === 'ok') {
        Session::set('success', 'Employé Ajouté');
        Redirect::to('home');
      } else {
        echo $result;
      }
    }
  }

  public function updateEmploye()
  {
    if(isset($_POST['submit'])) {
      $data = array(
        'id' => $_POST['id'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'matricule' => $_POST['matricule'],
        'depart' => $_POST['depart'],
        'date_emb' => $_POST['date_emb'],
        'poste' => $_POST['poste'],
        'status' => $_POST['status'],
      );

      $result = Employee::update($data);
      if ($result === 'ok') {
        Session::set('success', 'Employé Modifié');
        Redirect::to('home');
      } else {
        echo $result;
      }
    }
  }

  public function deleteEmploye()
  {
    if (isset($_POST['id'])) {
      $data['id'] = $_POST['id'];
      $result = Employee::delete($data);
      if ($result === 'ok') {
        Session::set('success', 'Employé Supprimé');
        Redirect::to('home');
      } else {
        echo $result;
      }
    }
  }
}




 ?>
