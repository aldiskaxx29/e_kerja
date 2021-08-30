<?php 

class Lokasi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		$data['title'] = 'Data Lokasi';
		$data['user'] = $this->M_lokasi->get_where();
		$data['lokasi'] = $this->M_lokasi->get();
		$data['kode'] = $this->M_lokasi->kodeLokasi();
		$this->form_validation->set_rules('nama_lokasi','Nama Lokasi','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/lokasi/index', $data);
			$this->load->view('templates/footer');
		}
		else{
			$kode_lokasi = $this->input->post('kode_lokasi');
			$nama_lokasi = $this->input->post('nama_lokasi');

			$data = [
				'kode_lokasi' => $kode_lokasi,
				'nama_lokasi' => $nama_lokasi
			];

			$this->M_lokasi->insert($data);
			$this->session->set_flashdata('lokasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Lokasi Berhasil Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div');
			redirect('Admin/Lokasi');
		}
	}

	public function edit(){
		$id = $this->input->post('id');
		$kode_lokasi = $this->input->post('kode_lokasi');
		$nama_lokasi = $this->input->post('nama_lokasi');

		$data = [
			'kode_lokasi' => $kode_lokasi,
			'nama_lokasi' => $nama_lokasi
		];

		$where  = ['id_lokasi' => $id];

		$this->M_lokasi->edit($where,$data);
		$this->session->set_flashdata('lokasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Lokasi Berhasil Di Ubah
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div');
		redirect('Admin/Lokasi');
	}

	public function delete($id){
		$where = ['id_lokasi' => $id];
		$this->M_lokasi->delete($where);
		$this->session->set_flashdata('lokasi','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Lokasi Berhasil Di Hapus
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div');
		redirect('Admin/Lokasi');
	}
}