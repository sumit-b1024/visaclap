<?php
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
function send_email_to_user($email,$content) {
    require_once 'vendor/autoload.php';
    require_once 'class-db.php';
    $config = [
        'callback' => 'http://localhost/visaclaptour/franchise/enquiry/call_back_url',
        'keys'     => [
            'id' => GOOGLE_CLIENT_ID,
            'secret' => GOOGLE_CLIENT_SECRET
        ],
        'scope'    => 'https://mail.google.com',
        'authorize_url_parameters' => [
            'approval_prompt' => 'force',   
            'access_type' => 'offline'
        ]
    ];
    $adapter = new Hybridauth\Provider\Google( $config );
    $db = new DB();
    $arr_token = (array) $db->get_access_token();

    try {
        $transport = Transport::fromDsn('gmail+smtp://'.urlencode(GOOGLE_CLIENT_EMAIL).':'.urlencode($arr_token['access_token']).'@default');
        $mailer = new Mailer($transport);
        // $message = (new Email())
        // ->from(GOOGLE_CLIENT_EMAIL)
        // ->to($email)
        // ->subject('Email Form Visaclap')
        // ->html($content);
        // ->addAttachment(base_url('upload/enquiry_category_icons/pdf-test.pdf'),'35073841.pdf')
        // Send the message

        $emails = (new Email())
        ->from(GOOGLE_CLIENT_EMAIL)
        ->to($email)
        ->subject('Email Form Visaclap')
        // ->attachFromPath(base_url('upload/enquiry_category_icons/pdf-test.pdf'), 'Contract', 'application/pdf','35073841.pdf');
        // ->attachFromPath(base_url('assets/itinerary_pdf/'.$pdf_id.'.pdf'), 'itinerary.pdf')
        ->html($content);
        $mailer->send($emails);
        // echo 'Email sent successfully.';
        return TRUE;
    } catch (Exception $e) {
        if( !$e->getCode() ) {
            $refresh_token = $db->get_refersh_token();

            $response = $adapter->refreshAccessToken([
                "grant_type" => "refresh_token",
                "refresh_token" => $refresh_token,
                "client_id" => GOOGLE_CLIENT_ID,
                "client_secret" => GOOGLE_CLIENT_SECRET,
            ]);

            $data = (array) json_decode($response);
            $data['refresh_token'] = $refresh_token;

            $db->update_access_token(json_encode($data));

            send_email_to_user($email,$content);
            // return FALSE;
        } else {
            echo $e->getMessage(); //print the error
            // return FALSE;

        }
    }
}

function send_itinerary_email_with_file($email,$content,$pdf_id=0) {
    require_once 'vendor/autoload.php';
    require_once 'class-db.php';
    $config = [
        'callback' => 'http://localhost/visaclaptour/franchise/enquiry/call_back_url',
        'keys'     => [
            'id' => GOOGLE_CLIENT_ID,
            'secret' => GOOGLE_CLIENT_SECRET
        ],
        'scope'    => 'https://mail.google.com',
        'authorize_url_parameters' => [
            'approval_prompt' => 'force',   
            'access_type' => 'offline'
        ]
    ];
    $adapter = new Hybridauth\Provider\Google( $config );
    $db = new DB();
    $arr_token = (array) $db->get_access_token();

    try {
        $transport = Transport::fromDsn('gmail+smtp://'.urlencode(GOOGLE_CLIENT_EMAIL).':'.urlencode($arr_token['access_token']).'@default');
        $mailer = new Mailer($transport);
        // $message = (new Email())
        // ->from(GOOGLE_CLIENT_EMAIL)
        // ->to($email)
        // ->subject('Email Form Visaclap')
        // ->html($content);
        // ->addAttachment(base_url('upload/enquiry_category_icons/pdf-test.pdf'),'35073841.pdf')
        // Send the message

        $emails = (new Email())
        ->from(GOOGLE_CLIENT_EMAIL)
        ->to($email)
        ->subject('Email Form Visaclap')
        // ->attachFromPath(base_url('upload/enquiry_category_icons/pdf-test.pdf'), 'Contract', 'application/pdf','35073841.pdf');
        ->attachFromPath(base_url('assets/itinerary_pdf/'.$pdf_id.'.pdf'), 'itinerary.pdf')
        ->html($content);
        $mailer->send($emails);
        // echo 'Email sent successfully.';
        return TRUE;
    } catch (Exception $e) {
        if( !$e->getCode() ) {
            $refresh_token = $db->get_refersh_token();

            $response = $adapter->refreshAccessToken([
                "grant_type" => "refresh_token",
                "refresh_token" => $refresh_token,
                "client_id" => GOOGLE_CLIENT_ID,
                "client_secret" => GOOGLE_CLIENT_SECRET,
            ]);

            $data = (array) json_decode($response);
            $data['refresh_token'] = $refresh_token;

            $db->update_access_token(json_encode($data));

            send_email_to_user($email,$content,$pdf_id=0);
            // return FALSE;
        } else {
            echo $e->getMessage(); //print the error
            // return FALSE;

        }
    }
}


function send_application_email($email,$content) {
    require_once 'vendor/autoload.php';
    require_once 'class-db.php';
    $config = [
        'callback' => 'http://localhost/visaclaptour/franchise/enquiry/call_back_url',
        'keys'     => [
            'id' => GOOGLE_CLIENT_ID,
            'secret' => GOOGLE_CLIENT_SECRET
        ],
        'scope'    => 'https://mail.google.com',
        'authorize_url_parameters' => [
            'approval_prompt' => 'force',   
            'access_type' => 'offline'
        ]
    ];
    $adapter = new Hybridauth\Provider\Google( $config );
    $db = new DB();
    $arr_token = (array) $db->get_access_token();

    try {
        $transport = Transport::fromDsn('gmail+smtp://'.urlencode(GOOGLE_CLIENT_EMAIL).':'.urlencode($arr_token['access_token']).'@default');
        $mailer = new Mailer($transport);
        

        $emails = (new Email())
        ->from(GOOGLE_CLIENT_EMAIL)
        ->to($email)
        ->subject('Application Visaclap')
        ->html($content);
        $mailer->send($emails);
        // echo 'Email sent successfully.';
        return TRUE;
    } catch (Exception $e) {
        if( !$e->getCode() ) {
            $refresh_token = $db->get_refersh_token();

            $response = $adapter->refreshAccessToken([
                "grant_type" => "refresh_token",
                "refresh_token" => $refresh_token,
                "client_id" => GOOGLE_CLIENT_ID,
                "client_secret" => GOOGLE_CLIENT_SECRET,
            ]);

            $data = (array) json_decode($response);
            $data['refresh_token'] = $refresh_token;

            $db->update_access_token(json_encode($data));

            send_email_to_user($email,$content);
            // return FALSE;
        } else {
            echo $e->getMessage(); //print the error
            // return FALSE;

        }
    }
}


function send_mailrelay_email($fromemail="",$fromname="",$toemail="",$toname="",$subject="",$content="") {

    if($fromemail == ""){
       $fromemail =  'yamunesh@vughy.com';
    }
    if($fromname == ""){
       $fromname =  'yamunesh';
    }
    $data = [
            'from' => [
                'email' => $fromemail,
                'name' => $fromname
            ],
            'to' => [
                [
                    'email' => $toemail,
                    'name' => $toname
                ]
            ],
            'subject' => $subject,
            'html_part' => $content,
            //'text_part' => 'My text content.',
            'text_part_auto' => false,
            'headers' => [
                'X-CustomHeader' => 'Header value'
            ],
            'smtp_tags' => [
                'string'
            ]
        ];
        $curl = curl_init();
        $stringdata = json_encode($data);
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://vughy.ipzmarketing.com/api/v1/send_emails",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $stringdata,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/json",
            "x-auth-token: uwguUtYeHwv6hQgj65_omouCA2ym_gyJ9_z8e_yL"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
}

function pull_record_count($status){ 
    $today_date = date('Y-m-d');
    $yester_day_date = date('Y-m-d',strtotime('-1 day'));
    $yester_two_date = date('Y-m-d',strtotime('-2 days'));
    $CI = &get_instance();

    $CI->db->from(TBL_SUPPLIER_ADD_FRANCHISE . ' sf');
    $CI->db->where('sf.is_delete','0');

    if($status == 'process_pool'){ 
        $CI->db->group_start();
        $CI->db->where('sf.pool_status',Enquiry_pool_status::PROCESS);
        $CI->db->or_where('sf.pool_status',4);
        $CI->db->group_end();
    } 
    if($status == 'today_follow'){ 
        $CI->db->where('sf.pool_status',Enquiry_pool_status::NO_STATUS);
        $CI->db->where('sf.follow_up_date',$today_date);
    } 
    if($status == 'yesterday_follow'){ 
        $CI->db->where('sf.pool_status',Enquiry_pool_status::NO_STATUS);
        $CI->db->where('sf.follow_up_date',$yester_day_date);
    } 
    if($status == 'missed_follow'){ 
        $CI->db->where('sf.pool_status',Enquiry_pool_status::NO_STATUS);
        $CI->db->where("sf.follow_up_date <=",$yester_two_date);

    }    
     if($CI->session->userdata('user_role') == User_role::FRANCHISE){ 
        $CI->db->where('sf.franchise_id',$CI->session->userdata('user_id'));
    }
    
    if($CI->session->userdata('user_role') == User_role::FRANCHISE_STAFF){ 
        $CI->db->where('sf.enquiry_staff_id',$CI->session->userdata('user_id'));
    }

    //print_r($CI->db->get()->result());
    return $count = $CI->db->count_all_results();
}