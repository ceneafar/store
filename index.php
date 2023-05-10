<?php

require_once("controller/index.php");

if (isset($_GET["flag"]) && $_GET["flag"] == "signup") {
    controller::signup();
} elseif (isset($_GET["flag"]) && $_GET["flag"] == "create") {
    controller::create();
} elseif (isset($_GET["flag"]) && $_GET["flag"] == "login") {
    controller::login();
} elseif (isset($_GET["flag"]) && $_GET["flag"] == "close") {
    controller::close();
} else {
    controller::index();
}
