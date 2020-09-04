<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('verifikasi_m');
        check_role_admin();
        check_not_login();
    }

    public function index() {

        $data = [
            'title' => 'admin',
            'pengajuan' => $this->verifikasi_m->getDataPengajuanLengkap()->result(),
            'cekpengajuan' => $this->verifikasi_m->getDataPengajuanLengkap()->num_rows(),
            'notif' => $this->verifikasi_m->NotifVerifikasiData()->num_rows(),
        ];
        $this->template->load('template_backend/template_b','admin/verifikasi_data', $data);
    }

    public function edit($id_pengajuan) {
        // $id_pengajuan = $this->uri->segment(4);
            
        $this->form_validation->set_rules('isverifikasi', 'Status Pengajuan', 'required');
        $this->form_validation->set_message('required', '%s Tidak Boleh Kosong!');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE){

            $query = $this->verifikasi_m->getDataPengajuanLengkap($id_pengajuan);
            if($query->num_rows() > 0) {
                $data = [
                    'title' => 'admin',
                    'pengajuan' => $this->verifikasi_m->getDataPengajuanLengkap($id_pengajuan)->row(),
                    'notif' => $this->verifikasi_m->NotifVerifikasiData()->num_rows(),
                ];
                $this->template->load('template_backend/template_b','admin/edit_verifikasi_data', $data);
            }
            else {
               redirect('www/verifikasidata');
            }

        }
        else {
            $this->verifikasi_m->editVerifikasi($id_pengajuan);
            $this->session->set_flashdata('success','Data Pengajuan berhasil diupdate!');
            redirect('www/verifikasidata');

        }
    }
}