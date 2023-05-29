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

        echo "<label for='nameCustomer'>name</label>";
        echo "<input id='nameCustomer' type='text' name='name' placeholder='name'>";

        echo "<label for='lastNameCustomer'>last name</label>";
        echo "<input id='lastNameCustomer' type='text' name='lastName' placeholder='last name'>";

        echo "<label for='addressCustomer'>address</label>";
        echo "<input id='addressCustomer' type='text' name='address' placeholder='address'>";

        echo "<label for='phoneNumberCustomer'>phone numner</label>";
        echo "<input id='phoneNumberCustomer' type='text' name='phoneNumber' placeholder='phone number'>";

        echo "<label for='emailCustomer' for='email'>email</label>";
        echo "<input id='emailCustomer' type='text' name='email' placeholder='email'>";

        echo "<input type='submit' value='create customer'>";

        echo "</form>";
    }
}
