<?php 


$errors = [];
$input = [];
$output =  [];


if (isset($_SESSION['username'])) {
    header('location: index.php');
    ob_clean();
}

 
if (post_request()) {

    // Initialise Variables
    $db = mysqli_connect($config->host, $config->username, $config->password, $config->name);
    $username = $_POST['username'];
    $password = $_POST['password'];
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
        // $checkUser = "SELECT username FROM user WHERE username='$username' AND password='$password' LIMIT 1";
        $query = "SELECT * FROM user LIMIT 1";
        $result = mysqli_query($db, $query);
        $rowCount = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }   
        $output["result"] = $rows;
  
        
    //     if($user) {
    //        $_SESSION['username'] = $usernameDB;
    //        redirect_with('index.php');
    //     } 
    //    else {
           $errors['password'] = "Username or Password is Incorrect";
           redirect_with('login.php', ['errors' => $errors, 'input' => $input, 'output' => $output]);
    //    }
    }
}
else if(get_request()) {
    [$errors, $input, $output] =  flash_session(array('errors', 'input', 'output'));
}
?>
