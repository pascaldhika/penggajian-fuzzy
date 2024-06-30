<?php

class Data_Fuzzy extends CI_Controller {

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
		$data['title'] = "Data Fuzzy";
		$data['pegawai'] = $this->ModelPenggajian->get_data('data_pegawai')-> result();
		
		if((isset($_GET['id_pegawai']) && $_GET['id_pegawai']!='') && (isset($_GET['kehadiran']) && $_GET['kehadiran']!='')){
			$id_pegawai = $_GET['id_pegawai'];
			$data_pegawai = $this->db->query("SELECT data_pegawai.id_pegawai, data_pegawai.nama_pegawai, 
				data_pegawai.pendidikan, TIMESTAMPDIFF(MONTH,data_pegawai.tanggal_masuk,NOW()) AS masa_kerja
				FROM data_pegawai WHERE data_pegawai.id_pegawai = '$id_pegawai' ")->result();

			$masa_kerja = $data_pegawai[0]->masa_kerja;
			$pendidikan = $data_pegawai[0]->pendidikan;
			$kehadiran = $_GET['kehadiran'];

			$data['gaji'] = $this->ModelPenggajian->hitung_gaji_fuzzy($masa_kerja, $pendidikan, $kehadiran);
			$data['nama_pegawai'] = $data_pegawai[0]->nama_pegawai;
			$data['masa_kerja'] = $data['gaji']['masa_kerja'];
			$data['pendidikan'] = $data['gaji']['pendidikan'];
			$data['kehadiran'] = $data['gaji']['kehadiran'];
			
			$result = array(
				'tanggal'		=> date('Y-m-d'),
				'nama_pegawai' 	=> $data['nama_pegawai'],
				'masa_kerja' 	=> $data['masa_kerja'],
				'pendidikan' 	=> $data['pendidikan'],
				'kehadiran' 	=> $data['kehadiran'],
				'nilai' 		=> $data['gaji']['gaji_total'],
			);

			$this->ModelPenggajian->insert_data($result, 'data_fuzzy');
		}else{
			$nama_pegawai = '';
			$masa_kerja = '';
			$pendidikan = '';
			$kehadiran = '';

			$data['gaji'] = [];
			$data['nama_pegawai'] = '';
			$data['masa_kerja'] = '';
			$data['pendidikan'] = '';
			$data['kehadiran'] = '';
		}

		
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/fuzzy/data_fuzzy', $data);
		$this->load->view('template_admin/footer');
	}
}

?>