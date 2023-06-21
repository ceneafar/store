<?php
require_once('controller/invoicecontroller.php');

class InvoiceView
{
    public function showInvoiceForm($customerList, $productList, $total)
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
            $productNameArr =  explode(",", $_COOKIE['productName']);
            $productPriceArr =  explode(",", $_COOKIE['priceProduct']);
            $totalPriceArr = explode(",", $_COOKIE['totalPrice']);

            for ($i = 0; $i < count($productInvoiceArr); $i++) {
                echo "
                <tr>
                    <td>$productInvoiceArr[$i]</td>
                    <td>$productNameArr[$i]</td>
                    <td>$productPriceArr[$i]</td>
                    <td>$productsQuantityArr[$i]</td>
                    <td>$totalPriceArr[$i]</td>
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
                        <a href='index.php?cancelInvoice=cancelInvoice'>Cancel</a>
                    </div>

                    <div>Amount Charged $$total</div>
                    <br/>
                    <div>Payable " . InvoiceController::showTotalPrice() - $total . "</div>
                    
                    <div class='box'>
                        <div>";
        echo "<div>Subtotal $" . InvoiceController::showTotalPrice() . "</div>";
        echo "<div>Tax 0,00%</div>";
        echo "<div>Total $" . InvoiceController::showTotalPrice() . "</div>";
        echo "</div>
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

    public function showAddPaymentForm($list)
    {
        echo "
        <div id='invoicePayment'>
            <h2>Add payment</h2>
            <form action='index.php?invoiceA=addPaymentMethod' method='post'>
                <select name='paymentMethodId'>";
        foreach ($list as $value) {
            echo "<option value='$value[0]'>$value[0] $value[1] $value[2]</option>";
        }
        echo "</select>
            <input type='text' placeholder='amount' name='paymantAmount'>
            <input type='submit' value='add'>
            </form>
            <a href='index.php?nav=invoice'>back</a>";

        if (isset($_COOKIE['paymentMethodId'])) {
            $paymentMethodIdArr = explode(",", $_COOKIE['paymentMethodId']);
            $paymantAmountArr = explode(",", $_COOKIE['paymantAmount']);
            $paymantNameArr = explode(",", $_COOKIE['paymantName']);

            echo "
            <table>
                <tr>
                    <th>method</th>
                    <th>name</th>
                    <th>amount</th>
                </tr>
                ";

            for ($i = 0; $i < count($paymentMethodIdArr); $i++) {
                echo "
                <tr>
                <td>$paymentMethodIdArr[$i]</td>
                <td>$paymantNameArr[$i]</td>
                <td>$paymantAmountArr[$i]</td>
                </tr>
                ";
            }
            echo "</table>";
        }

        echo "</div>";
    }
}
