<?php

class InvoiceView
{
    public function showInvoiceForm($customerList, $productList)
    {
        echo "
        <div id='invoice'>
            <h2>Invoice</h2>
            <div>
                <div class='section'>
                    <div>Customer Name</div>
                    <div>Date</div>
                    <div>01/01/2020</div>
                </div>                
                <table>                    
                    <tr>
                        <th>code</th>
                        <th>product name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>total</th>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>product1</td>
                        <td>$15,00</td>
                        <td>5</td>
                        <td>$75,00</td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td>product2</td>
                        <td>$15,00</td>
                        <td>5</td>
                        <td>$75,00</td>
                    </tr>
                    <tr>
                        <td>#3</td>
                        <td>product3</td>
                        <td>$15,00</td>
                        <td>5</td>
                        <td>$75,00</td>
                    </tr>
                </table>
                <div class='section three'>
                    <div class='box'>
                        <a href='index.php?add=add'>Add</a>
                        <a href='index.php?payment=payment'>Payment</a>
                        <a href='#'>Cancel</a>
                    </div>

                    <div>Payable $15,00</div>
                    
                    <div class='box'>
                        <div>
                            <div>Subtotal $15,00</div>
                            <div>Tax 0,00%</div>
                            <div>Total $15,00</div>
                        </div>
                        <a href='#'>Billing</a>
                    </div>                    
                </div>
            </div>  
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

    public function showAddProductForm()
    {
        echo "
        <div id='invoiceProduct'>
            <h2>Add product</h2>
            <a href='index.php?nav=invoice'>back</a>
        </div>
        ";
    }

    public function showAddPaymentForm()
    {
        echo "
        <div id='invoicePayment'>
            <h2>Add payment</h2>
            <a href='index.php?nav=invoice'>back</a>
        </div>
        ";
    }
}
