<?php

require_once("model/user.php");

class userController
{
  static function showLoginView()
  {
    require_once("view/index.php");
  }

  static function showSignupView()
  {
    require_once("view/signup.php");
  }

  static function loginUser()
  {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = new user();

    if ($user->checkLogin($username, $password)) {
      session_start();
      $_SESSION["username"] = $username;
      $_SESSION["content"] = "";
      require_once("./view/login.php");
    } else {
      setcookie("message", "username or password invalid");
      header("Location: /store");
    }
  }

  static function createUser()
  {
    $username = $_POST["username"];
    $password1 = $_POST["password1"];
    $password2 = $_POST["password2"];

    $user = new user();

    // check if the username exist
    $userExistence = $user->checkUserExistence($username);

    if ($password1 == $password2 && $userExistence) {
      $user->createUser($username, $password1);
      header("Location: /store");
    } else {
      setcookie("message", "username or password invalid");
      header("Location: /store/index.php?flag=signup");
    }
  }

  static function closeSession()
  {
    session_destroy();
    header("Location: /store");
  }
}
