<?php

class User_m extends CI_Model {

    public function getData($id = null)
    {
        $this->db->from('users');
        if($id != null){
            $this->db->where('id',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getDataUser($id) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);

        $query = $this->db->get();
        return $query;
    }

    //========================================== function edit data diri =====================

    public function getDataDiri($id) {
        $this->db->from('datadiri');
        if($id != null){
            $this->db->where('id_user',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambahDataUser($id = null, $post = null) {

        date_default_timezone_set("Asia/Bangkok");
        $generateID = 'BIO'.date('ymdhis');

        $params = [
            'id_datadiri' => $generateID,
            'id_user' => $id,
            'provinsi' => $this->input->post('provinsi', true),
            'kabupaten' => $this->input->post('kabupaten', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'kodepos' => $this->input->post('kodepos', true),
            'alamatlengkap' => $this->input->post('alamatlengkap', true),
            'agama' => $this->input->post('agama', true),
            'status' => $this->input->post('status', true),
            'no_telp' => $this->input->post('no_telp', true),
            "image_foto" => $post['image']
        ];

        $this->db->insert('datadiri', $params);

    }


    public function editDataUser($id, $post = null) {
        
        $params = [
            'provinsi' => $this->input->post('provinsi', true),
            'kabupaten' => $this->input->post('kabupaten', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'kodepos' => $this->input->post('kodepos', true),
            'alamatlengkap' => $this->input->post('alamatlengkap', true),
            'agama' => $this->input->post('agama', true),
            'status' => $this->input->post('status', true),
            'no_telp' => $this->input->post('no_telp', true),
        ];

        if($post['image'] != null) {
            $params['image_foto'] = $post['image'];
        }
        
        $this->db->where('id_user', $id);
        $this->db->update('datadiri', $params);
    }

    // get image data diri 
    public function getAvatar($id) {
        $this->db->select('id_user, image_foto');
        $this->db->from('datadiri');
        $this->db->where('id_user', $id);

        return $this->db->get();
    }
}