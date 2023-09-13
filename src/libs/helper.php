<?php
function view(string $filename, array $data = []): void {
    foreach ($data as $key => $value) {
        $$key = $value;
    }
    require_once __DIR__ . '/../inc/' . $filename . '.php';
}

function get_request(): bool {
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
}

function post_request(): bool {
    return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
}

function check_same(string $text1, string $text2): bool {
    if($text1 == $text2) {
        return true;
    }
    else {
        return false;
    }
}


function check_request($input): bool {
    $check = true;
    foreach ($input as $param) {
        if(! isset($param) || $param == "") {
            $check = false;
        }
    }
    return $check;
}

function redirect_with(string $url, array $items = []): void {
    foreach( $items as $key => $value) {
        $_SESSION[$key] = $value;
    }

    header('Location:' . $url);
    ob_clean();
}



function flash_session(array $keys): array {
    $data = [];
    foreach ($keys as $key) {
        if(isset($_SESSION[$key])) {
            $data[] =  $_SESSION[$key];
            unset($_SESSION[$key]);
        }
        else {
            $data[] = [];
        }
    }
    return $data;
}
?>