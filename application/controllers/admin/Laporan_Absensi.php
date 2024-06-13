<?php

class Laporan_Absensi extends CI_Controller {

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
		$data['title'] = "Laporan Absensi Pegawai";

		$this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/absensi/laporan_absensi');
		$this->load->view('template_admin/footer');
	}

	public function cetak_laporan_absensi(){

		$data['title'] = "Cetak Laporan Absensi Pegawai";
		if($this->input->post('bulan') && $this->input->post('tahun')){
				$bulan = $this->input->post('bulan');
				$tahun = $this->input->post('tahun');
				$bulantahun = $bulan.$tahun;
			}else{
				$bulan = date('m');
				$tahun = date('Y');
				$bulantahun = $bulan.$tahun;
			}
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;
		$data['bulantahun'] = $bulantahun;
		$data['lap_kehadiran'] = $this->db->query("SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' ORDER BY nama_pegawai ASC")->result();
		$this->load->view('template_admin/header',$data);
		$this->load->view('admin/absensi/cetak_absensi', $data);
	}
}

?>