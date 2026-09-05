<?php
require_once __DIR__ . '/../models/Lowongan.php';

class ReportController {
    // Tampilkan halaman PDF siap print
    public function pdf() {
        $model = new Lowongan();
        $data = $model->getAll();
        include __DIR__ . '/../views/report/pdf_report.php';
    }

    // Download Excel (HTML table)
    public function excel() {
        $model = new Lowongan();
        $data = $model->getAll();
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=laporan_lowongan_".date('Ymd').".xls");
        include __DIR__ . '/../views/report/excel_report.php';
        exit;
    }
}