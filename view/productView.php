<?php

class ProductView
{
    public function showProducts($productsList)
    {
        echo "<div id='product' class='content'>";
        echo "<h2>Products</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>product name</th>";
        echo "<th>product brand</th>";
        echo "<th>measurement unit</th>";
        echo "<th>measurement value</th>";
        echo "<th>property type</th>";
        echo "<th>property value</th>";
        echo "<th>quantity</th>";
        echo "<th>date</th>";
        echo "<th>price</th>";
        echo "<th></th>";
        echo "</tr>";
        foreach ($productsList as $product) {
            echo "<tr>";
            echo "<td>" . $product[0] . "</td>";
            echo "<form action='index.php?product=editProduct' method='post'>";
            echo "<td><input type='text' name='productName' value='" . $product[1] . "'></td>";
            echo "<td><input type='text' name='productBrand' value='" . $product[2] . "'></td>";
            echo "<td><input type='text' name='measurementUnit' value='" . $product[3] . "'></td>";
            echo "<td><input type='text' name='measurementValue' value='" . $product[4] . "'></td>";
            echo "<td><input type='text' name='propertyType' value='" . $product[5] . "'></td>";
            echo "<td><input type='text' name='propertyValue' value='" . $product[6] . "'></td>";
            echo "<td><input disabled type='text' name='quantity' value='" . $product[7] . "'></td>";
            echo "<td><input disabled type='text' name='date' value='" . $product[8] . "'></td>";
            echo "<td><input type='text' name='price' value='" . $product[9] . "'></td>";
            echo "<td><input type='submit' name='editProductBtn' value='edit'><input type='submit' name='deleteProductBtn' value='delete'></td>";
            echo "<input hidden name='idProduct' value='" . $product[0] . "'>";
            echo "</form>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<hr>";
        echo "</div>";
    }

    public function createProduct()
    {
        echo "<form id='createProduct' action='index.php?product=createProduct' method='post'>";

        echo "<label for='productName'>product name</label>";
        echo "<input id='productName' type='text' name='productName' placeholder='product name'>";

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
