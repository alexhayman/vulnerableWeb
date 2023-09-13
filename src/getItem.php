<?php
$db = mysqli_connect($config->host, $config->username, $config->password, $config->name);
$getItem = "SELECT name, price, description, img_name FROM item WHERE id = '$itemID'";
$result = mysqli_query($db, $getItem);
$item =mysqli_fetch_assoc($result);
?>