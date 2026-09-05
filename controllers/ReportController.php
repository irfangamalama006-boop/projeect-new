<?php
require_once __DIR__ . '/../models/Lowongan.php';

class ReportController {
    public function pdf() {
        $model = new Lowongan();
        $data = $model->getAll();
        $total = count($data);
        // Ambil info user dari session (jika sudah login)
        $userCetak = $_SESSION['nama'] ?? 'Administrator';
        $tglCetak  = date('d-m-Y H:i:s');
        include __DIR__ . '/../views/report/pdf_report.php';
    }

    public function excel() {
        $model = new Lowongan();
        $data = $model->getAll();
        $total = count($data);
        $userCetak = $_SESSION['nama'] ?? 'Administrator';
        $tglCetak  = date('d-m-Y H:i:s');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=laporan_lowongan_".date('Ymd_His').".xls");
        include __DIR__ . '/../views/report/excel_report.php';
        exit;
    }

    public function preview() {
    $model = new Lowongan();
    $data = $model->getAll();
    $total = count($data);
    $stats = $model->getStats();
    $userCetak = $_SESSION['nama'] ?? 'Administrator';
    $tglCetak  = date('d-m-Y H:i:s');
    include __DIR__ . '/../views/report/preview.php';
}
}