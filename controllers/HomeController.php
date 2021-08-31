<?php


/**
 * Class HomeController
 */
class HomeController
{

  public function index($page)
  {
    include("views/$page.php");
  }

}



 ?>
