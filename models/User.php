<?php
require_once __DIR__ . '/../config/Database.php';

class User {
    private $conn;
    private $table = 'users';

    private $id;
    private $username;
    private $nama_lengkap;

    public function __construct() {
        $database = Database::getInstance();
        $this->conn = $database->getConnection();
    }

    public function register($username, $password, $nama_lengkap) {
        if (empty($username) || empty($password) || empty($nama_lengkap)) {
            return "Semua field wajib diisi.";
        }
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (username, password, nama_lengkap) VALUES (:u, :p, :n)");
        $stmt->bindParam(':u', $username);
        $stmt->bindParam(':p', $hashed);
        $stmt->bindParam(':n', $nama_lengkap);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Username sudah digunakan.";
        }
    }

    public function login($username, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE username = :u LIMIT 1");
        $stmt->bindParam(':u', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->nama_lengkap = $user['nama_lengkap'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama_lengkap'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_destroy();
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    // Getter
    public function getId() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getNamaLengkap() { return $this->nama_lengkap; }
}