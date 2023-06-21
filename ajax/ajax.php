<?php

include_once '../class/Methods.php';

switch ($_POST['method']) {
    case 'newTask':
        Methods::newTask($_POST['method'], $_POST['data']);
        break;
    default:
        http_response_code(404);
        die();
        break;
}
