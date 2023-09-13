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
    $password = md5($_POST['password']);
    $input['username'] = $username;

    if(!check_request(array($username, $password))) {
        if($username == "" || ! isset($username)) {
            $errors['username'] = "Please Enter Your Username";
        }
        if($password == "" || ! isset($password)) {
            $errors['password'] = "Please Enter Your Password";
        }
        redirect_with('login.php', ['errors' => $errors, 'input' => $input]);
    }
    else {
        $checkUser = "SELECT username FROM user WHERE username='$username' AND password='$password' LIMIT 1";
        $result = mysqli_query($db, $checkUser);
        $user = mysqli_fetch_assoc($result);

        // Extra code for the demo to prevent an unkown user in the sql injection
        $usernameDB = $user["username"];
        $checkValid = "SELECT id FROM user Where username='$usernameDB'";
        $result = mysqli_query($db, $checkValid);
        $validUser = mysqli_fetch_assoc($result);

        if($validUser) {
           $_SESSION['username'] = $usernameDB;
           redirect_with('index.php');
       } 
       else {
           $errors['password'] = "Username or Password is Incorrect";
           redirect_with('login.php', ['errors' => $errors, 'input' => $input]);
       }
    }
}
else if(get_request()) {
    [$errors, $input] =  flash_session(array('errors', 'input'));
}
?>