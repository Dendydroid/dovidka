<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../Path.php");
require_once("../tools/JsonDatabase.php");
require_once("BaseMethod.php");
require_once("Constants.php");

$methodClasses = [
    "add" => "AddDataMethod",
    "delete" => "DeleteDataMethod",
    "search" => "SearchDataMethod",
    "get" => "GetDataMethod",
];

foreach ($methodClasses as $class) {
    try {
        require_once($class . ".php");
    } catch (Exception $exception) {
        file_put_contents(
            "api_errors_log.txt",
            $exception->getTraceAsString());
    }
}

if (!empty($_REQUEST) && isset($_REQUEST["method"]) && in_array($_REQUEST["method"], array_keys($methodClasses))) {
    $method = $_REQUEST['method'];
    $class = $methodClasses[$method];
    $handler = new $class();
    $response = $handler->handleRequest($_REQUEST);
    die(json_encode($response));
}