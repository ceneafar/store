<?php

class ProductView
{
    public function showProducts($productsList)
    {
        echo "<ul id='product' class='content'>";
        echo "<h2>Products</h2>";
        foreach ($productsList as $product) {
            echo "<li>" . $product . "</li>";
        }
        echo "</ul>";
    }

    public function createProduct()
    {
        echo "<form id='createProduct' action='index.php?product=createProduct' method='post'>";

        echo "<label for='productName'>product name</label>";
        echo "<input id='productName' type='text' name='name' placeholder='product name'>";

        echo "<label for='productBrand'>brand</label>";
        echo "<input id='productBrand' type='text' name='productBrand' placeholder='brand'>";

        echo "<label for='measurementUnit'>measurement unit</label>";
        echo "<input id='measurementUnit' type='text' name='measurementUnit' placeholder='measurement unit'>";

        echo "<label for='measurementValue'>measurement value</label>";
        echo "<input id='measurementValue' type='text' name='measurementValue' placeholder='measurement value'>";

        echo "<label for='propertyType'>property type</label>";
        echo "<input id='propertyType' type='text' name='propertyType' placeholder='property type'>";

        echo "<label for='propertyValue'>property value</label>";
        echo "<input id='propertyValue' type='text' name='propertyValue' placeholder='property value'>";

        echo "<input type='submit' value='create product'>";

        echo "</form>";
    }
}
