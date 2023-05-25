<?php
require_once("controller/index.php");
require_once("controller/productsController.php");

class navigation
{

    static function products()
    {
        $products = new ProductsController();
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
