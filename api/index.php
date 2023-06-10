<?php
include 'inc.php';

$form = file_get_contents('php://input');
$jo = json_decode($form);
if (!$jo) {
    exit;
}

$action = $jo->action;
$method = $jo->method;
if (empty($action) || empty($method)) {
    exit;
}

if (strtolower($method) === 'get') {
    echo _get($action);
} else {
    !empty(empty($jo->data)) or die();
    $data = base64_decode($jo->data);
    echo _post($action, $data);
}