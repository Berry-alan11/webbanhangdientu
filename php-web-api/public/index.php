<?php
require_once '../config/config.php';
require_once '../src/Routes/api.php';

// Set headers for the API response
header("Content-Type: application/json");

// Get the request method and URI
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

// Route the request to the appropriate handler
routeRequest($requestMethod, $requestUri);
?>