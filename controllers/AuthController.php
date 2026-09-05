<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $user = new User();
            if ($user->login($username, $password)) {
                header('Location: index.php?page=dashboard');
                exit;
            } else {
                $error = "Username atau password salah.";
                include __DIR__ . '/../views/auth/login.php';
            }
        } else {
            include __DIR__ . '/../views/auth/login.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $nama = trim($_POST['nama_lengkap']);
            $user = new User();
            $result = $user->register($username, $password, $nama);
            if ($result === true) {
                header('Location: index.php?page=login&success=1');
                exit;
            } else {
                $error = $result;
                include __DIR__ . '/../views/auth/register.php';
            }
        } else {
            include __DIR__ . '/../views/auth/register.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }
}