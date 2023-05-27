<?php

class ProductView
{

    public function showProducts($productsList)
    {
        echo "<ul id='product' class='content'>";
        foreach ($productsList as $product) {
            echo "<li>" . $product . "</li>";
        }
        echo "</ul>";
    }

    public function createProduct()
    {
        echo "<form id='createProduct' action='index.php?product=create' method='post'>";
        echo "<input type='text' name='name'>";
        echo "<input type='submit' value='create product'>";
        echo "</form>";
    }
}
