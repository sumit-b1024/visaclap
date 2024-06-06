<?php
require_once 'vendor/autoload.php';
require_once 'class-db.php';

session_start();

$user_id =  $_SESSION['user_id'];
$this->db->select('*');
$this->db->from(TBL_STORE_EMAIL_CREDENCIALS);
$this->db->where('user_id',$user_id);
$result = $this->db->get()->row();

define('GOOGLE_CLIENT_ID', $result->client_id);
define('GOOGLE_CLIENT_SECRET', $result->client_secret); 

$config = [
    'callback' => 'http://localhost/visaclaptour/franchise/enquiry/call_back_url',
    'keys'     => [
        'id' => $result->client_id,
        'secret' => $result->client_secret
    ],
    'scope'    => 'https://mail.google.com',
    'authorize_url_parameters' => [
        'approval_prompt' => 'force', 
        'access_type' => 'offline'
    ]
];

$adapter = new Hybridauth\Provider\Google( $config );