<?php 

class Laporan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		auth_check();
	}
	public function index(){
		$data['title'] = 'Data Laporan';
		$data['user'] = $this->M_manager->get_where();
		$this->form_validation->set_rules('dari','Tanggal','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('sampai','Tanggal','required|trim',[
			'required' => 'Tidak Boleh Kosong',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('manager/laporan');
			$this->load->view('templates/footer');			
		}
		else{
			$data['title'] = 'Filter Laporan';
			$data['user'] = $this->M_manager->get_where();
			$dari = $this->input->post('dari');
			$sampai = $this->input->post('sampai');
			$data['filter'] = $this->M_manager->filterbytanggal($dari,$sampai);

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('manager/filter_laporan', $data);
			$this->load->view('templates/footer');
		}
	}

	// public function filter(){
	// 	$data['title'] = 'Filter Laporan';
	// 	$data['user'] = $this->M_manager->get_where();
	// 	$dari = $this->input->post('dari');
	// 	$sampai = $this->input->post('sampai');
	// 	$data['tanggal'] = $this->M_manager->filterbytanggal($dari,$sampai);
	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('templates/sidebar', $data);
	// 	$this->load->view('templates/topbar', $data);
	// 	$this->load->view('manager/filter_laporan');
	// 	$this->load->view('templates/footer');
	// }

	public function print(){
		$dara['title'] = 'Print Data Laporan Monitoring';
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');

		$data['title'] = 'Laporan Monitoring';
		$data['subtitle'] = "Dari Tanggal : " .$dari. ' Sampai Tanggal : ' .$sampai;
		$data['filter'] = $this->M_manager->filterbytanggal($dari,$sampai);

		$this->load->view('Manager/print_laporan', $data);

			// $data['title'] = 'Print Data Laporan Order';
			// // $data['user'] = $this->M_pimpinan->get_where();
			// $dari = $this->input->get('dari');
			// $sampai = $this->input->get('sampai');

			// $data['title'] = "Laporan Orderan ";
			// $data['subtitle'] = "Dari Tanggal : " .$dari. ' Sampai Tanggal : ' .$sampai;
			// $data['filter'] = $this->M_pimpinan->filterbytanggal($dari,$sampai);

			// $this->load->view('Pimpinan/LaporanOrder/printLaporan', $data);
	}
}