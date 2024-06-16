<?php

class ModelPenggajian extends CI_model{

	public function get_data($table) {
		return $this->db->get($table);
	}

	public function insert_data($data,$table){
		$this->db->insert($table, $data);
	}

	public function update_data($table, $data, $whare){
		$this->db->update($table, $data, $whare);
	}

	public function delete_data($whare,$table){
		$this->db->where($whare);
		$this->db->delete($table);
	}

	public function insert_batch($table = null, $data = array()) {
		$jumlah = count($data);
		if ($jumlah > 0) {
			$this->db->insert_batch($table, $data);
		}
	}

	public function cek_login()
	{
		$username = set_value('username');
		$password = set_value('password');

		$result = $this->db->where('username',$username)
							->where('password',md5($password))
							->limit(1)
							->get('data_pegawai');
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return FALSE;
		}
	}

	public function hitung_gaji_fuzzy($masa_kerja, $pendidikan, $kehadiran) 
	{
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
            $gaji_min = 1200000;
            $gaji_max = 1500000;
            $gaji_total = $gaji_min - (($gaji_max - $gaji_min) * $nilaiMin);
        } else{
            $gaji_min = 1350000;
            $gaji_max = 1500000;
            $gaji_total = $gaji_max - (($gaji_max - $gaji_min) * $nilaiMin);
        }

		$result['masa_kerja'] = $A1;
		$result['pendidikan'] = $A2;
		$result['kehadiran'] = $A3;
		$result['Kesimpulan'] = $Kesimpulan;
		$result['gaji_total'] = $gaji_total;

        return $result;
    }
}

?>