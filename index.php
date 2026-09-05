<?php
session_start();

// Cek halaman yang diminta
$page = $_GET['page'] ?? 'dashboard';

// Daftar halaman yang memerlukan login
$authPages = [
    'dashboard', 'lowongan', 'lowongan_create', 'lowongan_edit',
    'lowongan_detail', 'lowongan_delete',
    'report_pdf', 'report_excel', 'report_preview'
];

if (in_array($page, $authPages) && !isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit;
}

// Routing
switch ($page) {
    case 'login':
        require 'controllers/AuthController.php';
        (new AuthController())->login();
        break;

    case 'register':
        require 'controllers/AuthController.php';
        (new AuthController())->register();
        break;

    case 'logout':
        require 'controllers/AuthController.php';
        (new AuthController())->logout();
        break;

    case 'dashboard':
        require_once 'models/Lowongan.php';
        $lowonganModel = new Lowongan();
        $stats = $lowonganModel->getStats();
        include 'views/dashboard.php';
        break;

    case 'lowongan':
        require 'controllers/LowonganController.php';
        (new LowonganController())->index();
        break;

    case 'lowongan_create':
        require 'controllers/LowonganController.php';
        (new LowonganController())->create();
        break;

    case 'lowongan_edit':
        require 'controllers/LowonganController.php';
        (new LowonganController())->edit();
        break;

    case 'lowongan_detail':
        require 'controllers/LowonganController.php';
        (new LowonganController())->detail();
        break;

    case 'lowongan_delete':
        require 'controllers/LowonganController.php';
        (new LowonganController())->delete();
        break;

    case 'report_pdf':
        require 'controllers/ReportController.php';
        (new ReportController())->pdf();
        break;

    case 'report_excel':
        require 'controllers/ReportController.php';
        (new ReportController())->excel();
        break;

    case 'report_preview':
        require 'controllers/ReportController.php';
        (new ReportController())->preview();
        break;

    case 'manual':
        include 'views/manual.php';
        break;

    default:
        header('Location: index.php?page=dashboard');
        exit;
}