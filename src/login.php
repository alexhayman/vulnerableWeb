<?php 

$errors = [];
$input = [];
$output =  [];

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
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $output["query"] = $query;
        $query = "SELECT * FROM user WHERE username='$username ' AND password='$password '";
        try {
            $result = mysqli_query($db, $query);
            if($result) {
                $rowCount = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    $rows[] = $row;
                }   
                $output["result"] = $rows;
            }
        } catch (Exception $e) {
                $output["result"] = "";
        }

        $stmt = $db->prepare("SELECT * FROM user WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result= $stmt->get_result();
        $data = $result->fetch_all();
        if($data) {
            redirect_with('success.php');
        } 
        else {
           $errors['password'] = "Username or Password is Incorrect";
           redirect_with('login.php', ['errors' => $errors, 'input' => $input, 'output' => $output]);
        }
    }
}
else if(get_request()) {
    [$errors, $input, $output] =  flash_session(array('errors', 'input', 'output'));
}
?>
