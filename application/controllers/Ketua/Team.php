<?php 

class Team extends CI_Controller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		$data['title'] = 'Data Team';
		$data['user'] = $this->M_ketua->get_where();
		$data['team'] = $this->M_ketua->get();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('ketua_tim/team', $data);
		$this->load->view('templates/footer');
	}

	public function verifikasi(){
		$this->form_validation->set_rules('verifikasi','Verifikasi','required|trim',[
			'required' => 'Tidak boleh kosong'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('ketua_tim/team', $data);
			$this->load->view('templates/footer');
		}
		else{
			$id = $this->input->post('id');
			$verifikasi = $this->input->post('verifikasi');

			$data = [
				'status' => $verifikasi
			];

			$where = ['id_team' => $id];
			$this->M_ketua->update($where,$data);
			$this->session->set_flashdata('team','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Verifikasi Team Berhasil
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
        	redirect('Ketua/Team');
		}
	}

	public function delete($id){
		$where = ['id_team', $id];
		$this->M_ketua->delete($where, 'tb_ketua');
		$this->session->set_flashdata('team','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Data Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
    	redirect('Ketua/Team');
	}
}