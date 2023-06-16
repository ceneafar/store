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
                <form method='post'>
                    <input type='text' placeholder='payment method name'>
                    <input type='text' placeholder='symbol'>
                    <input type='submit' value='create'>
                </form>
            </div>
        ";
    }
}
