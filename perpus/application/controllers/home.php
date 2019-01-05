<?php 

class Home extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('register');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/index');
		$this->load->view('frontend/footer');
	} 

	public function login()
	{
		$this->load->view('frontend/login');
	}

	public function proses()
	{
         $email = $this->input->post('email');
         $password = $this->input->post('password');
         
         if ($this->register->ceklog($email, $password)== TRUE)
         {
             redirect('home/admin');
         }else{
              redirect('home/login');
         }
    }
	public function admin()
	{
		$this->load->view('frontend/admin');
	}

	public function anggota(){
		$data = array('title'	=> 'Data Anggota',
					  'anggota'	=> $this->register->get_all(), 
					);
		$this->load->view('frontend/anggota',$data);
	}

	public function buku(){
		$data = array('title'	=> 'Data Buku',
					  'buku'	=> $this->register->get_buku(), 
					);
		$this->load->view('buku',$data);
	}

	public function pinjam(){
		$data = array('title'	=> 'Data Pinjam',
					  'pinjam'	=> $this->register->get_pinjam(), 
					);
		$this->load->view('frontend/pinjam',$data);
	}

	public function register()
	{
		$data = array(

		'nama'  => $this->input->post("nama"),
		'email' => $this->input->post("email"),
		'telp'  => $this->input->post("telp"),
		'pesan' => $this->input->post("pesan"),
		);

		$this->register->register($data);

		redirect('home/index');
	}

} 