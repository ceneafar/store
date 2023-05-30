<?php

class CustomerView
{
    public function showCustomers($customersList)
    {
        echo "<div id='customer' class='content'>";
        echo "<h2>Customers</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>name</th>";
        echo "<th>lastname</th>";
        echo "<th>address</th>";
        echo "<th>phone</th>";
        echo "<th>email</th>";
        echo "</tr>";
        foreach ($customersList as $customer) {
            echo "<tr>";
            echo "<td>" . $customer[0] . "</td>";
            echo "<td>" . $customer[1] . "</td>";
            echo "<td>" . $customer[2] . "</td>";
            echo "<td>" . $customer[3] . "</td>";
            echo "<td>" . $customer[4] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<hr>";
        echo "</div>";
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
