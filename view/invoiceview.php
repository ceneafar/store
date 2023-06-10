<?php

class InvoiceView
{
    public function showInvoiceForm($customerList, $productList)
    {
        echo "
        <div id='invoice'>
            <h2>Invoice</h2>
            <form>";
                $this->createDropdownList($customerList);
                $this->createDropdownList($productList);
                echo"<input type='text'>
                <input type='text'>
                <input type='text'>
            </form>
        </div>
        ";
    }

    private function createDropdownList($list)
    {
        echo "
        <select>
            <option></option>
        ";

        foreach ($list as $row) {
            echo "<option>$row[0] $row[1] $row[2]</option>";
        }

        echo "
        </select>
        ";
    }
}
