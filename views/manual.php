<?php
$pageTitle = "Manual Book - E-Recruitment Enterprise";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f1f5f9;
            font-family: 'Segoe UI', sans-serif;
            padding-top: 60px;
        }
        .navbar {
            background: #0f172a;
        }
        .navbar .navbar-brand {
            color: white;
            font-weight: bold;
        }
        .container-manual {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        .card-manual {
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            padding: 25px;
            background: white;
        }
        .step-number {
            display: inline-block;
            background: #2563eb;
            color: white;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            text-align: center;
            line-height: 36px;
            font-weight: bold;
            margin-right: 12px;
        }
        .btn-back {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?page=login"><i class="fa fa-briefcase me-2"></i>E-Recruitment Enterprise</a>
        <a href="index.php?page=login" class="btn btn-outline-light btn-sm"><i class="fa fa-arrow-left me-1"></i> Kembali ke Login</a>
    </div>
</nav>

<div class="container-manual">
    <div class="text-center mb-5">
        <h1 class="fw-bold"><i class="fa fa-book me-2"></i>Manual Book</h1>
        <p class="text-muted">Panduan Lengkap Penggunaan Aplikasi E-Recruitment Enterprise</p>
        <hr>
    </div>

    <!-- Bagian 1: Pendaftaran -->
    <div class="card-manual">
        <h4><span class="step-number">1</span> Registrasi Akun Baru</h4>
        <ol>
            <li>Akses halaman <a href="index.php?page=register">Registrasi</a>.</li>
            <li>Isi <b>Nama Lengkap</b>, <b>Username</b> (contoh: <i>irfan maulana</i>), dan <b>Password</b> (min. 6 karakter).</li>
            <li>Klik <b>Daftar</b>. Jika berhasil, akan muncul notifikasi dan Anda diarahkan ke halaman login.</li>
        </ol>
        <div class="alert alert-info mt-2"><i class="fa fa-info-circle me-1"></i> Catatan: Jika sudah memiliki akun, langsung lanjut ke Langkah 2.</div>
    </div>

    <!-- Bagian 2: Login -->
    <div class="card-manual">
        <h4><span class="step-number">2</span> Login ke Sistem</h4>
        <ol>
            <li>Kembali ke halaman <a href="index.php?page=login">Login</a>.</li>
            <li>Masukkan <b>Username</b> dan <b>Password</b> yang telah didaftarkan.</li>
            <li>Klik <b>Masuk Sekarang</b>.</li>
            <li>Setelah berhasil, Anda akan masuk ke <b>Dashboard</b> utama.</li>
        </ol>
    </div>

    <!-- Bagian 3: Dashboard -->
    <div class="card-manual">
        <h4><span class="step-number">3</span> Dashboard Utama</h4>
        <p>Di halaman Dashboard Anda dapat melihat:</p>
        <ul>
            <li><b>Statistik Lowongan</b>: Total lowongan, Lowongan aktif, Lowongan kadaluarsa, Rata‑rata gaji.</li>
            <li><b>Akses Cepat</b>: Tombol menuju Data Lowongan, Tambah Lowongan, dan Laporan.</li>
            <li><b>Aktivitas Terbaru</b>: Informasi jumlah lowongan dan status login.</li>
        </ul>
        <p>Gunakan <b>sidebar di kiri</b> untuk navigasi ke menu lainnya.</p>
    </div>

    <!-- Bagian 4: Kelola Data Lowongan -->
    <div class="card-manual">
        <h4><span class="step-number">4</span> Mengelola Data Lowongan (CRUD)</h4>
        <p><b>A. Melihat Daftar Lowongan</b></p>
        <ul>
            <li>Klik menu <b>Data Lowongan</b> di sidebar. Tabel berisi ID, Perusahaan, Posisi, Lokasi, Gaji, Periode, dan Aksi.</li>
            <li>Gunakan kotak <b>Pencarian</b> di atas tabel untuk mencari berdasarkan perusahaan, posisi, atau lokasi.</li>
        </ul>
        <p><b>B. Menambah Lowongan Baru</b></p>
        <ol>
            <li>Klik <b>Tambah Lowongan</b> (atau tombol "+ Tambah").</li>
            <li>Isi form: Perusahaan, Posisi, Deskripsi, Kualifikasi, pilih <b>Lokasi</b> dari dropdown, pilih <b>Gaji</b> (berdasarkan UMK).</li>
            <li>Tentukan <b>Tanggal Buka</b> dan <b>Tanggal Tutup</b>.</li>
            <li>Unggah logo perusahaan (opsional, maks. 2MB, format JPG/PNG).</li>
            <li>Klik <b>Simpan</b>. Data akan muncul di tabel.</li>
        </ol>
        <p><b>C. Melihat Detail Lowongan</b></p>
        <ul>
            <li>Klik tombol <b>Detail</b> (ikon mata) pada baris data. Informasi lengkap akan ditampilkan, termasuk logo jika ada.</li>
        </ul>
        <p><b>D. Mengedit Lowongan</b></p>
        <ul>
            <li>Klik tombol <b>Edit</b> (ikon pensil). Form akan terisi data lama. Ubah data yang diperlukan, lalu klik <b>Update</b>.</li>
            <li>Jika ingin mengganti logo, unggah file baru. Biarkan kosong jika tidak ingin mengubah.</li>
        </ul>
        <p><b>E. Menghapus Lowongan</b></p>
        <ul>
            <li>Klik tombol <b>Hapus</b> (ikon tong sampah), lalu konfirmasi. Data akan dihapus permanen.</li>
        </ul>
    </div>

    <!-- Bagian 5: Laporan -->
    <div class="card-manual">
        <h4><span class="step-number">5</span> Membuat Laporan</h4>
        <p><b>A. Laporan PDF</b></p>
        <ol>
            <li>Klik menu <b>Laporan PDF</b> di sidebar.</li>
            <li>Halaman laporan akan tampil dengan header, ringkasan statistik, dan tabel data.</li>
            <li>Klik tombol <b>Cetak / Simpan PDF</b> di kanan atas.</li>
            <li>Browser akan membuka dialog cetak. Pilih tujuan <b>Save as PDF</b>, lalu simpan file.</li>
        </ol>
        <p><b>B. Laporan Excel</b></p>
        <ol>
            <li>Klik menu <b>Laporan Excel</b> (akan menuju halaman pratinjau).</li>
            <li>Periksa data yang tampil. Jika sesuai, klik <b>Download Excel</b>.</li>
            <li>File <code>.xls</code> akan terunduh otomatis ke komputer Anda.</li>
            <li>Gunakan tombol <b>Kembali</b> untuk kembali ke daftar lowongan.</li>
        </ol>
    </div>

    <!-- Bagian 6: Logout -->
    <div class="card-manual">
        <h4><span class="step-number">6</span> Logout</h4>
        <p>Klik menu <b>Logout</b> di bagian bawah sidebar untuk keluar dari sistem. Session akan dihapus dan Anda akan diarahkan ke halaman login.</p>
    </div>

    <!-- Penutup -->
    <div class="text-center mt-5">
        <p class="text-muted">&copy; <?= date('Y') ?> E-Recruitment Enterprise | Manual Book Digital</p>
        <a href="index.php?page=login" class="btn btn-primary"><i class="fa fa-sign-in me-1"></i> Kembali ke Login</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>