<?php
// Configuration settings for the PHP web API

return [
    'db' => [
        'host' => 'localhost',
        'dbname' => 'your_database_name',
        'user' => 'your_database_user',
        'password' => 'your_database_password',
    ],
    'jwt' => [
        'secret' => 'your_jwt_secret_key',
        'expiration_time' => 3600, // Token expiration time in seconds
    ],
    'app' => [
        'base_url' => 'http://yourdomain.com/api',
    ],
];
?>