<?php  

class Auth extends CI_Controller{
	public function index(){
		$data['title'] = 'Login';
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('template_auth/header', $data);
			$this->load->view('Auth/login', $data);
			$this->load->view('template_auth/footer');
		}
		else{
			$this->_login();
		}
	}

	private function _login(){
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
						'username' => $user['username'],
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);

				if ($user['role_id'] == 1) {
					redirect('Manager/Dashboard');
				}
				elseif ($user['role_id'] == '2') {
					redirect('Admin/Dashboard');
				}
				elseif($user['role_id'] == '3'){
					redirect('Ketua/Dashboard');
				}
			}
			else{
				$this->session->set_flashdata('user','<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Salah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
				redirect('auth');
			}
		}	
		else{
			$this->session->set_flashdata('user','<div class="alert alert-danger alert-dismissible fade show" role="alert">Email Belum Terdaftar
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Auth');
		}
	}

	public function registrasi(){
		$data['title'] = 'Registrasi';
		$this->form_validation->set_rules('username','Username','required|trim', [
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('email','Email','required|trim|is_unique[tb_user.email]|valid_email',[
			'is_unique' => 'Email Sudah di Gunakan',
			'valid_email' => 'Format harus email',
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('password','Password','required|trim|matches[password1]',[
			'required' => 'Tidak boleh kosong',
			'matches' => 'Password Harus sama',
		]);
		$this->form_validation->set_rules('password1','Confirmasi Password','required|trim|matches[password]',[
			'required' => 'Tidak boleh kosong',
			'matches' => 'Password Harus sama',
		]);
		$this->form_validation->set_rules('role_id','Role id','required|trim',[
			'required' => 'Tidak boleh kosong'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('template_auth/header', $data);
			$this->load->view('Auth/registrasi', $data);
			$this->load->view('template_auth/footer');
		}
		else{
			$nama = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$role_id = $this->input->post('role_id');

			$data = [
				'username' => $nama,
				'email' => $email,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'role_id' => $role_id,
			];
			// var_dump($data);die;
			$this->M_admin->insert($data,'tb_user');
			$this->session->set_flashdata('user','<div class="alert alert-success alert-dismissible fade show" role="alert">Akun Berhasl Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Auth');
		}
	}


}

?>