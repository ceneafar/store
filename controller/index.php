<?php

require_once("model/index.php");
class controller
{
  static function index()
  {
    require_once("view/index.php");
  }

  static function signup()
  {
    require_once("view/signup.php");
  }
}
