<?php

class purchaseView
{
    public function showPurchaseForm($supplierList, $productList)
    {
        echo "
        <div id='purchase'>
            <h2>Purchase</h2>
            <form method='post' action='index.php?purchase=buyProduct'>
                <label for='supplierList'>Suppliers</label>
                <select id='supplierList' name='supplier'>
                <option>- - -</option>
                ";

        foreach ($supplierList as $supplier) {
            echo "
            <option value='$supplier[0] $supplier[1] $supplier[2]'>
                $supplier[0] $supplier[1] $supplier[2]
            </option>
            ";
        }

        echo "</select>
        <label for='productList'>Products</label>
                <select id='productList' name='product'>
                <option>- - -</option>";
        foreach ($productList as $product) {
            echo "
            <option value='$product[0] $product[1] $product[2]'>
                $product[0] $product[1] $product[2]
            </option>
            ";
        }
        echo "</select>
        
            <label for='productQuantity'>quantity</label>
            <input id='productQuantity' name='productQuantity' type='text'>

            <label for='productPrice'>product price</label>
            <input id='productPrice' name='productPrice' type='text'>
            
            <input type='submit' value='buy'>
            </form>            
        </div>
        ";
    }

    public function showPurcharses($purchaseList)
    {
        echo "
        <div id='purchaseList'>
            <table>
                <tr>
                    <th>id</th>
                    <th>supplier</th>
                    <th>product</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>total</th>
                </tr>
            ";
        foreach ($purchaseList as $value) {
            echo "
                <tr>
                    <td>$value[0]</td>
                    <td>$value[1]</td>
                    <td>$value[2]</td>
                    <td>$value[3]</td>
                    <td>$value[4]</td>
                    <td>$value[5]</td>
                </tr>
                ";
        }
        echo "
            </table>
        </div>
        ";
    }
}
