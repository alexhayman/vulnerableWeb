<?php
$text = [];

if (post_request()) {
    $message = $_POST['message'];
    $text['message'] = $message;
    }
else if(get_request()) {
    [$text] =  flash_session(array('text'));
}
?>