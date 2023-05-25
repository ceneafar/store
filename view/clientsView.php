<?php

class clientsView
{

    public function showClients($list)
    {
        echo "<ul id='client' class='content'>";
        foreach ($list as $client) {
            echo "<li>" . $client . "</li>";
        }
        echo "</ul>";
    }

    public function createClients()
    {
        echo "<form action='index.php?client=create' method='post' id='createClient'>";
        echo "<input type='text' name='name'>";
        echo "<input type='submit' value='create client'>";
        echo "</form>";
    }
}