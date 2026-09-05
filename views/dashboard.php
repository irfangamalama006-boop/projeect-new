<?php
$pageTitle = "Executive Dashboard";
$pageSubtitle = "Monitoring Rekrutmen Nasional";
$page = 'dashboard';
include __DIR__ . '/header.php';
?>

<!-- Statistik Dinamis -->
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-primary position-relative">
            <div class="card-body">
                <h6>Total Lowongan</h6>
                <h2><?= $stats['total'] ?></h2>
                <div class="icon"><i class="fa fa-briefcase"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-success position-relative">
            <div class="card-body">
                <h6>Lowongan Aktif</h6>
                <h2><?= $stats['aktif'] ?></h2>
                <div class="icon"><i class="fa fa-check-circle"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-warning position-relative">
            <div class="card-body">
                <h6>Kadaluarsa</h6>
                <h2><?= $stats['kadaluarsa'] ?></h2>
                <div class="icon"><i class="fa fa-clock"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card stat-card bg-danger position-relative">
            <div class="card-body">
                <h6>Rata‑rata Gaji</h6>
                <h2><?= $stats['rata_gaji'] ?></h2>
                <div class="icon"><i class="fa fa-money-bill-wave"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- Panel Aktivitas -->
<div class="panel">
    <h5>Aktivitas Terbaru</h5>
    <hr>
    <p>✔ Login sebagai <strong><?= $_SESSION['username'] ?></strong></p>
    <p>✔ 5 lowongan aktif</p>
    <p>✔ Export laporan siap</p>
</div>

<?php include __DIR__ . '/footer.php'; ?>