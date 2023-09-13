<?php

$errors = [];
$input = [];

if (isset($_SESSION['username'])) {
    header('location: index.php');
    ob_clean();
}

if (post_request()) {

    // Initialise Variables
    $db = mysqli_connect($config->host, $config->username, $config->password, $config->name);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(!check_request(array($username, $password, $password2))) {
        $input['username'] = $username;
        if($username == "" || ! isset($username)) {
            $errors['username'] = "A Username is Required";
            unset($input['username']);
        }
        if($password == "" || !isset($password)) {
            $errors['password'] = "A Password is Required";
        }
        else {
            $errors['password2'] = "Please Confirm your Password"; //Only display if password field is not empty
            $input['username'] = $username;
        }
        redirect_with('register.php', ['errors' => $errors, 'input' => $input]);
    }
    else {
        $input['username'] = $username;

        $check_user = "SELECT * FROM user WHERE username='$username' LIMIT 1";
        $result = mysqli_query($db, $check_user);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            $errors['username'] = "Username Already Exists";
            if (!check_same($password, $password2)) {
                $errors['password2'] = "Password Does Not Match";
            }
            redirect_with('register.php', ['errors' => $errors, 'input' => $input]);
        }
        elseif (!check_same($password, $password2)) {
            $errors['password2'] = "Password Does Not Match";
            redirect_with('register.php', ['errors' => $errors, 'input' => $input]);
        }
        elseif (strlen($username) > 30 || strlen($password) > 30) {
            $errors['username'] = "Username exceeds 30 character limit";
            $errors['password'] =  "Password exceeds 30 chacters limit";
            if(strlen($username) <= 30) {
                unset($errors['username']);
            }
            if(strlen($password) <= 30) {
                unset($errors['password']);
            }
            redirect_with('register.php', ['errors' => $errors]);
        }
        else {
            $hashedPassword = md5($password);
            $date = date("Y-m-d H:i:s");
            $stmt = $db->prepare("INSERT INTO user (username, password, description, file_name, time_created ) VALUES(?, ?, '', 'default.png', ?)");
            $stmt->bind_param("sss", $username, $hashedPassword, $date);
            $stmt->execute();
            redirect_with('login.php');
        }
        
    }
}
else if(get_request()) {
    [$errors, $input] =  flash_session(array('errors', 'input'));
}
?>
