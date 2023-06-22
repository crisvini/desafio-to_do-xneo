<?php

include_once '../class/Methods.php';

switch ($_POST['method']) {
    case 'newTask':
        Methods::newTask($_POST['data']);
        break;
    case 'viewTasks':
        Methods::viewTasks($_POST['ajax']);
        break;
    default:
        http_response_code(404);
        die();
        break;
}
