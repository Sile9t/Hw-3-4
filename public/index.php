<?php
//include __DIR__ . '/core/functions.php';
include __DIR__ . '/../vendor/autoload.php';

$idPattern = "/[0-9]/";

$url_array = explode('?', $_SERVER['REQUEST_URI']);

preg_match($idPattern, $url_array[0], $matches);
$id = count($matches) > 0 ? (int)$matches[0] : '';

$urlStr = $id == '' ? $url_array[0] : str_replace("/" . $id, '', $url_array[0]);
$page = trim($urlStr, "/") ?: 'index';

$action = $_SERVER['REQUEST_METHOD'];

dump("page: $page, id: $id");
    
// if (count($url_array) > 1) {
//     parse_str($url_array[1], $variables);
    
//     $action = empty($variables) ? $action : $variables['action'];
//     dump("action: $action");

//     return main(page: $page, id: $id, action: $action);
// }

main(page: $page, id: $id, action: $action);
