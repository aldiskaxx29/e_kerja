<?php 

class Monitoring extends CI_Controller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		$data['title'] = 'Data Monitoring';
		$data['user']  = $this->M_monitoring->get_where();
		$data['monitor'] = $this->M_monitoring->get();
		// var_dump($data['monitor']);die;
		$data['pekerjaan'] = $this->M_pekerjaan->get();
		$data['team'] = $this->M_team->get();
		$this->form_validation->set_rules('pekerjaan_id','Id Pekerjaan','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('team_id','Id Pekerjaan','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('progres','Progres','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('tanggal','Tanggal','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('keterangan','Keterangan','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/monitoring/index', $data);
			$this->load->view('templates/footer');
		}
		else{
			$pekerjaan_id = $this->input->post('pekerjaan_id');
			$team_id = $this->input->post('team_id');
			$progres = $this->input->post('progres');
			$tanggal = $this->input->post('tanggal');
			$keterangan = $this->input->post('keterangan');

			$data = [
				'pekerjaan_id' 	=> $pekerjaan_id,
				'team_id' 		=> $team_id,
				'progres' 		=> $progres,
				'tanggal' 		=> $tanggal,
				'keterangan'	=> $keterangan
			];

			$this->M_monitoring->insert($data);
			$this->session->set_flashdata('monitor','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Dara Monitoring Berhasil Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div');
			redirect('Admin/Monitoring');
		}
	}

	public function edit(){
		$id 			= $this->input->post('id');
		$kode_pekerjaan = $this->input->post('pekerjaan_id');
		$kode_team 		= $this->input->post('team_id');
		$progres 		= $this->input->post('progres');
		$tanggal 		= $this->input->post('tanggal');
		$keterangan 	= $this->input->post('keterangan');

		$data = [
			'pekerjaan_id' => $kode_pekerjaan,
			'team_id' => $kode_team,
			'progres' => $progres,
			'tanggal' => $tanggal,
			'keterangan' => $keterangan
		];

		$where = ['id_monitoring' => $id];

		$this->M_monitoring->edit($where,$data);
		$this->session->set_flashdata('monitor','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Dara Monitoring Berhasil Di Ubah
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div');
		redirect('Admin/Monitoring');
	}

	public function delete(){
		$where = ['id_monitoring' => $id];
		$this->M_monitoring->delete($where);
		$this->session->set_flashdata('monitor','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Dara Monitoring Berhasil Di Hapus
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div');
		redirect('Admin/Monitoring');
	}
}