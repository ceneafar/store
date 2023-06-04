<?php
class SupplierView
{
    public function showSupplierForm()
    {
        echo "
        <div id='supplier'>
            <h2>Suppliers</h2>
            <form action='index.php?supplier=createSupplier' method='post'>
                <div>
                    <label for='supplierName'>Supplier name</label>
                    <input id='supplierName' type='text' name='supplierName' placeholder='Supplier name'>
                </div>
                <div>
                    <label for='identityCard'>Identity card</label>
                    <input id='identityCard' type='text' name='supplierDni' placeholder='Identity Card'>
                </div>
                <input type='submit' value='Save'>
            </form>            
        </div>
        ";
    }

    public function showSupplierList($supplierList)
    {
        echo "
        <div id='supplierList'>
            <table>
            <tr>
            <th>id</th>
            <th>supplier name</th>
            <th>supplier dni</th>
            </tr>
        ";
        foreach ($supplierList as $supplier) {
            echo "<tr>";
            echo "<td>$supplier[0]</td>";
            echo "<td>$supplier[1]</td>";
            echo "<td>$supplier[2]</td>";
            echo "</tr>";
        }
        echo "
            </table>
        </div>
        ";
    }
}
