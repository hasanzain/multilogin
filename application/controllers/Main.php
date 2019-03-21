<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Main extends My_Controller {

		protected $access = array('Admin', 'Pelanggan');
	
		public function index()
		{

			$title = array(
				'title' => 'Dashboard' ,
			);
			$data = array(
				'admin' =>$this->db->get('admin'),
				'kontak' =>$this->db->get('kontak'),
				'setting' =>$this->db->get('setting'),
				'slide' =>$this->db->get('slide'), 
			);

			$this->load->view('cover/header',$title);
			$this->load->view('index',$data);
			$this->load->view('cover/footer');
		}
	
	}
	
	/* End of file Main.php */
	/* Location: ./application/controllers/Main.php */
