<?php
$pageTitle = "Data Lowongan Pekerjaan";
$page = 'lowongan';
include __DIR__ . '/../header.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4><i class="fa fa-list-check me-2"></i>Data Lowongan</h4>
    <a href="index.php?page=lowongan_create" class="btn btn-primary"><i class="fa fa-plus me-1"></i> Tambah Lowongan</a>
</div>

<!-- Search Form -->
<form class="row g-2 mb-4" method="get" action="index.php">
    <input type="hidden" name="page" value="lowongan">
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
            <input type="text" name="search" class="form-control" placeholder="Cari perusahaan, posisi, lokasi..." value="<?= htmlspecialchars($search ?? '') ?>">
            <button class="btn btn-outline-secondary" type="submit">Cari</button>
        </div>
    </div>
</form>

<!-- Notifikasi -->
<?php if (isset($_GET['msg'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php
        switch ($_GET['msg']) {
            case 'created': echo "Data berhasil ditambahkan."; break;
            case 'updated': echo "Data berhasil diperbarui."; break;
            case 'deleted': echo "Data berhasil dihapus."; break;
        }
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Tabel Data -->
<div class="panel">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Perusahaan</th>
                    <th>Posisi</th>
                    <th>Lokasi</th>
                    <th>Gaji</th>
                    <th>Periode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">Tidak ada data lowongan.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><span class="badge bg-secondary"><?= $row['id'] ?></span></td>
                        <td><strong><?= htmlspecialchars($row['perusahaan']) ?></strong></td>
                        <td><?= htmlspecialchars($row['posisi']) ?></td>
                        <td><?= htmlspecialchars($row['lokasi']) ?></td>
                        <td><?= htmlspecialchars($row['gaji']) ?></td>
                        <td><span class="badge bg-success"><?= $row['tanggal_buka'] ?> - <?= $row['tanggal_tutup'] ?></span></td>
                        <td>
                            <a href="index.php?page=lowongan_detail&id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-info" title="Detail"><i class="fa fa-eye"></i></a>
                            <a href="index.php?page=lowongan_edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fa fa-pen"></i></a>
                            <a href="index.php?page=lowongan_delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus data ini?')" title="Hapus"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../footer.php'; ?>