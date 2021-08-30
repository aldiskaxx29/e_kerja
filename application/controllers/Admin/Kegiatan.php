<?php 

class Kegiatan extends CI_COntroller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		$data['title'] = 'Data Kegiatan';
		$data['user'] = $this->M_kegiatan->get_where();
		$data['kegiatan'] = $this->M_kegiatan->get();
		$data['kode'] = $this->M_kegiatan->kodeKegiatan();
		$this->form_validation->set_rules('kode_kegiatan','Kode Kegiatan','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/kegiatan/index', $data);
			$this->load->view('templates/footer');
		}else{
			$kode_kegiatan = $this->input->post('kode_kegiatan');
			$nama_kegiatan = $this->input->post('nama_kegiatan');

			$data = [
				'kode_kegiatan' => $kode_kegiatan,
				'nama_kegiatan' => $nama_kegiatan
			];

			$this->M_kegiatan->insert($data);
			$this->session->set_flashdata('kegiatan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Kegiatan Berhasil Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin/Kegiatan');
		}
	}

	public function edit(){
		$id = $this->input->post('id');
		$kode_kegiatan = $this->input->post('kode_kegiatan');
		$nama_kegiatan = $this->input->post('nama_kegiatan');

		$data = [
			'kode_kegiatan' => $kode_kegiatan,
			'nama_kegiatan' => $nama_kegiatan
		];

		$where = ['id_kegiatan' => $id];
		$this->M_kegiatan->edit($where,$data);
		$this->session->set_flashdata('kegiatan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Kegiatan Berhasil Di Ubah
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Kegiatan');
	}

	public function delete($id){
		$where = ['id_kegiatan' => $id];
		$this->M_kegiatan->delete($where);
		$this->session->set_flashdata('kegiatan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Kegiatan Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Kegiatan');
	}
}