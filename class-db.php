<?php
session_start();
class DB {
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "visaclaptour";

    public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }

    public function is_token_empty() {
        $user_id =  $_SESSION['user_id'];

        $result = $this->db->query("SELECT user_id FROM cs_google_oauth WHERE user_id = '$user_id'");
        if($result->num_rows) {
            return false;
        }
        return true;
    }

    public function get_access_token() {
        // if($_SESSION['user_role'] == 5){
            $user_id =  $_SESSION['user_id'];
        // }else{
        //     $user_id =  $_SESSION['franchise_id'];
        // }

        $sql = $this->db->query("SELECT provider_value FROM cs_google_oauth WHERE user_id='$user_id'");
        $result = $sql->fetch_assoc();
        return json_decode($result['provider_value']);
    }

    public function get_refersh_token() {
        $result = $this->get_access_token();
        return $result->refresh_token;
    }

    public function update_access_token($token) {
        $user_id =  $_SESSION['user_id'];
        // if($_SESSION['user_role'] == "5"){
        //     $user_id =  $_SESSION['user_id'].'---';
        // }else{
        //     $user_id =  $_SESSION['franchise_id'].'--';
        // }
        // $result = $this->db->query("SELECT user_id FROM cs_google_oauth WHERE user_id = '$user_id'");

        // // $this->db->select('*');
        // // $this->db->from('cs_google_oauth');
        // // $this->db->where('user_id',$user_id);
        // // $query = $this->db->get()->row();

        // print_r($result);
        // return;

        if($this->is_token_empty()){

            $this->db->query("INSERT INTO cs_google_oauth(user_id ,provider, provider_value) VALUES('$user_id','google', '$token')");
        }else{
            // if($result->num_rows != 0){
            $this->db->query("UPDATE cs_google_oauth SET provider_value = '$token',provider = 'google' WHERE user_id = '$user_id'");
            // }
        }
    }
}