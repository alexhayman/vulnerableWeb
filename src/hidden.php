<?php

$errors = [];

if (post_request()) {
    $message = $_POST['secret'];
    if($message == "secret!1337") {
        redirect_with('success.php');
    }
    else {
        $errors['secret'] = "Incorrect Message";
        redirect_with('hidden.php', ['errors' => $errors]);
    }

}
else if(get_request()) {
    [$errors] =  flash_session(array('errors'));
}
?>