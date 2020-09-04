<?php

class Auth_m extends CI_Model {

    public function DaftarAkun(){

        $email = $this->input->post('email',true);

        $data_users = [
            'name' => htmlspecialchars($this->input->post('fullname',true)),
            'email' => htmlspecialchars($email),
            'tanggallahir' => $this->input->post('tanggallahir', true),
            'tempatlahir' => $this->input->post('tempatlahir', true),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password'),
                    PASSWORD_DEFAULT),
            'role_id' => '2',
            'is_active' => '0',
            'date_create' => time()
        ];

        $this->db->insert('users', $data_users);
    }

    public function InsertToken($token) {
        $email = $this->input->post('email',true);
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
            ];
            
            $this->db->insert('users_token',$user_token);
    }
}