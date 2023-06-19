<?php
class CurrencyView
{
    public function showCurrencyRate()
    {
        echo "<div id='currency'>";
        echo "<h2>Currency</h2>";
        echo "</div>";
    }

    public function showPaymentMethods()
    {
        echo "
            <div id='paymentMethod'>
                <form method='post' action='index.php?currency=createPayment'>
                    <input type='text' name='paymentMethod' placeholder='payment method name'>
                    <input type='text' name='paymentSymbol' placeholder='symbol'>
                    <input type='submit' value='create'>
                </form>
            </div>
        ";
    }

    public function showPaymentMethodsList($list)
    {
        echo "<div id='PaymentMethodsList' class='content'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>name</th>";
        echo "<th>symbol</th>";
        echo "</tr>";
        foreach ($list as $value) {
            echo "<tr>";
            echo "<td>" . $value[0] . "</td>";
            echo "<td>" . $value[1] . "</td>";
            echo "<td>" . $value[2] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
}
