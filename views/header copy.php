<?php
if (!isset($_SESSION['user_id'])) { header('Location: index.php?page=login'); exit; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Recruitment • <?= $pageTitle ?? 'Dashboard' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary:#0f172a;
            --secondary:#1e293b;
            --accent:#2563eb;
            --gold:#f59e0b;
            --success:#10b981;
            --danger:#ef4444;
            --bg:#f1f5f9;
        }
        body {
            background: var(--bg);
            font-family: 'Segoe UI', sans-serif;
            margin-left: 280px;
            transition: margin-left 0.3s;
        }
        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: linear-gradient(180deg, #0f172a, #1e293b);
            color: #fff;
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s;
        }
        .sidebar .brand {
            padding: 25px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .sidebar .brand h4 { font-weight: 700; margin: 0; }
        .sidebar .brand small { color: #cbd5e1; }
        .sidebar .menu { padding: 20px 0; }
        .sidebar .menu-title {
            padding: 10px 25px;
            font-size: 12px;
            color: #94a3b8;
            text-transform: uppercase;
        }
        .sidebar .menu a {
            display: block;
            padding: 14px 25px;
            color: #fff;
            text-decoration: none;
            transition: .3s;
        }
        .sidebar .menu a:hover, .sidebar .menu a.active {
            background: #2563eb;
            padding-left: 35px;
        }
        .sidebar .menu i { width: 30px; }
        .topbar {
            height: 75px;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,.08);
            position: fixed;
            top: 0;
            right: 0;
            left: 280px;
            z-index: 999;
            transition: left 0.3s;
        }
        .content {
            padding: 100px 25px 25px 25px;
        }
        .stat-card {
            border: none;
            border-radius: 20px;
            color: white;
            overflow: hidden;
            transition: .3s;
        }
        .stat-card:hover { transform: translateY(-6px); }
        .stat-card .icon {
            font-size: 55px;
            opacity: .2;
            position: absolute;
            right: 20px;
            bottom: 10px;
        }
        .panel {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 2px 12px rgba(0,0,0,.06);
            margin-bottom: 25px;
        }
        @media (max-width: 992px) {
            body { margin-left: 0; }
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .topbar { left: 0; }
            .sidebar-toggle {
                display: block;
                position: fixed;
                top: 15px;
                left: 15px;
                z-index: 1100;
                background: #2563eb;
                color: white;
                border-radius: 8px;
                padding: 8px 12px;
                border: none;
            }
        }
        .sidebar-toggle { display: none; }
    </style>
</head>
<body>
<button class="sidebar-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
    <i class="fa fa-bars"></i> Menu
</button>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="brand">
        <h4>E-Recruitment</h4>
        <small>Enterprise Government</small>
    </div>
    <div class="menu">
        <div class="menu-title">Dashboard</div>
        <a href="index.php?page=dashboard" class="<?= ($page == 'dashboard') ? 'active' : '' ?>">
            <i class="fa fa-chart-line"></i> Executive Dashboard
        </a>
        <div class="menu-title">Manajemen Lowongan</div>
        <a href="index.php?page=lowongan" class="<?= (strpos($page, 'lowongan') !== false) ? 'active' : '' ?>">
            <i class="fa fa-briefcase"></i> Data Lowongan
        </a>
        <a href="index.php?page=lowongan_create"><i class="fa fa-plus-circle"></i> Tambah Lowongan</a>
        <div class="menu-title">Laporan</div>
        <a href="index.php?page=report_pdf"><i class="fa fa-file-pdf"></i> Laporan PDF</a>
        <a href="index.php?page=report_excel"><i class="fa fa-file-excel"></i> Laporan Excel</a>
        <a href="index.php?page=report_preview"><i class="fa fa-file-excel"></i> Laporan Excel</a>
        <div class="menu-title">Akun</div>
        <a href="index.php?page=logout" style="color:#f87171;"><i class="fa fa-sign-out-alt"></i> Logout (<?= $_SESSION['username'] ?>)</a>
    </div>
</div>

<!-- Topbar -->
<div class="topbar">
    <div>
        <h5 class="mb-0"><?= $pageTitle ?? 'Dashboard' ?></h5>
        <small><?= $pageSubtitle ?? '' ?></small>
    </div>
    <div>
        <i class="fa fa-user-circle me-2"></i> <?= $_SESSION['nama'] ?? 'Administrator' ?>
    </div>
</div>

<div class="content">