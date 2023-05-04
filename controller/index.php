<?php

require_once("model/index.php");
class controller
{
  static function index()
  {
    require_once("view/index.php");
  }

  static function create()
  {
    $user = $_GET["username"];
    $pass1 = $_GET["password"];
    $pass2 = $_GET["password2"];

    $model = new model();
    $model->create($user, $pass1, $pass2);
    header("Location: /store");
  }

  static function signup()
  {
    require_once("view/signup.php");
  }
}
