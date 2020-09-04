<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datadiri extends CI_Controller {

    public function __construct() {
        parent::__construct();
        check_not_login();
        $this->load->model('user_m');
        check_role_user();
    }

    public function index() {
        $id = $this->session->userdata('id');

        $query = $this->user_m->getDataDiri($id);
        $cekdata = $query->num_rows();

        // cek apakah user sudah memiliki datadiri / belum
            $data= [
                'title' => 'BAPANVID - Data Diri',
                'users' => $this->user_m->getDataUser($id)->row(),
                'datadiri' => $this->user_m->getDataDiri($id)->row(),
                'cekdata' => $cekdata,
                'cekdatadiri' => $this->user_m->getAvatar($id)->num_rows(),
                'avatar' => $this->user_m->getAvatar($id)->row()
            ];
            $this->template->load('template_backend/template_b','pengguna/datadiri_pengguna', $data);
    }

    public function tambah(){

        $id = $this->session->userdata('id');
        $query = $this->user_m->getDataDiri($id);
        $cekdata = $query->num_rows();

        //cek jika datadiri user = 1 (sudah isi datadiri) maka di alihkan ke halaman data diri
        if($cekdata == 0) {

            // form validation
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
            $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
            $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
            $this->form_validation->set_rules('kodepos', 'Kode Pos', 'required|max_length[6]',[
                'max_length' => '%s Maximal 6 angka'
            ]);
            $this->form_validation->set_rules('agama', 'Agama', 'required');
            $this->form_validation->set_rules('status', 'Status Perkawinan', 'required');
            $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|max_length[13]|min_length[11]|numeric',[
                'max_length' => '%s Maximal 13 angka'
            ]);
            $this->form_validation->set_rules('alamatlengkap', 'Alamat Lengkap', 'required');
    
            $this->form_validation->set_message('required', '%s Tidak Boleh Kosong!');
            $this->form_validation->set_message('min_length', '%s Minimal 11 Karakter!');
            $this->form_validation->set_message('numeric', '%s Harus angka!');
    
            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
            $post = $this->input->post(null, true);
    
            if ($this->form_validation->run() == FALSE){
                $data= [
                    'title' => 'BAPANVID - Data Diri',
                    'users' => $this->user_m->getDataUser($id)->row(),
                    'cekdatadiri' => $this->user_m->getAvatar($id)->num_rows(),
                    'avatar' => $this->user_m->getAvatar($id)->row()
                ];
        
                $this->template->load('template_backend/template_b','pengguna/tambah_datadiri', $data);
            }
            else{
                
                // config upload gambar
                $config['upload_path']      = './uploads/fotoprofil';
                $config['allowed_types']     = 'jpg|png|jpeg';
                $config['max_size']         = 2048;
                $config['file_name']        = 'pic-'.date('ymd').'-'.substr(md5(rand()),0,10);
                $this->load->library('upload', $config);
    
                if(@$_FILES['image']['name'] != null) {
                    if($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name'); 
                    
                        $this->user_m->tambahDataUser($id, $post);
                        $this->session->set_flashdata('success','Data berhasil diubah!');
                        redirect('www/datadiri');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('www/datadiri/add');
                    }
                } else {
                    $post['image'] = null;
                    $this->user_m->tambahDataUser($id, $post);
                    $this->session->set_flashdata('success','Data berhasil diubah!');
                    redirect('www/datadiri');
                }
            }
        }
        else {
            redirect('www/datadiri');
        }

    }

    public function edit() {
        $id = $this->session->userdata('id');
        $query = $this->user_m->getDataDiri($id);
        $cekdata = $query->num_rows();

        $post = $this->input->post(null, true);

        // cek jika datadiri kosong maka tidak diperbolehkan akses halaman edit
        if($cekdata == 0 ) {
            redirect('www/datadiri');
        }
        else {

            // config upload gambar
            $config['upload_path']      = './uploads/fotoprofil';
            $config['allowed_types']     = 'jpg|png|jpeg';
            $config['max_size']         = 2048;
            $config['file_name']        = 'pic-'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload', $config);

            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
            $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
            $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
            $this->form_validation->set_rules('kodepos', 'Kode Pos', 'required|max_length[6]',[
                'max_length' => '%s Maximal 6 angka'
            ]);
            $this->form_validation->set_rules('agama', 'Agama', 'required');
            $this->form_validation->set_rules('status', 'Status Perkawinan', 'required');
            $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|max_length[13]|min_length[11]|numeric',[
                'max_length' => '%s Maximal 13 angka'
            ]);
            $this->form_validation->set_rules('alamatlengkap', 'Alamat Lengkap', 'required');
    
            $this->form_validation->set_message('required', '%s Tidak Boleh Kosong!');
            $this->form_validation->set_message('min_length', '%s Minimal 11 Karakter!');
            $this->form_validation->set_message('numeric', '%s Harus angka!');
    
            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
            if ($this->form_validation->run() == FALSE){
                $query = $this->user_m->getDataDiri($id);
                if($query->num_rows() > 0)
                {
                    $data= [
                        'title' => 'BAPANVID - Data Diri',
                        'users' => $this->user_m->getDataUser($id)->row(),
                        'row' => $query->row(),
                        'cekdatadiri' => $this->user_m->getAvatar($id)->num_rows(),
                        'avatar' => $this->user_m->getAvatar($id)->row()
                    ];
            
                    $this->template->load('template_backend/template_b','pengguna/edit_datadiri', $data);
                }
                else{
                    redirect('www/datadiri');
                }
            }
            else{
                
                if(@$_FILES['image']['name'] != null) { //jika image tidak kosong
                    if($this->upload->do_upload('image')) { // lakukan upload image

                        $datadiri = $this->user_m->getDataDiri($id)->row();
                        if($datadiri->image_foto != null) { //jika ada gambar, maka dihapus kemudian direplace
                            $target_file = './uploads/fotoprofil/'.$datadiri->image_foto;
                            unlink($target_file);
                        }

                        $post['image'] = $this->upload->data('file_name'); 
                        $this->user_m->editDataUser($id, $post);
                        $this->session->set_flashdata('success','Data berhasil diubah!');
                        redirect('www/datadiri');

                    } else { // jika error
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('www/datadiri/edit');
                    }
                } 
                else { // jika image kosong
                    $post['image'] = null;
                    $this->user_m->editDataUser($id, $post);
                    $this->session->set_flashdata('success','Data berhasil diubah!');
                    redirect('www/datadiri');
                }
            }
        }

    }
}