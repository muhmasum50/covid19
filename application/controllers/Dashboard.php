<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home_m');
        check_not_login();
        $this->load->model('log_m');
        $this->load->model('verifikasi_m');
        $this->load->model('user_m');
    }

    public function index() {
        $config['base_url'] = base_url('www/dashboard');
		$config['total_rows'] = $this->log_m->jumlah_data();
        $config['per_page'] = 5;

        $number['no'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //styilingcss
        $config['full_tag_open']='<nav> <ul class="pagination pull-left">';
        $config['full_tag_close']='</ul> </nav>';

        $config['first_link']='First';
        $config['first_tag_open']='<li class="page-item">';
        $config['first_tag_close']='</li>';

        $config['last_link']='Last';
        $config['last_tag_open']='<li class="page-item">';
        $config['last_tag_close']='</li>';

        $config['next_link']='&raquo';
        $config['next_tag_open']='<li class="page-item">';
        $config['next_tag_close']='</li>';

        $config['prev_link']='&laquo';
        $config['prev_tag_open']='<li class="page-item">';
        $config['prev_tag_close']='</li>';

        $config['cur_tag_open']='<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close']='</a></li>';

        $config['num_tag_open']='<li class="page-item">';
        $config['num_tag_close']='</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $x = $this->session->userdata();

        // =============================== // ==================================
        $role = $this->libraryku->getData()->role_id;
        $idku = $this->session->userdata('id');


        if($role == 2) { // jika rolenya pengguna
            $data = [
                'title' => 'BAPANVID - Dashboard',
                'data_positif' => $this->home_m->getDataPositifCovid(),
                'data_sembuh' => $this->home_m->getDataSembuhCovid(),
                'data_dead' => $this->home_m->getDataDeadCovid(),
                'data_ina' => $this->home_m->getDataCaseIndCovid(),
                'cekdatadiri' => $this->user_m->getAvatar($idku)->num_rows(),
                'avatar' => $this->user_m->getAvatar($idku)->row()
            ];
            $this->template->load('template_backend/template_b','pengguna/dashboard_pengguna', $data);
        }
        // jika rolenya admin
        else if ($role == 1) {

            $data = [
                'title' => 'BAPANVID - Dashboard',
                'log_login' => $x,
                'log' => $this->log_m->getData($config['per_page'],$number['no']),
                'notif' => $this->verifikasi_m->NotifVerifikasiData()->num_rows(),
            ];

            $this->template->load('template_backend/template_b','pengguna/dashboard_admin', $data);
        }
    }
}