<?php

class productsView
{

    public function showProducts($list)
    {
        echo "<ul id='product' class='content'>";
        foreach ($list as $product) {
            echo "<li>" . $product . "</li>";
        }
        echo "</ul>";
    }

    public function createProduct(){
        echo "<form action='index.php?product=create' method='post' id='createProduct'>";
        echo "<input type='text' name='name'>";
        echo "<input type='text' name='returnable'>";
        echo "<input type='text' name='initial_stock'>";
        echo "<input type='submit' value='create product'>";
        echo "</form>";
    }

}
