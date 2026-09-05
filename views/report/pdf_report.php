<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Lowongan (Cetak PDF)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #1e293b;
        }
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: #0f172a;
            color: white;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            z-index: 1000;
        }
        .header .logo {
            width: 40px;
            height: 40px;
            background: #2563eb;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
        }
        .header .title {
            font-size: 18px;
            font-weight: bold;
        }
        .header .subtitle {
            font-size: 12px;
            color: #94a3b8;
        }
        .content {
            margin-top: 100px;
            margin-bottom: 60px;
            padding: 0 30px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #f1f5f9;
            color: #475569;
            text-align: center;
            padding: 10px 30px;
            font-size: 12px;
            border-top: 1px solid #cbd5e1;
            z-index: 1000;
        }
        .info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-size: 13px;
            background: #f8fafc;
            padding: 10px 15px;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th {
            background: #2563eb;
            color: white;
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 8px 10px;
            border-bottom: 1px solid #e2e8f0;
        }
        tr:nth-child(even) { background: #f8fafc; }

        /* Tombol aksi (cetak & kembali) */
        .action-buttons {
            position: fixed;
            top: 85px;
            right: 30px;
            z-index: 1001;
            display: flex;
            gap: 10px;
        }
        .btn-print {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 15px;
            border-radius: 8px;
            cursor: pointer;
        }
        .btn-print:hover { background: #1d4ed8; }
        .btn-back {
            background: #f1f5f9;
            color: #334155;
            border: 1px solid #cbd5e1;
            padding: 12px 25px;
            font-size: 15px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
        .btn-back:hover { background: #e2e8f0; }

        @media print {
            .action-buttons { display: none; }
            body { margin: 0; }
            .header { position: fixed; top: 0; }
            .footer { position: fixed; bottom: 0; }
        }
    </style>
</head>
<body>
    <!-- Tombol Aksi -->
    <div class="action-buttons">
        <a href="index.php?page=lowongan" class="btn-back">← Kembali</a>
        <button class="btn-print" onclick="window.print()">🖨️ Cetak / Simpan PDF</button>
    </div>

    <!-- HEADER -->
    <div class="header">
        <div class="logo">ER</div>
        <div>
            <div class="title">E-Recruitment Enterprise</div>
            <div class="subtitle">Sistem Informasi Lowongan Pekerjaan</div>
        </div>
    </div>

    <!-- KONTEN -->
    <div class="content">
        <h2 style="margin-bottom:5px;">Laporan Data Lowongan Pekerjaan</h2>
        <p style="color:#64748b; margin-top:0;">Periode: <?= date('d-m-Y') ?></p>

        <div class="info">
            <div><strong>Total Data:</strong> <?= $total ?> lowongan</div>
            <div><strong>Dicetak oleh:</strong> <?= htmlspecialchars($userCetak) ?></div>
            <div><strong>Tanggal Cetak:</strong> <?= $tglCetak ?></div>
        </div>

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
                <?php if (empty($data)): ?>
                    <tr><td colspan="6" style="text-align:center;">Tidak ada data lowongan.</td></tr>
                <?php else: ?>
                    <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['perusahaan']) ?></td>
                        <td><?= htmlspecialchars($row['posisi']) ?></td>
                        <td><?= htmlspecialchars($row['lokasi']) ?></td>
                        <td><?= htmlspecialchars($row['gaji']) ?></td>
                        <td><?= $row['tanggal_buka'] ?> s/d <?= $row['tanggal_tutup'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        &copy; <?= date('Y') ?> E-Recruitment Enterprise | Dokumen dicetak secara digital | Hal. 1 dari 1
    </div>
</body>
</html>