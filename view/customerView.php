<?php

class CustomerView
{
    public function showCustomers($customersList)
    {
        echo "<ul id='customer' class='content'>";
        echo "<h2>Customers</h2>";
        foreach ($customersList as $customer) {
            echo "<li>" . $customer . "</li>";
        }
        echo "</ul>";
    }

    public function createCustomer()
    {
        echo "<form id='createCustomer' action='index.php?customer=createCustomer' method='post'>";
        echo "<input type='text' name='name'>";
        echo "<input type='submit' value='create customer'>";
        echo "</form>";
    }
}
