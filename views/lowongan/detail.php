<?php
$pageTitle = "Detail Lowongan";
$page = 'lowongan_detail';
include __DIR__ . '/../header.php';
?>

<div class="panel">
    <div class="d-flex align-items-center gap-3 mb-4">
        <h4 class="fw-bold"><i class="fa fa-eye me-2"></i>Detail Lowongan #<?= $lowongan['id'] ?></h4>
        <span class="badge bg-success ms-auto">Aktif</span>
    </div>

    <div class="row">
        <!-- Gambar perusahaan -->
        <div class="col-md-3 text-center">
            <?php if (!empty($lowongan['gambar_perusahaan'])): ?>
                <img src="uploads/<?= $lowongan['gambar_perusahaan'] ?>" class="img-fluid rounded mb-3" alt="Logo Perusahaan">
            <?php else: ?>
                <i class="fa fa-building fa-5x text-muted mb-3"></i>
            <?php endif; ?>
        </div>

        <!-- Informasi lowongan -->
        <div class="col-md-9">
            <table class="table table-borderless">
                <tr>
                    <td class="text-muted" style="width: 150px;">Perusahaan</td>
                    <td><strong><?= htmlspecialchars($lowongan['perusahaan']) ?></strong></td>
                </tr>
                <tr>
                    <td class="text-muted">Posisi</td>
                    <td><?= htmlspecialchars($lowongan['posisi']) ?></td>
                </tr>
                <tr>
                    <td class="text-muted">Deskripsi</td>
                    <td><?= nl2br(htmlspecialchars($lowongan['deskripsi'])) ?></td>
                </tr>
                <tr>
                    <td class="text-muted">Kualifikasi</td>
                    <td><?= nl2br(htmlspecialchars($lowongan['kualifikasi'])) ?></td>
                </tr>
                <tr>
                    <td class="text-muted">Lokasi</td>
                    <td><?= htmlspecialchars($lowongan['lokasi']) ?></td>
                </tr>
                <tr>
                    <td class="text-muted">Gaji</td>
                    <td><?= htmlspecialchars($lowongan['gaji']) ?></td>
                </tr>
                <tr>
                    <td class="text-muted">Periode</td>
                    <td>
                        <span class="badge bg-success">
                            <?= $lowongan['tanggal_buka'] ?> – <?= $lowongan['tanggal_tutup'] ?>
                        </span>
                    </td>
                </tr>
            </table>

            <a href="index.php?page=lowongan" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>