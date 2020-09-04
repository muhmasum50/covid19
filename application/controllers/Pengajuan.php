<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('pengajuan_m');
        check_not_login();
        check_role_user();
    }

    public function index() {

        $id = $this->session->userdata('id');
        $data_diri = $this->user_m->getDataDiri($id)->row();
        $cekdatadiri = $this->user_m->getDataDiri($id)->num_rows();

        if($cekdatadiri == 1) {
    
            $id_datadiri = $data_diri->id_datadiri;
            $pengajuan = $this->pengajuan_m->getDataPengajuan($id_datadiri)->row();
            $data= [
                'title' => 'CBM - Bantuanmu',
                'pengajuan' => $pengajuan,
                'user' => $this->user_m->getData($id)->row(),
                'datadiri' => $data_diri,
                'cekpengajuan' => $this->pengajuan_m->getDataPengajuan($id_datadiri)->num_rows(),
                'cekdatadiri' => $cekdatadiri,

                // 'cekdatadiri' => $this->user_m->getAvatar($id)->num_rows(),
                'avatar' => $this->user_m->getAvatar($id)->row()
            ];
            $this->template->load('template_backend/template_b','bantuan/pengajuan_pengguna', $data);
        }
        else {
            $data = [
                'title' => 'CBM - Bantuanmu',
                'cekdatadiri' => $this->user_m->getAvatar($id)->num_rows(),
                'avatar' => $this->user_m->getAvatar($id)->row()
            ];
            $this->template->load('template_backend/template_b','bantuan/belum_pengajuan_pengguna', $data);
        }
    }

    public function tambah() {

        $id = $this->session->userdata('id');
        $cekdatadiri = $this->user_m->getDataDiri($id)->num_rows();

        if($cekdatadiri == 1) {

            // form validation
            $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
            $this->form_validation->set_rules('gajibulanan', 'Gaji Bulanan', 'required|numeric');
            $this->form_validation->set_rules('kondisi', 'Kondisi Saat Ini', 'required');
            $this->form_validation->set_rules('noktp', 'Foto Identitas', 'required|numeric|min_length[16]|max_length[16]');
            $this->form_validation->set_rules('nokk', 'Foto KK', 'required|numeric|min_length[16]|max_length[16]');
            // $this->form_validation->set_rules('fotoslipgaji', 'Slip Gaji', 'required');


            $this->form_validation->set_message('required', '%s Tidak Boleh Kosong!');
            $this->form_validation->set_message('numeric', '%s Harus angka!');
            $this->form_validation->set_message('min_length', '%s Minimal 16 karakter');
            $this->form_validation->set_message('max_length', '%s Maximal 16 Karakter');

            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

            $post = $this->input->post(null, true);

            if ($this->form_validation->run() == FALSE){

                $data= [
                    'title' => 'CBM - Pengajuan Bantuan',
                    'datadiri' => $this->user_m->getDataDiri($this->session->userdata('id'))->row(),
                    'cekdatadiri' => $this->user_m->getAvatar($id)->num_rows(),
                    'avatar' => $this->user_m->getAvatar($id)->row()
                ];
        
                $this->template->load('template_backend/template_b','bantuan/tambah_bantuan',$data);
            }
            else{
                
                $config['upload_path'] = './uploads/dokumenpengajuan';
                $config['allowed_types'] = 'jpg|png|jpeg|pdf';
                $config['max_size'] = 2048;
                $config['file_name']        = 'SLIPGAJI-ID-'.$this->session->userdata('id').'-'.date('hi');

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($_FILES['fotoslipgaji']['name'] != null) 
                {

                    if($this->upload->do_upload('fotoslipgaji')) {

                        $post['fotoslipgaji'] = $this->upload->data('file_name');

                        $this->pengajuan_m->tambahDataPengajuan($post);
                        $this->session->set_flashdata('success','Data berhasil diubah!');
                        redirect('www/pengajuan');
                    }
                } 
                else {
                    $post['fotoslipgaji'] = null;

                    $this->pengajuan_m->tambahDataPengajuan($post);
                    $this->session->set_flashdata('success','Data berhasil diubah!');
                    redirect('www/pengajuan');
                }
            }
        }
        else {
            redirect('www/datadiri');
        }
    }
}