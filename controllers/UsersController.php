<?php


/**
 * Class UsersController
 */
class UsersController
{

  public function login()
  {
    if (isset($_POST['submit'])) {
      $data['pseudo'] = $_POST['pseudo'];
      $result = User::authentificate($data);
      if ($result->pseudo === $_POST['pseudo'] && password_verify($_POST['password'], $result->password)) {
        $_SESSION['logged'] = true;
        $_SESSION['pseudo'] = $result->pseudo;
        Redirect::to('home');
      } else {
        Session::set('error', 'Pseudo ou mot de passe est Incorrect');
        Redirect::to('login');
      }
    }
  }

  public function register()
  {
    if(isset($_POST['submit'])) {
      $options = [ 'cost' => 12 ];
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
      $data = array(
        'fullname' => $_POST['fullname'],
        'pseudo' => $_POST['pseudo'],
        'password' => $password,
      );

      $result = User::createUser($data);
      if ($result === 'ok') {
        Session::set('success', 'Compte crée');
        Redirect::to('login');
      } else {
        echo $result;
      }
  }

 }

 public static function logout()
 {
   session_destroy();
 }
}



 ?>
