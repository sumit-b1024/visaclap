<?php

$API_KEY = "yIuAMLhxGOf4OAN7fTfea2oTJ7JtzHTg";

if(!isset($_GET['api_key']) || $_GET['api_key']!=$API_KEY){
  http_response_code(401);
  header('Content-Type: application/json');
  echo json_encode(['error' => '401 Unauthorized']);
  die();
}

// Read the directory contents
$dir = '/etc/apache2/sites-available';
$files = scandir($dir);

// Filter out hidden files and non-configuration files
$config_files = array_filter($files, function($file) {
    return !preg_match('/^\./', $file) && preg_match('/\.conf$/', $file);
});

// Return the list of configuration files
header('Content-Type: application/json');
echo json_encode(['config_files' => $config_files]);
