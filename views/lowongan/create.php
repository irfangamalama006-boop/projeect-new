<?php
$pageTitle = "Tambah Lowongan Baru";
$page = 'lowongan_create';
include __DIR__ . '/../header.php';
?>

<div class="panel">
    <h4 class="mb-4"><i class="fa fa-plus-circle me-2"></i>Tambah Lowongan Baru</h4>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $e): ?>
                    <li><?= $e ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data" action="index.php?page=lowongan_create">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Perusahaan <span class="text-danger">*</span></label>
                <input type="text" name="perusahaan" class="form-control" value="<?= htmlspecialchars($_POST['perusahaan'] ?? '') ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label fw-semibold">Posisi <span class="text-danger">*</span></label>
                <input type="text" name="posisi" class="form-control" value="<?= htmlspecialchars($_POST['posisi'] ?? '') ?>" required>
            </div>
            <div class="col-12">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($_POST['deskripsi'] ?? '') ?></textarea>
            </div>
            <div class="col-12">
                <label>Kualifikasi</label>
                <textarea name="kualifikasi" class="form-control" rows="2"><?= htmlspecialchars($_POST['kualifikasi'] ?? '') ?></textarea>
            </div>

            <!-- Lokasi (dropdown kota) -->
            <div class="col-md-4">
                <label class="form-label fw-semibold">Lokasi <span class="text-danger">*</span></label>
                <select name="lokasi" class="form-select" required>
                    <option value="">-- Pilih Kota/Kabupaten --</option>
                    <option value="Jakarta" <?= (isset($_POST['lokasi']) && $_POST['lokasi'] == 'Jakarta') ? 'selected' : '' ?>>Jakarta</option>
                    <option value="Bandung" <?= (isset($_POST['lokasi']) && $_POST['lokasi'] == 'Bandung') ? 'selected' : '' ?>>Bandung</option>
                    <option value="Surabaya" <?= (isset($_POST['lokasi']) && $_POST['lokasi'] == 'Surabaya') ? 'selected' : '' ?>>Surabaya</option>
                    <option value="Yogyakarta" <?= (isset($_POST['lokasi']) && $_POST['lokasi'] == 'Yogyakarta') ? 'selected' : '' ?>>Yogyakarta</option>
                    <option value="Medan" <?= (isset($_POST['lokasi']) && $_POST['lokasi'] == 'Medan') ? 'selected' : '' ?>>Medan</option>
                    <option value="Semarang" <?= (isset($_POST['lokasi']) && $_POST['lokasi'] == 'Semarang') ? 'selected' : '' ?>>Semarang</option>
                    <option value="Makassar" <?= (isset($_POST['lokasi']) && $_POST['lokasi'] == 'Makassar') ? 'selected' : '' ?>>Makassar</option>
                    <option value="Denpasar" <?= (isset($_POST['lokasi']) && $_POST['lokasi'] == 'Denpasar') ? 'selected' : '' ?>>Denpasar</option>
                    <option value="Palembang" <?= (isset($_POST['lokasi']) && $_POST['lokasi'] == 'Palembang') ? 'selected' : '' ?>>Palembang</option>
                    <option value="Batam" <?= (isset($_POST['lokasi']) && $_POST['lokasi'] == 'Batam') ? 'selected' : '' ?>>Batam</option>
                    <!-- Tambahkan kota lain sesuai kebutuhan -->
                </select>
            </div>

            <!-- Gaji berdasarkan UMK (dropdown rentang) -->
            <div class="col-md-4">
                <label class="form-label fw-semibold">Gaji (UMK) <span class="text-danger">*</span></label>
                <select name="gaji" class="form-select" required>
                    <option value="">-- Pilih Rentang Gaji --</option>
                    <option value="< Rp 2.500.000 (Di bawah UMK)" <?= (isset($_POST['gaji']) && $_POST['gaji'] == '< Rp 2.500.000 (Di bawah UMK)') ? 'selected' : '' ?>>Di bawah Rp 2.500.000 (≤ UMK kecil)</option>
                    <option value="Rp 2.500.000 - Rp 3.500.000 (UMK menengah)" <?= (isset($_POST['gaji']) && $_POST['gaji'] == 'Rp 2.500.000 - Rp 3.500.000 (UMK menengah)') ? 'selected' : '' ?>>Rp 2.500.000 – Rp 3.500.000 (UMK menengah)</option>
                    <option value="Rp 3.500.000 - Rp 5.000.000 (UMK besar)" <?= (isset($_POST['gaji']) && $_POST['gaji'] == 'Rp 3.500.000 - Rp 5.000.000 (UMK besar)') ? 'selected' : '' ?>>Rp 3.500.000 – Rp 5.000.000 (UMK besar)</option>
                    <option value="Rp 5.000.000 - Rp 7.500.000" <?= (isset($_POST['gaji']) && $_POST['gaji'] == 'Rp 5.000.000 - Rp 7.500.000') ? 'selected' : '' ?>>Rp 5.000.000 – Rp 7.500.000</option>
                    <option value="Rp 7.500.000 - Rp 10.000.000" <?= (isset($_POST['gaji']) && $_POST['gaji'] == 'Rp 7.500.000 - Rp 10.000.000') ? 'selected' : '' ?>>Rp 7.500.000 – Rp 10.000.000</option>
                    <option value="> Rp 10.000.000" <?= (isset($_POST['gaji']) && $_POST['gaji'] == '> Rp 10.000.000') ? 'selected' : '' ?>>Di atas Rp 10.000.000</option>
                    <option value="Gaji Kompetitif (dirahasiakan)" <?= (isset($_POST['gaji']) && $_POST['gaji'] == 'Gaji Kompetitif (dirahasiakan)') ? 'selected' : '' ?>>Gaji Kompetitif (dirahasiakan)</option>
                </select>
                <small class="text-muted">Acuan UMK setempat, sesuaikan dengan kota tujuan.</small>
            </div>

            <div class="col-md-2">
                <label>Tanggal Buka <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_buka" class="form-control" value="<?= $_POST['tanggal_buka'] ?? '' ?>" required>
            </div>
            <div class="col-md-2">
                <label>Tanggal Tutup <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_tutup" class="form-control" value="<?= $_POST['tanggal_tutup'] ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label>Logo Perusahaan (max 2MB, JPG/PNG)</label>
                <input type="file" name="gambar" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ada logo.</small>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4"><i class="fa fa-save me-1"></i> Simpan</button>
                <a href="index.php?page=lowongan" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </div>
    </form>
</div>

<?php include __DIR__ . '/../footer.php'; ?>