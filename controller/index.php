<?php

require_once("model/index.php");

class controller
{
  static function index()
  {
    require_once("view/index.php");
  }

  static function login()
  {
    $username = $_GET["username"];
    $password = $_GET["password"];
    $model = new model();
    if ($model->checkLogin($username, $password) == true) {
      session_start();
      $_SESSION["username"] = $username;
      require_once("./view/login.php");
    } else {
      header("Location: /store");
    }
  }

  static function close()
  {
    session_destroy();
    header("Location: /store");
  }

  static function create()
  {
    $user = $_GET["username"];
    $pass1 = $_GET["password"];
    $pass2 = $_GET["password2"];

    $model = new model();
    // check if the username exist
    $obj = $model->checkUser($user);

    // 1 if it exists
    // 0 if it does not exist
    $user_existence = $obj->num_rows;

    if ($pass1 == $pass2 && $user_existence == 0) {
      $model->create($user, $pass1, $pass2);
      header("Location: /store");
    } else {
      header("Location: /store/index.php?flag=signup");
    }
  }

  static function signup()
  {
    require_once("view/signup.php");
  }
}
