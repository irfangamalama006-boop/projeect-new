<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Lowongan Excel</title>
</head>
<body>
    <h2>Laporan Data Lowongan Pekerjaan</h2>
    <p><strong>Total Data:</strong> <?= $total ?> | <strong>Dicetak oleh:</strong> <?= htmlspecialchars($userCetak) ?> | <strong>Tanggal:</strong> <?= $tglCetak ?></p>
    <table border="1">
        <thead>
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
                <tr><td colspan="7" style="text-align:center;">Tidak ada data.</td></tr>
            <?php else: ?>
                <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['perusahaan']) ?></td>
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
</body>
</html>