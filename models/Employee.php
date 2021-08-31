<?php

/**
 * Class Employee
 */
class Employee
{
  public static function getAll()
  {
    $statement = DB::connect()->prepare("SELECT * FROM employees");
    $statement->execute();
    return $statement->fetchAll();
    $statement->close();
    $statement = null;
  }

  public function getEmploye($data)
  {
    $id = $data['id'];

    try {
      $query = "SELECT * FROM employees WHERE id=:id";
      $statement = DB::connect()->prepare($query);
      $statement->execute(array(":id" => $id));
      $emp = $statement->fetch(PDO::FETCH_OBJ);
      return $emp;
    } catch(PDOException $ex) {
      echo "Error" . $ex->getMessage();
    }


  }

  public static function add($data)
  {
    $statement = DB::connect()->prepare("INSERT INTO employees (
      nom,prenom,matricule,depart,poste,date_emb,status )
      VALUES (:nom,:prenom,:matricule,:depart,:poste,:date_emb,:status)");

      $statement->bindParam(':nom', $data['nom']);
      $statement->bindParam(':prenom', $data['prenom']);
      $statement->bindParam(':matricule', $data['matricule']);
      $statement->bindParam(':depart', $data['depart']);
      $statement->bindParam(':poste', $data['poste']);
      $statement->bindParam(':date_emb', $data['date_emb']);
      $statement->bindParam(':status', $data['status']);

      if ($statement->execute()) {
        return 'ok';
      } else {
        return 'error';
      }
      $statement->close();
      $statement = null;
  }

  public static function searchEmployee($data)
  {
    $search = $data['search'];

    try {
      $query = "SELECT * FROM employees WHERE nom LIKE ? OR prenom LIKE ?";
      $statement = DB::connect()->prepare($query);
      $statement->execute(array("%" . $search . "%", "%" . $search . "%"));
      $employees = $statement->fetchAll();
      return $employees;
    } catch(PDOException $ex) {
      echo "Error" . $ex->getMessage();
    }
  }

  public static function update($data)
  {
    $statement = DB::connect()->prepare("UPDATE employees SET
      nom = :nom ,prenom = :prenom, matricule = :matricule, depart = :depart, poste = :poste,
      date_emb = :date_emb, status = :status WHERE id= :id");

      $statement->bindParam(':id', $data['id']);
      $statement->bindParam(':nom', $data['nom']);
      $statement->bindParam(':prenom', $data['prenom']);
      $statement->bindParam(':matricule', $data['matricule']);
      $statement->bindParam(':depart', $data['depart']);
      $statement->bindParam(':poste', $data['poste']);
      $statement->bindParam(':date_emb', $data['date_emb']);
      $statement->bindParam(':status', $data['status']);

      if ($statement->execute()) {
        return 'ok';
      } else {
        return 'error';
      }
      $statement->close();
      $statement = null;
  }

  public static function delete($data)
  {
    $id = $data['id'];
    try {
      $query = "DELETE FROM employees WHERE id=:id";
      $statement = DB::connect()->prepare($query);
      $statement->execute(array(":id" => $id));
      if ($statement->execute()) {
        return 'ok';
      }
    } catch(PDOException $ex) {
      echo "Error" . $ex->getMessage();
    }
  }
}


 ?>
