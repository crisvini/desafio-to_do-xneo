<?php

include_once '../class/Methods.php';

switch ($_POST['method']) {
    case 'createTask':
        Methods::createTask($_POST['data']);
        break;
    case 'viewTasks':
        Methods::viewTasks($_POST['from'], $_POST['ajax']);
        break;
    case 'deleteTask':
        Methods::deleteTask($_POST['data']);
        break;
    default:
        http_response_code(404);
        die();
        break;
}
