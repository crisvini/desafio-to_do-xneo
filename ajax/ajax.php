<?php

include_once '../class/Methods.php';

switch ($_POST['method']) {
    case 'createTask':
        Methods::createTask($_POST['data']);
        break;
    case 'readTask':
        Methods::readTask($_POST['data']);
        break;
    case 'updateTask':
        Methods::updateTask($_POST['data']);
        break;
    case 'deleteTask':
        Methods::deleteTask($_POST['data']);
        break;
    case 'returnStatusOptions':
        Methods::returnStatusOptions($_POST['data']);
        break;
    case 'updateStatusKanban':
        Methods::updateStatusKanban($_POST['data']);
        break;
    default:
        http_response_code(404);
        die();
        break;
}
