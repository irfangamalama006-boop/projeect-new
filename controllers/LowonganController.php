<?php
require_once __DIR__ . '/../models/Lowongan.php';

class LowonganController {
    private $model;

    public function __construct() {
        $this->model = new Lowongan();
    }

    // Menampilkan daftar lowongan
    public function index() {
        $search = $_GET['search'] ?? '';
        $data = $this->model->getAll($search);
        include __DIR__ . '/../views/lowongan/index.php';
    }

    // Form tambah dan proses simpan
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $errors = $this->validate($data);
            // Upload file
            $fileName = null;
            if (!empty($_FILES['gambar']['name'])) {
                $uploadResult = $this->uploadFile($_FILES['gambar']);
                if ($uploadResult['success']) {
                    $fileName = $uploadResult['filename'];
                } else {
                    $errors[] = $uploadResult['error'];
                }
            }
            if (empty($errors)) {
                $this->model->create($data, $fileName);
                header('Location: index.php?page=lowongan&msg=created');
                exit;
            }
            // Tampilkan kembali form dengan error
            include __DIR__ . '/../views/lowongan/create.php';
        } else {
            include __DIR__ . '/../views/lowongan/create.php';
        }
    }

    // Form edit dan proses update
    public function edit() {
        $id = $_GET['id'] ?? 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            $errors = $this->validate($data);
            $fileName = null;
            if (!empty($_FILES['gambar']['name'])) {
                $uploadResult = $this->uploadFile($_FILES['gambar']);
                if ($uploadResult['success']) {
                    $fileName = $uploadResult['filename'];
                } else {
                    $errors[] = $uploadResult['error'];
                }
            }
            if (empty($errors)) {
                $this->model->update($id, $data, $fileName);
                header('Location: index.php?page=lowongan&msg=updated');
                exit;
            }
            $lowongan = $this->model->getById($id);
            include __DIR__ . '/../views/lowongan/edit.php';
        } else {
            $lowongan = $this->model->getById($id);
            include __DIR__ . '/../views/lowongan/edit.php';
        }
    }

    // Detail lowongan
    public function detail() {
        $id = $_GET['id'] ?? 0;
        $lowongan = $this->model->getById($id);
        include __DIR__ . '/../views/lowongan/detail.php';
    }

    // Hapus
    public function delete() {
        $id = $_GET['id'] ?? 0;
        $this->model->delete($id);
        header('Location: index.php?page=lowongan&msg=deleted');
        exit;
    }

    private function validate($data) {
        $errors = [];
        if (empty($data['perusahaan'])) $errors[] = "Perusahaan wajib diisi.";
        if (empty($data['posisi'])) $errors[] = "Posisi wajib diisi.";
        if (empty($data['tanggal_buka'])) $errors[] = "Tanggal buka wajib diisi.";
        if (empty($data['tanggal_tutup'])) $errors[] = "Tanggal tutup wajib diisi.";
        if (!empty($data['tanggal_buka']) && !empty($data['tanggal_tutup'])) {
            if (strtotime($data['tanggal_tutup']) < strtotime($data['tanggal_buka'])) {
                $errors[] = "Tanggal tutup harus setelah tanggal buka.";
            }
        }
        return $errors;
    }

    private function uploadFile($file) {
        $allowed = ['image/jpeg', 'image/png'];
        $maxSize = 2 * 1024 * 1024; // 2MB
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return ['success' => false, 'error' => 'Upload gagal.'];
        }
        if (!in_array($file['type'], $allowed)) {
            return ['success' => false, 'error' => 'Hanya file JPG/PNG yang diizinkan.'];
        }
        if ($file['size'] > $maxSize) {
            return ['success' => false, 'error' => 'Ukuran file maksimal 2MB.'];
        }
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
        move_uploaded_file($file['tmp_name'], __DIR__ . '/../uploads/' . $filename);
        return ['success' => true, 'filename' => $filename];
    }
}