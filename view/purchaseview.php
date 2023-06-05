<?php

class purchaseView
{
    public function showPurchaseForm($supplierList, $productList)
    {
        echo "
        <div id='purchase'>
            <h2>Purchase</h2>
            <form>
                <label for='supplierList'>Suppliers</label>
                <select id='supplierList'>
                <option>- - -</option>
                ";

        foreach ($supplierList as $supplier) {
            echo "<option>$supplier[0] $supplier[1] $supplier[2]</option>";
        }

        echo "</select>
        <label for='productList'>Products</label>
                <select id='productList'>
                <option>- - -</option>";
        foreach ($productList as $product) {
            echo "<option>$product[0] $product[1] $product[2]</option>";
        }
        echo "</select>
        
            <label for='productQuantity'>quantity</label>
            <input id='productQuantity' type='text'>

            <label for='productPrice'>product price</label>
            <input id='productPrice' type='text'>
            </form>
        </div>
        ";
    }
}
