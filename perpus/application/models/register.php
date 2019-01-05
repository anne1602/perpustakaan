<?php 	

class register extends CI_model{

	public function __construct()
	{
		$this->load->model('register');
	}

	public function register($data)
	{
		$query = $this->db->insert("member", $data);

		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function ceklog($email, $password)
	{
           $this->db->select('*');
           $this->db->from('user');
           $this->db->where('email', $email);
           $this->db->where('password',$password);

           return $this->db->get()->num_rows(); 
    }

    public function get_all()
	{
		$query = $this->db->select("*")
					->from('anggota')
					->order_by('id_anggota' , 'DESC')
					->get();
		return $query->result();
	}

	public function get_buku(){
		$query = $this->db->select("*")
					->from('buku')
					->order_by('kd_buku' , 'DESC')
					->get();
		return $query->result();
	}
	
	public function get_pinjam(){
		$query = $this->db->select("*")
					->from('pinjam')
					->order_by('id_transaksi' , 'DESC')
					->get();
		return $query->result();
	}
	
}