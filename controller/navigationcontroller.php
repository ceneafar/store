<?php
require_once("controller/usercontroller.php");
require_once("controller/productcontroller.php");

class navigationController
{

    static function products()
    {
        $products = new productController();
        session_start();
        $products->index();
        $_SESSION["content"] = "<p>prop1</p>";

        require_once("./view/login.php");
    }

    static function clients()
    {
        session_start();
        $_SESSION["content"] = "<p>prop2</p>";
        require_once("./view/login.php");
    }
}
