<?php 

class M_team extends CI_Model{
	private $table = 'tb_team';

	public function get(){
		return $this->db->get($this->table)->result();
	}

	public function get_where(){
		return $this->db->get_where('tb_user',['email' => $this->session->userdata('email')])->row_array();
	}

	public function insert($data){
		$this->db->insert($this->table,$data);
	}

	public function edit($where,$data){
		$this->db->where($where);
		$this->db->update($this->table,$data);
	}

	public function delete($where){
		$this->db->delete($this->table,$where);
	}




	public function kodeTeam(){
		// $this->db->select('RIGHT(tb_team.kode_team,5) as kode', FALSE);
		// $this->db->order_by('kode_team','DESC');
		// $this->db->limit(1);

		// $query = $this->db->get($this->table);
		// if ($query->num_rows() > 0) {
		// 	$data = $query->row();
		// 	$kode = intval($data->kode)+1;
		// }
		// else{
		// 	$kode=1;
		// }

		// $kode_max = str_pad($kode,5,"0",STR_PAD_LEFT);
		// $kode_fix = "TM" .$kode_max;
		// return $kode_fix;


		$this->db->select('RIGHT(tb_team.kode_team,5) as kode', FALSE);
		$this->db->order_by('kode_team','DESC');
		$this->db->limit(1);

		$query = $this->db->get('tb_team');
		if ($query->num_rows() > 0) {
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}
		else{
			$kode=1;
		}

		$kode_max = str_pad($kode,5,"0",STR_PAD_LEFT);
		$kode_fix = "TM" .$kode_max;
		return $kode_fix;
	}
}