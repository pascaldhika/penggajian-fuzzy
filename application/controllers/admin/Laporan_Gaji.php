<?php

class Laporan_Gaji extends CI_Controller {

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

    private function hitung_gaji_fuzzy($gaji_pokok, $hadir, $sakit, $alpha) {
        // Definisikan aturan fuzzy berdasarkan kehadiran
        $total_hadir = $hadir + $sakit;

        // Menentukan kategori kehadiran
        if ($total_hadir <= 7) {
            $kategori = 'Sedikit';
        } elseif ($total_hadir <= 14) {
            $kategori = 'Lumayan';
        } else {
            $kategori = 'Banyak';
        }

        // Menentukan potongan berdasarkan kategori kehadiran
        switch ($kategori) {
            case 'Sedikit':
                $potongan_per_alpha = 34000;
                break;
            case 'Lumayan':
                $potongan_per_alpha = 55000;
                break;
            case 'Banyak':
                $potongan_per_alpha = 68000;
                break;
            default:
                $potongan_per_alpha = 0;
                break;
        }

        $potongan = $alpha * $potongan_per_alpha;
        $gaji_total = $gaji_pokok - $potongan;
        return $gaji_total;
    }

    public function index() 
    {   
        $data['title'] = "Laporan Gaji Pegawai";

        $this->load->view('template_admin/header',$data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/gaji/laporan_gaji');
        $this->load->view('template_admin/footer');
    }

    public function cetak_laporan_gaji(){
        $data['title'] = "Cetak Laporan Gaji Pegawai";
        if((isset($_POST['bulan']) && $_POST['bulan'] != '') && (isset($_POST['tahun']) && $_POST['tahun'] != '')){
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        $data['potongan'] = $this->ModelPenggajian->get_data('potongan_gaji')->result();
        $data['cetak_gaji'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai,
            data_pegawai.jenis_kelamin, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok,
            data_kehadiran.hadir, data_kehadiran.sakit, data_kehadiran.alpha 
            FROM data_pegawai
            INNER JOIN data_kehadiran ON data_kehadiran.nik = data_pegawai.nik
            INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
            WHERE data_kehadiran.bulan = '$bulantahun'
            ORDER BY data_pegawai.nama_pegawai ASC")->result();

        foreach ($data['cetak_gaji'] as &$gaji) {
            $gaji->gaji_total = $this->hitung_gaji_fuzzy($gaji->gaji_pokok, $gaji->hadir, $gaji->sakit, $gaji->alpha);
        }

        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/gaji/cetak_gaji', $data);
    }
}
?>
