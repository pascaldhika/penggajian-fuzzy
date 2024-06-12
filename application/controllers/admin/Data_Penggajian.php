<?php

class Data_Penggajian extends CI_Controller {

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

    private function hitung_gaji_fuzzy($masa_kerja, $pendidikan, $kehadiran) {
        // Menentukan kategori masa kerja
        if ($masa_kerja >= 0 && $masa_kerja <= 12) {
            $A1 = 'Baru';
        } elseif ($masa_kerja >= 0 && $masa_kerja <= 24) {
            $A1 = 'Sedang';
        } else {
            $A1 = 'Lama';
        }

        // Menentukan kategori kehadiran
        $A2 = $pendidikan;

        // Menentukan kategori kehadiran
        if ($kehadiran >= 0 && $kehadiran <= 7) {
            $A3 = 'Kurang';
        } elseif ($kehadiran >= 7 && $kehadiran <= 14) {
            $A3 = 'Cukup';
        } else {
            $A3 = 'Baik';
        }

        $data['predikat'] = $this->db->query("SELECT data_predikat.*, data_rules.Kesimpulan 
            FROM data_rules 
            LEFT JOIN data_predikat ON data_rules.No = data_predikat.No
            WHERE data_rules.A1 = '$A1'
            AND data_rules.A2 = '$A2'
            AND data_rules.A3 = '$A3'")->result();

        // Implementasi
        $nilaiA1 = $data['predikat'][0]->A1;
        $nilaiA2 = $data['predikat'][0]->A2;
        $nilaiA3 = $data['predikat'][0]->A3;
        $Kesimpulan = $data['predikat'][0]->Kesimpulan;
        
        $a = array($nilaiA1, $nilaiA2, $nilaiA3);
        $nilaiMin = min($a);

        if ($Kesimpulan == 'Sedikit') {
            $gaji_min = 500000;
            $gaji_max = 750000;
            $gaji_total = $gaji_max - (($gaji_max - $gaji_min) * $nilaiMin);
        } elseif ($Kesimpulan == 'Lumayan') {
            $gaji_min = 750000;
            $gaji_max = 1350000;
            $gaji_total = $gaji_min - (($gaji_max - $gaji_min) * $nilaiMin);
        } else{
            $gaji_min = 1350000;
            $gaji_max = 1500000;
            $gaji_total = $gaji_max - (($gaji_max - $gaji_min) * $nilaiMin);
        }

        return $gaji_total;
    }

    public function index() 
    {
        $data['title'] = "Data Gaji Pegawai";
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        $data['potongan'] = $this->ModelPenggajian->get_data('potongan_gaji')->result();
        $data['gaji'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, data_pegawai.pendidikan, TIMESTAMPDIFF(MONTH,data_pegawai.tanggal_masuk,NOW()) AS masa_kerja,
            data_pegawai.jenis_kelamin, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok,
            data_kehadiran.hadir, data_kehadiran.sakit, data_kehadiran.alpha 
            FROM data_pegawai
            INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik
            INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
            WHERE data_kehadiran.bulan = '$bulantahun'
            ORDER BY data_pegawai.nama_pegawai ASC")->result();

        foreach ($data['gaji'] as &$gaji) {
            $gaji->gaji_total = $this->hitung_gaji_fuzzy($gaji->masa_kerja, $gaji->pendidikan, $gaji->hadir);
        }

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/gaji/data_gaji', $data);
        $this->load->view('template_admin/footer');
    }

    public function cetak_gaji(){
        $data['title'] = "Cetak Data Gaji Pegawai";
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        $data['potongan'] = $this->ModelPenggajian->get_data('potongan_gaji')->result();
        $data['cetak_gaji'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, data_pegawai.pendidikan, TIMESTAMPDIFF(MONTH,data_pegawai.tanggal_masuk,NOW()) AS masa_kerja,
            data_pegawai.jenis_kelamin, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok,
            data_kehadiran.hadir, data_kehadiran.sakit, data_kehadiran.alpha 
            FROM data_pegawai
            INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik
            INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
            WHERE data_kehadiran.bulan = '$bulantahun'
            ORDER BY data_pegawai.nama_pegawai ASC")->result();

        foreach ($data['cetak_gaji'] as &$gaji) {
            $gaji->gaji_total = $this->hitung_gaji_fuzzy($gaji->masa_kerja, $gaji->pendidikan, $gaji->hadir);
        }

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/gaji/cetak_gaji', $data);
    }
}
?>
