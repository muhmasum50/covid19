<?php

class Verifikasi_m extends CI_Model {

    public function getDataPengajuanLengkap($id = null) {

        $this->db->select('a.*, b.*, c.*');
        $this->db->from('pengajuan a');
        $this->db->join('datadiri b', 'on b.id_datadiri = a.id_datadiri' ,'left');
        $this->db->join('users c', 'on c.id = b.id_user', 'left');

        if($id != null){
            $this->db->where('id_pengajuan',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function NotifVerifikasiData() {
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('statuspengajuan', 'pending');
        $query = $this->db->get();

        return $query;
    }

    public function editVerifikasi($id) {
        
        $params = [
            'statuspengajuan' => $this->input->post('isverifikasi', true),
            'diverifikasi' => $this->session->userdata('id')

        ];

        $this->db->where('id_pengajuan', $id);
        $this->db->update('pengajuan', $params);
    }

    public function JumlahVerifikasi() {
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('statuspengajuan', 'setuju');
        $query = $this->db->get()->result();

        return $query;
    }
}