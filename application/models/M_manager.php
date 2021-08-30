<?php 

class M_manager extends CI_Model{
	public function get_where(){
		return $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function filterbytanggal($dari,$sampai){
		// $query = $this->db->query("SELECT * FROM tb_monitoring WHERE tanggal BETWEEN '$dari' AND '$sampai' ORDER_BY tanggal ASC ");
		// return $query->result();

		$query = $this->db->query("SELECT * FROM tb_monitoring WHERE tanggal BETWEEN '$dari' AND '$sampai' ORDER BY tanggal ASC ");
		return $query->result();
	}
}