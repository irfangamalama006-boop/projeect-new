<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Lowongan (PDF)</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .no-print { margin-bottom: 20px; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()" style="padding:10px 20px;font-size:16px;">
            <i class="fa fa-print"></i> Cetak / Simpan PDF
        </button>
    </div>

    <h2>Laporan Data Lowongan Pekerjaan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Perusahaan</th>
                <th>Posisi</th>
                <th>Lokasi</th>
                <th>Gaji</th>
                <th>Periode</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['perusahaan']) ?></td>
                <td><?= htmlspecialchars($row['posisi']) ?></td>
                <td><?= htmlspecialchars($row['lokasi']) ?></td>
                <td><?= htmlspecialchars($row['gaji']) ?></td>
                <td><?= $row['tanggal_buka'] ?> - <?= $row['tanggal_tutup'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Auto print saat halaman dibuka (opsional, bisa dihapus jika tidak ingin langsung print) -->
    <script>
        // window.onload = function() { window.print(); }  // hapus komentar jika ingin langsung print
    </script>
</body>
</html>