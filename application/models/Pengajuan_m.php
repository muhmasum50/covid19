<?php

class Pengajuan_m extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function tambahDataPengajuan($post = null) {

        date_default_timezone_set("Asia/Bangkok");
        $generateID = 'AJ'.date('his');

        $params = [
            'id_pengajuan' => $generateID,
            'id_datadiri' => $this->input->post('id_datadiri', true),
            'pekerjaan' => $this->input->post('pekerjaan', true),
            'gajibulanan' => $this->input->post('gajibulanan', true),
            'kondisi' => $this->input->post('kondisi', true),
            "ktpsim" => $this->input->post('noktp', true),
            "kk" => $this->input->post('nokk', true),
            "foto_slipgaji" => $post['fotoslipgaji'],

            "statuspengajuan" => 'pending',
            // "diverivikasi" => null
        ];

        $this->db->insert('pengajuan', $params);

    }

    public function getDataPengajuan($id_datadiri = null) {

        $this->db->from('pengajuan');
        if($id_datadiri != null){
            $this->db->where('id_datadiri',$id_datadiri);
        }
        $query = $this->db->get();
        return $query;
    }
}