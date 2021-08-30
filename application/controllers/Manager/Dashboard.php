<?php 

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		$data['title'] = 'Dashboard Manager';
		$data['user'] = $this->M_manager->get_where();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('manager/Dashboard', $data);
		$this->load->view('templates/footer');
	}
}