<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
	
		$this->load->model('log_m');
		$this->load->model('auth_m');
	}


    public function register() {

		check_already_login();
        $title = [
            'title' => 'Covid 19 - Daftar Akun'
        ];

		$this->form_validation->set_rules('fullname','Nama','required|trim');
		$this->form_validation->set_rules('tempatlahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggallahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('email','Email','required|valid_email|trim|is_unique[users.email]',[
			'is_unique' => 'Email Ini Sudah Terdaftar'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[passconf]',[
			'matches' => 'Password Tidak Sama!',
			'min_length' => 'Password Terlalu Pendek!'
		]);

		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

		$this->form_validation->set_message('required', '%s tidak boleh kosong!');

		if($this->form_validation->run()==false)
		{
			$this->load->view('template_frontend/register_v', $title);
		}
		else{

			// $this->login_model->registration_users();

			$token = base64_encode(random_bytes(50));
			$this->auth_m->Daftarakun();
			$this->auth_m->InsertToken($token);

			$this->_sendEmail($token, 'verify');
			$this->session->set_flashdata('status','<div class="alert alert-success" role="alert">
						Selamat! Akun kamu berhasil dibuat. mohon aktivasi akun kamu
						</div>'
				);
			redirect('www/auth/login');
		}
    }

    private function _sendEmail($token, $type) {
		$this->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_user'] = 'cyberfrog6661@gmail.com';
        $config['smtp_pass'] = 'xxxxxx';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");

		$this->email->from('cyberfrog6661@gmail.com','Cyber Frogline');
		$this->email->to($this->input->post('email'));

		if($type == 'verify')
		{
			$this->email->subject('Verifikasi Akun');
			$this->email->message('Klik link ini untuk memverifikasi akun anda :
				<a href="'.base_url() . 'auth/verify?email=' .$this->input->post('email') . 
				'&token=' .urlencode($token). '"> Aktivasi disini </a>');
		}
		elseif($type == 'forgot')
		{
			$this->email->subject('Reset Password');
			$this->email->message('Klik link ini untuk mereset password anda :
				<a href="'.base_url() . 'auth/resetpassword?email=' .$this->input->post('email') . 
				'&token=' .urlencode($token). '"> Reset Password </a>');
		}


		if($this->email->send()){
			
			return true;
		}
		else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('users', ['email' => $email])->row_array();
		
		//if user exist
		if($user){
			
			$user_token = $this->db->get_where('users_token',['token' => $token])->row_array();
			//if token exist
			if($user_token){
				//validation token in 1 hour
				if(time() - $user_token['date_created'] < 60*60*1)
				{
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('users');

					//delete the temporary database
					$this->db->delete('users_token',['email' => $email]);

					$this->session->set_flashdata('status','<div class="alert alert-success" role="alert">
						'.$email.' Sudah diaktivasi! Kamu dapat login sekarang. </div>');
					redirect('www/auth/login');
				}
				else{
					//when token expired
					$this->db->delete('users',['email' => $email]);
					$this->db->delete('users_token',['email' => $email]);

					$this->session->set_flashdata('status','<div class="alert alert-warning" role="alert">
						Aktivasi gagal! Token kadaluarsa. </div>');
					redirect('www/auth/login');
				}
			}
			else{
				//if token doesn't match
				$this->session->set_flashdata('status','<div class="alert alert-warning" role="alert">
						Aktivasi gagal! Token tidak valid. </div>');
				redirect('auth');
			}
		}
		else{
			//if email doesnt match
			$this->session->set_flashdata('status','<div class="alert alert-warning" role="alert">
						Aktivasi gagal! Email tidak valid. </div>');
			redirect('auth');
		}
	}

    public function login() {

		check_already_login();

        $title = [
            'title' => 'Covid 19 - Login',
        ];

        //kick users if try to force acces
		if($this->session->userdata('email')) {
			redirect('www/dashboard');
		}

		$this->form_validation->set_rules('email_user','Email','required|trim|valid_email',[
			'valid_email' => 'Email tidak valid',
			'required' => 'Email tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('password_user','Password','required|trim',[
			'required' => 'Password tidak boleh kosong'
		]);

		if($this->form_validation->run() == false) {
			$this->load->view('template_frontend/login_v', $title);

		}
		else{
			//if validation success
			$this->_login();
		}

    }

    private function _login()
	{
		$email = $this->input->post('email_user');
		$password = $this->input->post('password_user');

		$user = $this->db->get_where('users',['email' => $email])->row_array();
		
		//if user exist
		if($user)
		{
			//if user is active
			if($user['is_active'] == 1)
			{
				//check password
				if(password_verify($password, $user['password'])){
					$data = [
						'id' => $user['id'],
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					$this->log_m->tambah_log_login();
					redirect('www/dashboard');
				}
				else{
					$this->session->set_flashdata('status','<div class="alert alert-danger" role="alert">
						Password Salah!
						</div>');
					redirect('www/auth/login');
				}
			}
			else{
				$this->session->set_flashdata('status','<div class="alert alert-danger" role="alert">
						Email belum diaktivasi!
						</div>');
				redirect('www/auth/login');
			}
		}
		else{
			$this->session->set_flashdata('status','<div class="alert alert-danger" role="alert">
						Email belum terdaftar! 
						</div>');
				redirect('www/auth/login');

		}
	}

	public function logout() {
		$params = array('id', 'email');
		$this->log_m->tambah_log_logout();
        $this->session->unset_userdata($params);

        // $this->message('Selamat','Anda Berhasil Logout','success');
        redirect('www/auth/login');
	}

}