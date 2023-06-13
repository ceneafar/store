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
                    </tr>";

        if (isset($_COOKIE['productsQuantity'])) {
            $productInvoiceArr = explode(",", $_COOKIE['productsId']);
            $productsQuantityArr = explode(",", $_COOKIE['productsQuantity']);

            for ($i = 0; $i < count($productInvoiceArr); $i++) {
                echo "
                <tr>
                    <td>$productInvoiceArr[$i]</td>
                    <td></td>
                    <td></td>
                    <td>$productsQuantityArr[$i]</td>
                    <td></td>
                </tr>
                ";
            }
        }

        echo "
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

    public function showAddProductForm($productList)
    {
        echo "
        <div id='invoiceProduct'>
            <h2>Add product</h2>
            <form action='index.php?invoice=addProduct' method='post'>
            <select name='productInvoice'>";

        foreach ($productList as $product) {
            echo "<option value='$product[0]'>$product[0] $product[1] $product[2] $product[3]</option>";
        }

        echo "</select>
            <input placeholder='quantity' name='productInvoiceQuantity'>
            <input type='submit' value='add'>
            </form>
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
