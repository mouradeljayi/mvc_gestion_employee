<?php

/**
 * Class User
 */
class User
{

  public static function authentificate($data)
  {
    $pseudo = $data['pseudo'];
    try {
      $query = "SELECT * FROM users WHERE pseudo=:pseudo";
      $statement = DB::connect()->prepare($query);
      $statement->execute(array(":pseudo" => $pseudo));
      $user = $statement->fetch(PDO::FETCH_OBJ);
      return $user;
      if ($statement->execute()) {
        return 'ok';
      }
    } catch (PDOException $e) {
      echo 'Error' . $e->getMessage();
    }

  }

  public static function createUser($data)
  {
    $statement = DB::connect()->prepare("INSERT INTO users (
      fullname,pseudo,password )
      VALUES (:fullname,:pseudo,:password)");

      $statement->bindParam(':fullname', $data['fullname']);
      $statement->bindParam(':pseudo', $data['pseudo']);
      $statement->bindParam(':password', $data['password']);

      if ($statement->execute()) {
        return 'ok';
      } else {
        return 'error';
      }
      $statement->close();
      $statement = null;
  }




}


 ?>
