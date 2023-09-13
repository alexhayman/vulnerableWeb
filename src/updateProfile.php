<?php

if (!isset($_SESSION['username'])){
    header('location: index.php');
    exit;
    ob_clean();
}

$db = mysqli_connect($config->host, $config->username, $config->password, $config->name);
$username = $_SESSION['username'];
$errors = [];

if(post_request() && isset($_POST['upload'])) {

    $extension = pathinfo($_FILES['uploadFile']['name'], PATHINFO_EXTENSION);
    $filename = uniqid("IMG_", true) . ".". $extension; // Name of the file
    $tempname = $_FILES["uploadFile"]["tmp_name"]; // Name of the file including the path on your pc
    $folder = "uploads/" . $filename;   

    $uploadPath = "UPDATE user SET file_name='$filename' WHERE username='$username'";
    mysqli_query($db, $uploadPath);

    move_uploaded_file($tempname, $folder);
 
}

if(post_request() && isset($_POST['setDescription'])) {
    
    $description = $_POST['description'];
    if(strlen($description) > 100) {
        $errors["description"] = "Description Exeeds 100 Characters";
        redirect_with('account.php', ['errors' => $errors]);
    }
    else {
        $changeUsername = "UPDATE user SET description= ? WHERE username= ?";
        $stmt = $db->prepare($changeUsername);
        $stmt->bind_param("ss", $description, $username);
        $stmt->execute();
        redirect_with('account.php');
    }
}

if(get_request()) {
    
    // SQL Query
    $db = mysqli_connect($config->host, $config->username, $config->password, $config->name);
    $username = $_SESSION['username'];
    $getUser = "SELECT file_name, description FROM user WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $getUser);
    $userDetails = mysqli_fetch_assoc($result);
    $userAvatar = $userDetails['file_name'];
    $description = $userDetails['description'];


    if($userAvatar == "default.png") {
        $userAvatar = "img/" . $userAvatar;
    }
    else {
        $userAvatar = "uploads/" . $userAvatar;
    }

    [$errors] =  flash_session(array('errors'));
        
}
?>