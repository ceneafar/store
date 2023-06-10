<?php

class InvoiceView
{
    public function showInvoiceForm($customerList)
    {
        echo "
        <div id='invoice'>
            <h2>Invoice</h2>
            <form>
                <select>
                <option></option>
        ";

        foreach ($customerList as $customer) {
            echo "<option>$customer[0] $customer[1] $customer[2]</option>";
        }

        echo "
                </select>
                <input type='text'>
                <input type='text'>
                <input type='text'>
            </form>
        </div>
        ";
    }
}
