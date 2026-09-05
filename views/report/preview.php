<?php
$pageTitle = "Pratinjau Laporan";
$page = 'laporan';
include __DIR__ . '/../header.php';
?>

<div class="panel">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold"><i class="fa fa-file-excel me-2"></i>Pratinjau Laporan Lowongan</h4>
        <div>
            <a href="index.php?page=lowongan" class="btn btn-outline-secondary me-2"><i class="fa fa-arrow-left me-1"></i> Kembali</a>
            <a href="index.php?page=report_excel" class="btn btn-success"><i class="fa fa-download me-1"></i> Download Excel</a>
        </div>
    </div>

    <!-- Dashboard Ringkasan -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-primary text-white">
                <div class="card-body text-center">
                    <h5 class="card-title"><?= $stats['total'] ?></h5>
                    <small>Total Lowongan</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-success text-white">
                <div class="card-body text-center">
                    <h5><?= $stats['aktif'] ?></h5>
                    <small>Masih Aktif</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-warning text-dark">
                <div class="card-body text-center">
                    <h5><?= $stats['kadaluarsa'] ?></h5>
                    <small>Kadaluarsa</small>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 bg-danger text-white">
                <div class="card-body text-center">
                    <h5><?= $stats['rata_gaji'] ?></h5>
                    <small>Rata‑rata Gaji</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Cetak -->
    <div class="alert alert-light border mb-4">
        <div class="row">
            <div class="col-md-4"><strong>Total Data:</strong> <?= $total ?> lowongan</div>
            <div class="col-md-4"><strong>Dicetak oleh:</strong> <?= htmlspecialchars($userCetak) ?></div>
            <div class="col-md-4"><strong>Tanggal:</strong> <?= $tglCetak ?></div>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Perusahaan</th>
                    <th>Posisi</th>
                    <th>Lokasi</th>
                    <th>Gaji</th>
                    <th>Buka</th>
                    <th>Tutup</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data)): ?>
                    <tr><td colspan="7" class="text-center py-4">Tidak ada data lowongan.</td></tr>
                <?php else: ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><span class="badge bg-secondary"><?= $row['id'] ?></span></td>
                        <td><strong><?= htmlspecialchars($row['perusahaan']) ?></strong></td>
                        <td><?= htmlspecialchars($row['posisi']) ?></td>
                        <td><?= htmlspecialchars($row['lokasi']) ?></td>
                        <td><?= htmlspecialchars($row['gaji']) ?></td>
                        <td><?= $row['tanggal_buka'] ?></td>
                        <td><?= $row['tanggal_tutup'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="text-muted small mt-3">
        &copy; <?= date('Y') ?> E-Recruitment Enterprise | Data ditampilkan secara real‑time
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>