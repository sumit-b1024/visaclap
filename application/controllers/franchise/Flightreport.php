<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Flightreport extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('user_model', 'setting_model','supplier_model','franchiseweb_model','flight_booking_model'));
        $this->load->helper('theme_helper');
    }

    public function index(){

          $this->content->extra_js  = array('jquery.dataTables.min', 'dataTables.bootstrap5.min', 'dataTables.responsive.min', 'responsive.bootstrap5.min', 'table-data','sweet-alert/sweetalert.min','sweet-alert','daterangepicker/moment.min','daterangepicker/daterangepicker','select2.full.min', 'select2');
        $this->content->extra_css = array('daterangepicker');
        $title = 'Flight Report';
        $this->content->breadcrumb = array(
            'Dashboard'      =>  '',
            $title          =>  NULL
        );
        $this->content->title       =   $title;
        $this->content->meta        =   $meta;
        $this->content->action      =   '';
        $this->content->info        =   '';
        $this->content->get_all_staff_data   =   $this->setting_model->get_all_staff_data();
        $this->content->get_all_airport   =     $this->setting_model->get_all_airport_list();
        $this->content->bookingflightlist   =   $this->flight_booking_model->get_flightbooking_list();
        
        $this->load_view('flight_report_view',$title);

    }
   
   function get_flight_booking(){  
           $post = $this->input->post();

           $data['bookingflightlist']  =   $this->flight_booking_model->get_flightbooking_list($post['staff'],$post['origin'],$post['destination'],$post['startdate'],$post['enddate']);

           $this->load->view('franchise/flightreport/flight_report_table',$data);
        
    }
    function generate_booking_detail_report(){  
        if($this->input->post()){
            $post = $this->input->post();
            $email = $post['email'];
            $number = $post['number'];
            $data['bookingflightlist'] = $this->flight_booking_model->fetch_booking_report_detail_data($email,$number);
            $this->load->view('franchise/flightreport/flight_report_table',$data);
        }
    }
    function bookingfulldetail(){  
           $post = $this->input->post();

           $data['bookingdetail']  =   $this->flight_booking_model->get_booking_subdetails($post['id']);
           $this->load->view('franchise/flightreport/flight_subdetail_table',$data);
        
    }
    function get_all_airportlist(){

        $post = $this->input->post();
        
            $this->db->select('code,airport_name,city,country');
            $this->db->from(TBL_FLIGHT_AIRPORT);
            // $this->db->like('code',$post['termname']);
            // $this->db->or_like('airport_name', $post['termname']);
            // $this->db->or_like('city', $post['termname']);
            // $this->db->or_like('country', $post['termname']);
            
            // $this->db->limit('10');
            $get_airport_query = $this->db->get()->result();

            echo json_encode($get_airport_query);
            return;
        
    }
    function viewticket(){  
         $title = 'Ticket Detail';
        $this->content->breadcrumb = array(
            'Dashboard'      =>  '',
            $title          =>  NULL
        );
        $ticketid    = $this->uri->segment(4);
        $this->content->extra_css = array('ticketcustom');
        if( !$ticketid )
        {
            redirect('franchise/flightreport', 'refresh');
        }
        $this->content->ticketdetail  =   $this->flight_booking_model->get_ticket_booking_detail($ticketid);

        $this->content->title       =   $title;


        $submitarray['AppReference']= $this->content->ticketdetail->appreference;
        $submitdata = json_encode($submitarray);

        $url = BOOKING_API_URL.'BookingDetails';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$submitdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, HEADER_API);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $BookingDetails = curl_exec($ch);
        curl_close($ch);

        $BookingResult = json_decode($BookingDetails,true);

        $this->content->BookingCustomer       =  $BookingResult["BookingDetails"]["BoookingTransaction"][0]["BookingCustomer"];
      
        $this->content->franchisdata = $this->franchiseweb_model->get_franchise_data($this->session->userdata('user_id'));
        
        $this->load_view('viewticket',$title);

    }

private function load_view($viewname = 'add_edit_new_enquiry', $page_title)
{
    $this->masterpage->setMasterPage('master_page');
    $this->masterpage->setPageTitle($page_title);
    $this->masterpage->addContentPage('franchise/flightreport/'.$viewname , 'content', $this->content);
    $this->masterpage->show();
}

}
?>