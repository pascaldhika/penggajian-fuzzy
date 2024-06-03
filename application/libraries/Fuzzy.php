<?php
class Fuzzy {
    
    // Fungsi-fungsi logika fuzzy yang sama seperti yang telah kita buat sebelumnya

    public function calculate_salary($experience, $education, $presence,) {
        $sedikit = min($this->masakerjaBaru($experience), $this->pendidikanSMA($education), $this->kehadiranKurang($Presence));
        $sedikit = min($this->masakerjaBaru($experience), $this->pendidikanSMA($education), $this->kehadiranCukup($Presence));
        $lumayan = min($this->masakerjaBaru($experience), $this->pendidikanSMA($education), $this->kehadiranBaik($Presence));
        $sedikit = min($this->masakerjaBaru($experience), $this->pendidikanS1($education), $this->kehadiranKurang($Presence));
        $sedikit = min($this->masakerjaBaru($experience), $this->pendidikanS1($education), $this->kehadiranCukup($Presence));
        $lumayan = min($this->masakerjaBaru($experience), $this->pendidikanS1($education), $this->kehadiranBaik($Presence));
        $sedikit = min($this->masakerjaBaru($experience), $this->pendidikanS2($education), $this->kehadiranKurang($Presence));
        $sedikit = min($this->masakerjaBaru($experience), $this->pendidikanS2($education), $this->kehadiranCukup($Presence));
        $lumayan = min($this->masakerjaBaru($experience), $this->pendidikanS2($education), $this->kehadiranBaik($Presence));
        $sedikit = min($this->masakerjaSedang($experience), $this->pendidikanSMA($education), $this->kehadiranKurang($Presence));
        $sedikit = min($this->masakerjaSedang($experience), $this->pendidikanSMA($education), $this->kehadiranCukup($Presence));
        $lumayan = min($this->masakerjaSedang($experience), $this->pendidikanSMA($education), $this->kehadiranBaik($Presence));
        $sedikit = min($this->masakerjaSedang($experience), $this->pendidikanS1($education), $this->kehadiranKurang($Presence));
        $lumayan = min($this->masakerjaSedang($experience), $this->pendidikanS1($education), $this->kehadiranCukup($Presence));
        $banyak = min($this->masakerjaSedang($experience), $this->pendidikanS1($education), $this->kehadiranBaik($Presence));
        $sedikit = min($this->masakerjaSedang($experience), $this->pendidikanS2($education), $this->kehadiranKurang($Presence));
        $lumayan = min($this->masakerjaSedang($experience), $this->pendidikanS2($education), $this->kehadiranCukup($Presence));
        $banyak = min($this->masakerjaSedang($experience), $this->pendidikanS2($education), $this->kehadiranBaik($Presence));
        $sedikit = min($this->masakerjaLama($experience), $this->pendidikanSMA($education), $this->kehadiranKurang($Presence));
        $lumayan = min($this->masakerjaLama($experience), $this->pendidikanSMA($education), $this->kehadiranCukup($Presence));
        $lumayan = min($this->masakerjaLama($experience), $this->pendidikanSMA($education), $this->kehadiranBaik($Presence));
        $sedikit = min($this->masakerjaLama($experience), $this->pendidikanS1($education), $this->kehadiranKurang($Presence));
        $lumayan = min($this->masakerjaLama($experience), $this->pendidikanS1($education), $this->kehadiranCukup($Presence));
        $banyak = min($this->masakerjaLama($experience), $this->pendidikanS1($education), $this->kehadiranBaik($Presence));
        $lumayan = min($this->masakerjaLama($experience), $this->pendidikanS2($education), $this->kehadiranKurang($Presence));
        $lumayan = min($this->masakerjaLama($experience), $this->pendidikanS2($education), $this->kehadiranCukup($Presence));
        $banyak = min($this->masakerjaLama($experience), $this->pendidikanS2($education), $this->kehadiranBaik($Presence));

        $numerator = $sedikit * 34000 + $lumayan * 55000 + $banyak * 68000;
        $denominator = $sedikit + $lumayan + $banyak;

        if ($denominator == 0) return 0;

        return $numerator / $denominator;
    }

    // Fungsi-fungsi keanggotaan lainnya
}
?>
