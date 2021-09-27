<?php 

class M_ketua extends CI_Model{
	private $table = 'tb_team';

	public function get_where(){
		return $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function get(){
		return $this->db->get('tb_team')->result();
	}

	public function update($where,$data){
		$this->db->where($where);
		$this->db->update($this->table,$data);
	}

	public function delete($where,$table){
		// $this->db->where($where);
		$this->db->delete($this->table,$where);
	}
}