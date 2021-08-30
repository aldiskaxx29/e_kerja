<?php  

class Pekerjaan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		if (!$this->session->userdata('email')) {
			redirect('Auth');
		}
		$data['title'] 	= 'Data Pekerjaan';
		$data['user'] 	= $this->M_admin->get_where();
		$data['kode'] 	= $this->M_pekerjaan->kodePekerjaan();
		$data['pekerjaan'] = $this->M_pekerjaan->get();
		$data['lokasi'] 	= $this->M_lokasi->get();
		$data['kegiatan'] 	= $this->M_kegiatan->get();

		$this->form_validation->set_rules('kode_pekerjaan','Kode Pekerjaan','required|trim|is_unique[tb_pekerjaan.kode_pekerjaan]', [
			'required' => 'Tidak Boleh Kosong',
			'is_unique' => 'Data Tidak Boleh Sama'
		]);
		$this->form_validation->set_rules('kegiatan_id','Id Kegiatan','required|trim', [
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('lokasi_id','Id Lokasi','required|trim', [
			'required' => 'Tidak Boleh Kosong',
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar');
			$this->load->view('Admin/pekerjaan/index', $data);
			$this->load->view('templates/footer');		
		}else{
			$kode_pekerjaan = $this->input->post('kode_pekerjaan');
			$lokasi_id = $this->input->post('lokasi_id');
			$kegiatan_id = $this->input->post('kegiatan_id');

			$data = [
				'kode_pekerjaan' => $kode_pekerjaan,
				'lokasi_id' => $lokasi_id,
				'kegiatan_id' => $kegiatan_id,
			];

			// var_dump($data);die;
			$this->M_pekerjaan->insert($data);
			$this->session->set_flashdata('pekerjaan','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Pekerjaan Berhasil Di Tambahkan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
			redirect('Admin/Pekerjaan');
		}
	}

	public function edit(){
		$id = $this->input->post('id');
		// $where = ['id_pekerjaan' => $id];
		// $where = ['id_produk' => $id];
		// $data['pekerjaan'] = $this->M_pekerjaan->tampil_id($where);

		$id 				= $this->input->post('id');
		$kode_pekerjaan 	= $this->input->post('kode_pekerjaan');
		$lokasi_id 			= $this->input->post('lokasi_id');
		$kegiatan_id 		= $this->input->post('kegiatan_id');

		$data = [
			'kode_pekerjaan' => $kode_pekerjaan,
			'lokasi_id' => $lokasi_id,
			'kegiatan_id' => $kegiatan_id,
		];
		// var_dump($data);die;
		$where = ['id_pekerjaan' => $id];
		$this->M_pekerjaan->edit($where,$data);
		$this->session->set_flashdata('pekerjaan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Pekerjaan Berhasil Di Ubah
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Pekerjaan');
	}

	public function delete($id){
		$where = ['id_pekerjaan' => $id];
		$data['pekerjaan'] = $this->db->get_where('tb_pekerjaan', $where)->row_array();
		// $gambar = $data['produk']['gambar'];
		// var_dump($data['produk']);die;
		// if ($gambar) {
		// 	unlink(FCPATH . './assets/img/produk/' .$gambar);
		// }
		$this->M_pekerjaan->delete($where);
		$this->session->set_flashdata('pekerjaan','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Pekerjaan Berhasil Di Hapus
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>');
		redirect('Admin/Pekerjaan');
	}
}

?>