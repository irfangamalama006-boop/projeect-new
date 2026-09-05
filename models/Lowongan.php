<?php
require_once __DIR__ . '/../config/Database.php';

class Lowongan {
    private $conn;
    private $table = 'lowongan';

    public function __construct() {
        $database = Database::getInstance();
        $this->conn = $database->getConnection();
    }

    public function getAll($search = '') {
        $sql = "SELECT * FROM {$this->table}";
        if (!empty($search)) {
            $sql .= " WHERE perusahaan LIKE :s OR posisi LIKE :s OR lokasi LIKE :s";
        }
        $sql .= " ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        if (!empty($search)) {
            $searchParam = "%$search%";
            $stmt->bindParam(':s', $searchParam);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data, $fileName) {
        $sql = "INSERT INTO {$this->table} (perusahaan, posisi, deskripsi, kualifikasi, lokasi, gaji, tanggal_buka, tanggal_tutup, gambar_perusahaan) 
                VALUES (:perusahaan, :posisi, :deskripsi, :kualifikasi, :lokasi, :gaji, :buka, :tutup, :gambar)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':perusahaan', $data['perusahaan']);
        $stmt->bindParam(':posisi', $data['posisi']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':kualifikasi', $data['kualifikasi']);
        $stmt->bindParam(':lokasi', $data['lokasi']);
        $stmt->bindParam(':gaji', $data['gaji']);
        $stmt->bindParam(':buka', $data['tanggal_buka']);
        $stmt->bindParam(':tutup', $data['tanggal_tutup']);
        $stmt->bindParam(':gambar', $fileName);
        return $stmt->execute();
    }

    public function update($id, $data, $fileName = null) {
        $sql = "UPDATE {$this->table} SET 
                perusahaan = :perusahaan, posisi = :posisi, deskripsi = :deskripsi,
                kualifikasi = :kualifikasi, lokasi = :lokasi, gaji = :gaji,
                tanggal_buka = :buka, tanggal_tutup = :tutup";
        if ($fileName !== null) {
            $sql .= ", gambar_perusahaan = :gambar";
        }
        $sql .= " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':perusahaan', $data['perusahaan']);
        $stmt->bindParam(':posisi', $data['posisi']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':kualifikasi', $data['kualifikasi']);
        $stmt->bindParam(':lokasi', $data['lokasi']);
        $stmt->bindParam(':gaji', $data['gaji']);
        $stmt->bindParam(':buka', $data['tanggal_buka']);
        $stmt->bindParam(':tutup', $data['tanggal_tutup']);
        if ($fileName !== null) {
            $stmt->bindParam(':gambar', $fileName);
        }
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Mengambil statistik lowongan:
     * - total lowongan
     * - lowongan aktif (tanggal_tutup >= hari ini)
     * - lowongan kadaluarsa (tanggal_tutup < hari ini)
     * - rata‑rata gaji (diambil dari angka pertama dalam string gaji)
     */
    public function getStats() {
        // Total semua lowongan
        $stmt = $this->conn->query("SELECT COUNT(*) FROM {$this->table}");
        $total = $stmt->fetchColumn();

        // Lowongan masih aktif
        $stmt = $this->conn->query("SELECT COUNT(*) FROM {$this->table} WHERE tanggal_tutup >= CURDATE()");
        $aktif = $stmt->fetchColumn();

        // Lowongan kadaluarsa
        $stmt = $this->conn->query("SELECT COUNT(*) FROM {$this->table} WHERE tanggal_tutup < CURDATE()");
        $kadaluarsa = $stmt->fetchColumn();

        // Rata‑rata gaji (perkiraan dari angka pertama)
        $stmt = $this->conn->query("SELECT gaji FROM {$this->table}");
        $gajiList = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $totalGaji = 0;
        $count = 0;
        foreach ($gajiList as $g) {
            // Hapus titik, lalu ambil deretan angka pertama (misal "5000000")
            if (preg_match('/[\d]+/', str_replace('.', '', $g), $m)) {
                $totalGaji += (int)$m[0];
                $count++;
            }
        }
        $rataGaji = $count > 0 ? 'Rp ' . number_format($totalGaji / $count, 0, ',', '.') : 'N/A';

        return [
            'total'      => $total,
            'aktif'      => $aktif,
            'kadaluarsa' => $kadaluarsa,
            'rata_gaji'  => $rataGaji,
        ];
    }
}