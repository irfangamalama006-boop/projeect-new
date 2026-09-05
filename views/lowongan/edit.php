<?php
$pageTitle = "Edit Lowongan";
$page = 'lowongan_edit';
include __DIR__ . '/../header.php';
?>

<div class="panel">
    <h4 class="mb-4"><i class="fa fa-pen-to-square me-2"></i>Edit Lowongan #<?= $lowongan['id'] ?></h4>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $e): ?>
                    <li><?= $e ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data" action="index.php?page=lowongan_edit&id=<?= $lowongan['id'] ?>">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Perusahaan <span class="text-danger">*</span></label>
                <input type="text" name="perusahaan" class="form-control" value="<?= htmlspecialchars($_POST['perusahaan'] ?? $lowongan['perusahaan']) ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Posisi <span class="text-danger">*</span></label>
                <input type="text" name="posisi" class="form-control" value="<?= htmlspecialchars($_POST['posisi'] ?? $lowongan['posisi']) ?>" required>
            </div>
            <div class="col-12">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($_POST['deskripsi'] ?? $lowongan['deskripsi']) ?></textarea>
            </div>
            <div class="col-12">
                <label>Kualifikasi</label>
                <textarea name="kualifikasi" class="form-control" rows="2"><?= htmlspecialchars($_POST['kualifikasi'] ?? $lowongan['kualifikasi']) ?></textarea>
            </div>
            <div class="col-md-4">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="<?= htmlspecialchars($_POST['lokasi'] ?? $lowongan['lokasi']) ?>">
            </div>
            <div class="col-md-4">
                <label>Gaji</label>
                <input type="text" name="gaji" class="form-control" value="<?= htmlspecialchars($_POST['gaji'] ?? $lowongan['gaji']) ?>">
            </div>
            <div class="col-md-2">
                <label>Tanggal Buka <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_buka" class="form-control" value="<?= $_POST['tanggal_buka'] ?? $lowongan['tanggal_buka'] ?>" required>
            </div>
            <div class="col-md-2">
                <label>Tanggal Tutup <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_tutup" class="form-control" value="<?= $_POST['tanggal_tutup'] ?? $lowongan['tanggal_tutup'] ?>" required>
            </div>
            <div class="col-md-6">
                <label>Logo Perusahaan (max 2MB, JPG/PNG)</label>
                <?php if (!empty($lowongan['gambar_perusahaan'])): ?>
                    <div class="mb-2">
                        <img src="uploads/<?= $lowongan['gambar_perusahaan'] ?>" height="60" alt="Logo saat ini">
                        <small class="text-muted ms-2">(Logo saat ini)</small>
                    </div>
                <?php endif; ?>
                <input type="file" name="gambar" class="form-control">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah logo.</small>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4"><i class="fa fa-save me-1"></i> Update</button>
                <a href="index.php?page=lowongan" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../footer.php'; ?>