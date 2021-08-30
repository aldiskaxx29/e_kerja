<?php 

class Team extends CI_COntroller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		$data['title'] = 'Data Team';
		$data['user'] = $this->M_team->get_where();
		$data['team'] = $this->M_team->get();
		$data['kode'] = $this->M_team->kodeTeam();
		$this->form_validation->set_rules('kode_team','Kode Team','required|trim|is_unique[tb_team.kode_team]');
		$this->form_validation->set_rules('nama_team','Nama Team','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('no_telpon','No Telepon','required|trim|numeric',[
			'required' => 'Tidak Boleh Kosong',
			'numeric' => 'Tidak boleh huruf harus angka'
		]);
		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/team/index', $data);
			$this->load->view('templates/footer');
		}else{
			$kode_team = $this->input->post('kode_team');
			$nama_team = $this->input->post('nama_team');
			$no_telpon = $this->input->post('no_telpon');

			$data = [
				'kode_team' => $kode_team,
				'nama_team' => $nama_team,
				'no_telpon' => $no_telpon
			];

			$this->M_team->insert($data);
			$this->session->set_flashdata('team','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Team Berhasil Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin/Team');
		}
	}

	public function edit(){
		$id = $this->input->post('id');
		$kode_team = $this->input->post('kode_team');
		$nama_team = $this->input->post('nama_team');
		$no_telpon = $this->input->post('no_telpon');

		$data = [
			'kode_team' => $kode_team,
			'nama_team' => $nama_team,
			'no_telpon' => $no_telpon
		];

		$where = ['id_team' => $id];
		$this->M_team->edit($where,$data);
		$this->session->set_flashdata('team','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Team Berhasil Di Ubah
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Team');
	}

	public function delete($id){
		$where = ['id_team' => $id];
		$this->M_team->delete($where);
		$this->session->set_flashdata('team','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Team Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Team');
	}
}