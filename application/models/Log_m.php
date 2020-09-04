<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_m extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
    }

    public function tambah_log_login() {

        if ($this->agent->is_browser()) {
                $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot()) {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile()) {
                $agent = $this->agent->mobile();
        }
        else {
                $agent = 'Unidentified User Agent';
        }
        date_default_timezone_set("Asia/Bangkok");
        $date = DATE("Y-m-d");

        $params = [
            'user_id' => $this->session->userdata('id'),
            'ip_address' => $this->input->ip_address(),
            'browser' => $agent,
            'os' => $this->agent->platform(),
            'aktifitas' => 'Login',
            'datelog' => $date,
        ];

        $this->db->insert('log_users', $params);

    }
    
    public function tambah_log_logout() {

        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot()) {
                $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile()) {
                $agent = $this->agent->mobile();
        }
        else {
                $agent = 'Unidentified User Agent';
        }

        date_default_timezone_set("Asia/Bangkok");
        $date = DATE("Y-m-d");

        $params = [
            'user_id' => $this->session->userdata('id'),
            'ip_address' => $this->input->ip_address(),
            'browser' => $agent,
            'os' => $this->agent->platform(),
            'aktifitas' => 'Logout',
            'datelog' => $date
        ];

        $this->db->insert('log_users', $params);
    }

    public function jumlah_data() {
        return $this->db->get('log_users')->num_rows();
    }

    public function getData($limit, $start) {
        $this->db->select('a.*, b.name, c.role');
        $this->db->from('log_users a');
        $this->db->join('users b', 'on a.user_id = b.id','left');
        $this->db->join('users_role c', 'on b.role_id = c.id','left');
        $this->db->order_by('log_id','DESC');
        $this->db->limit($limit, $start);

        $query = $this->db->get()->result();
        return $query;
    }

    public function JumlahUserLogin() {

        date_default_timezone_set("Asia/Bangkok");
        $date = DATE("Y-m-d");

        $this->db->distinct();
        $this->db->select('a.user_id as id');
        $this->db->from('log_users a');
        $this->db->join('users b', 'a.user_id = b.id');
        $this->db->where('a.datelog', $date);

        $query = $this->db->get()->result();
        return $query;
    }

    public function JumlahLogin(){
        $login = 'Login';
        $this->db->select('log_id');
        $this->db->from('log_users');
        $this->db->where('aktifitas', $login);

        $query = $this->db->get()->result();
        return $query;
    }

    public function JumlahLogout(){
        $logout = 'Logout';
        $this->db->select('log_id');
        $this->db->from('log_users');
        $this->db->where('aktifitas', $logout);

        $query = $this->db->get()->result();
        return $query;
    }

    public function getAPI() {
        $this->db->select('a.*, b.name, c.role');
        $this->db->from('log_users a');
        $this->db->join('users b', 'on a.user_id = b.id','left');
        $this->db->join('users_role c', 'on b.role_id = c.id','left');
        $this->db->order_by('log_id','DESC');

        $query = $this->db->get()->result();
        return $query;
    }
}
