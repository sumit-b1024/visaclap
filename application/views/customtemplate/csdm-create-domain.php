<?php

$API_KEY = "yIuAMLhxGOf4OAN7fTfea2oTJ7JtzHTg";

if(!isset($_GET['api_key']) || $_GET['api_key']!=$API_KEY){
  http_response_code(401);
  header('Content-Type: application/json');
  echo json_encode(['error' => '401 Unauthorized']);
  die();
}

// Get the server name from the query string
$domain = $_GET['domain']; // domain=page.hifyc.link
if(!$domain){
  http_response_code(400);
  header('Content-Type: application/json');
  echo json_encode(['error' => 'Not found domain']);
  die();
}

$config_file = $domain.".conf"; // 
// Check if the configuration file exists
if (file_exists('/etc/apache2/sites-available/' . $config_file)) {
    http_response_code(400);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Domain already exists on server']);
    die();
}



// Set the document root and allow override
$documentRoot = '/var/www/hifyc_custom_domain/public';
$allowOverride = 'All';

// Generate the virtual host configuration
$config = <<<EOF
<VirtualHost *:80>
  ServerName $domain
  DocumentRoot $documentRoot

  <Directory $documentRoot>
    AllowOverride $allowOverride
    Require all granted
  </Directory>
</VirtualHost>
EOF;

// Check exits file

// Write the configuration to a file
$result = file_put_contents('/etc/apache2/sites-available/' . $config_file, $config);

$response['message'] = "";

if ($result !== false) {
  // Enable the virtual host
  exec('sudo a2ensite ' . $domain . '.conf');

  // Restart Apache
  exec('sudo apachectl graceful');

  // Set the response message
  $response['message'] = 'Virtual host created successfully';

  // Set the HTTP status code to 200 (OK)
  http_response_code(200);
  header('Content-Type: application/json');
  echo json_encode(['success' => $response['message']]);
  die();

} else {
  // Set the response message
  $response['message'] = 'Error creating virtual host';
  // Set the HTTP status code to 500 (Internal Server Error)
  http_response_code(500);
  header('Content-Type: application/json');
  echo json_encode(['error' => $response['message']]);
  die();
}