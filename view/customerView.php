<?php

class CustomerView
{
    public function showCustomers($customersList)
    {
        echo "<ul id='customer' class='content'>";
        foreach ($customersList as $customer) {
            echo "<li>" . $customer . "</li>";
        }
        echo "</ul>";
    }

    public function createCustomer()
    {
        echo "<form id='createCustomer' action='index.php?customer=create' method='post'>";
        echo "<input type='text' name='name'>";
        echo "<input type='submit' value='create customer'>";
        echo "</form>";
    }
}
