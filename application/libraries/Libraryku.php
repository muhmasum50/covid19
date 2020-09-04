<?php

Class Libraryku{

    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    function getData()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('id');
        $user_data = $this->ci->user_m->getData($user_id)->row();
        return $user_data;
    }

    function PDFGenerator($html, $filename, $papertype, $orientation) {
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($papertype, $orientation);

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0));
    }

    function jumlah_user_login() {
        $this->ci->load->model('log_m');
        $jumlah_user = $this->ci->log_m->JumlahUserLogin();

        return $jumlah_user;
    }

    function jumlah_login() {
        $this->ci->load->model('log_m');
        $jumlah_user = $this->ci->log_m->JumlahLogin();

        return $jumlah_user;
    }

    function jumlah_logout() {
        $this->ci->load->model('log_m');
        $jumlah_logout = $this->ci->log_m->JumlahLogout();

        return $jumlah_logout;
    }

    function jumlah_verifikasi() {
        $this->ci->load->model('verifikasi_m');
        $jumlah_validasi = $this->ci->verifikasi_m->JumlahVerifikasi();

        return $jumlah_validasi;
    }
}