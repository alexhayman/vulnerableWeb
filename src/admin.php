<?php

if ($_SESSION['username'] != "admin") {
    header('location: index.php');
    ob_clean();
    exit;
}
else {
    $db = mysqli_connect($config->host, $config->username, $config->password, $config->name);
    $getUsers = "SELECT username, description, time_created FROM user";
    $result = mysqli_query($db, $getUsers);
    $users =mysqli_fetch_all($result);
}

?>