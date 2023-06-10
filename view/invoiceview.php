<?php

class InvoiceView
{
    public function showInvoiceForm($customerList, $productList)
    {
        echo "
        <div id='invoice'>
            <h2>Invoice</h2>
            <form>";
        $this->createDropdownList($customerList, 3);
        $this->createDropdownList($productList, 7);
        echo "<input type='text'>
                <input type='text'>
                <input type='text'>
            </form>
        </div>
        ";
    }

    private function createDropdownList($list, $number)
    {
        echo "
        <select>
            <option></option>
        ";

        foreach ($list as $row) {
            echo "<option value='$row[0]'>";
            for ($i = 0; $i < $number; $i++) {                
                echo "$row[$i] ";
            }
            echo "</option>";
        }

        echo "
        </select>
        ";
    }
}
