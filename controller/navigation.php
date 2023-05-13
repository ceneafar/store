<?php
require_once("controller/index.php");
class navigation
{
    static function prop1()
    {
        session_start();
        $_SESSION["content"] = "<p>prop1</p>";
        require_once("./view/login.php");
    }

    static function prop2()
    {
        session_start();
        $_SESSION["content"] = "<p>prop2</p>";
        require_once("./view/login.php");
    }
}
