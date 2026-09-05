<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
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
        </tbody>
    </table>
</body>
</html>