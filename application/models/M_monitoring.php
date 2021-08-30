<?php 

class M_monitoring extends CI_Model{
	private $table = 'tb_monitoring';


	public function get_where(){
		return $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
	}
	public function get(){
		$this->db->select('*');
		$this->db->from('tb_monitoring');
		$this->db->join('tb_pekerjaan', 'tb_pekerjaan.id_pekerjaan = tb_monitoring.pekerjaan_id', 'left');
		// $this->db->join('tb_pekerjaan', 'tb_pekerjaan.id_pekerjaan = tb_monitoring.pendaftaran_id', 'left');
		$this->db->join('tb_team', 'tb_team.id_team = tb_monitoring.team_id', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function insert($data){
		$this->db->insert($this->table,$data);
	}

	public function edit($where,$data){
		$this->db->where($where);
		$this->db->update($this->table,$data);
	}

	public function delete($where){
		$this->db->where($where);
		$this->db->delete($this->table);
	}
}