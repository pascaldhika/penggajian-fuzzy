<?php

class Laporan_Data_Fuzzy extends CI_Controller {

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

	public function index() {	
		$data['title'] = "Laporan Data Fuzzy";
		$data['pegawai'] = $this->ModelPenggajian->get_data('data_pegawai')-> result();
		$data['gaji'] = $this->db->query("SELECT * FROM data_fuzzy ORDER BY nama_pegawai ASC")->result();

		$this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/fuzzy/laporan_data_fuzzy');
		$this->load->view('template_admin/footer');
	}

	public function cetak_laporan_fuzzy(){

		$data['title'] = "Cetak Laporan Data Fuzzy";

		if($this->input->post('nama_pegawai')){
			$nama_pegawai = $this->input->post('nama_pegawai');
			$data['lap_data_fuzzy'] = $this->db->query("SELECT * FROM data_fuzzy WHERE nama_pegawai='$nama_pegawai' ORDER BY nama_pegawai ASC")->result();
		}else{
			$nama_pegawai = '';
			$data['lap_data_fuzzy'] = $this->db->query("SELECT * FROM data_fuzzy ORDER BY nama_pegawai ASC")->result();
		}
		$data['nama_pegawai'] = $nama_pegawai;
		
		$this->load->view('template_admin/header',$data);
		$this->load->view('admin/fuzzy/cetak_fuzzy', $data);
	}
}

?>