<?php

require_once("controller/index.php");


if(isset($_GET["flag"]) && $_GET["flag"] == "signup"){
    controller::signup();
} elseif(isset($_GET["flag"]) && $_GET["flag"] == "create"){

} else {
    controller::index();
}
