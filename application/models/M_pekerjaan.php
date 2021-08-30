<?php  

class M_pekerjaan extends CI_Model{

	private $table = 'tb_pekerjaan';

	public function get_where(){
		return $this->db->get_where($this->table, ['email' => $this->session->userdata('email')])->row_array();
	}

	public function tampil_id($where){
		return $this->db->get_where($this->table, $where)->row_array();
	}

	public function get(){
		return $this->db->get($this->table)->result();
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

	public function get_order(){
		$this->db->from('orderan');
		$this->db->where('status',1);
		// $this->db->where('status',2);
		$query = $this->db->get();
		return $query->result();
	}
	public function join_order(){
		$this->db->select('*');
		$this->db->from('orderan');
		$this->db->join('produk','produk.id_produk=orderan.id_produk');
		$this->db->where_in('status', [1,2,3]);
		// $this->db->where('status', 0);
		// $this->db->order_by('DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function kodePekerjaan(){
		$this->db->select('RIGHT(tb_pekerjaan.kode_pekerjaan,4) as kode', FALSE);
		$this->db->order_by('kode_pekerjaan','DESC');
		$this->db->limit(1);

		$query = $this->db->get('tb_pekerjaan');
		if ($query->num_rows() > 0) {
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}
		else{
			$kode=1;
		}

		$kode_max = str_pad($kode,4,"0",STR_PAD_LEFT);
		$kode_fix = "PKR" .$kode_max;
		return $kode_fix;
	}

	public function kodeToko(){
		$this->db->select('RIGHT(toko.kode_toko,5) as kode', FALSE);
		$this->db->order_by('kode_toko','DESC');
		$this->db->limit(1);

		$query = $this->db->get('toko');
		if ($query->num_rows() > 0) {
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}
		else{
			$kode=1;
		}
		$kode_max = str_pad($kode,5,"0",STR_PAD_LEFT);
		$kode_fix = "FE" .$kode_max;
		return $kode_fix;
	}

	//sales
	public function tampilSales(){
		 // return  $this->db->get_where('user', array('company' => 'SALES'));
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('company','SALES');
		
		return $this->db->get();
		// $this->db->select('*');
  //       $this->db->from('karyawan');
  //       $this->db->where('alamat','jakarta');
  //       return  $this->db->get();
	}
}

?>