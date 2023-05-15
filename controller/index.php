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
    $username = $_POST["username"];
    $password = $_POST["password"];
    $model = new model();
    if ($model->checkLogin($username, $password) == true) {
      session_start();
      $_SESSION["username"] = $username;
      $_SESSION["content"] = "";
      require_once("./view/login.php");
    } else {
      setcookie("message", "username or password invalid");
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
    $user = $_POST["username"];
    $pass1 = $_POST["password"];
    $pass2 = $_POST["password2"];

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
