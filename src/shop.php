<?php
$dir = "items/";

if(isset($_GET["item"])) {
    include($dir . $_GET["item"]);
}
else {
    $db = mysqli_connect($config->host, $config->username, $config->password, $config->name);
    $getItems = "SELECT name, price, img_name FROM item";
    $result = mysqli_query($db, $getItems);
    $items = mysqli_fetch_all($result);
}
?>