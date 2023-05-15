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
}
