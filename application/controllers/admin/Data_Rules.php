<?php

class Data_Rules extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('hak_akses') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda Belum Login!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('login');
		}
	}
	
	public function index() 
	{
		$data['title'] = "Data Rules";
		$data['rules'] = $this->ModelPenggajian->get_data('data_rules')->result();
		$data['predikat'] = $this->ModelPenggajian->get_data('data_predikat')->result();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/rules/data_rules', $data);
		$this->load->view('template_admin/footer');
	}
}

?>