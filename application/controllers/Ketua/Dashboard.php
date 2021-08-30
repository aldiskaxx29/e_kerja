<?php 

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		$data['title'] = 'Dashboard Ketua Team';
		$data['user'] = $this->M_ketua->get_where();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('ketua_tim/Dashboard', $data);
		$this->load->view('templates/footer');
	}
}