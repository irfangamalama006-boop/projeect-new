<?php
$pageTitle = "Login";
$page = 'login';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login • E-Recruitment Enterprise</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #0f172a;
            --secondary: #1e293b;
            --accent: #2563eb;
            --bg: #f1f5f9;
        }
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }
        .login-container {
            width: 100%;
            max-width: 440px;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 20px 35px rgba(0,0,0,0.3);
            border: none;
        }
        .btn-login {
            background: #2563eb;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            padding: 0.8rem;
            color: white;
            transition: 0.3s;
        }
        .btn-login:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37,99,235,0.4);
        }
        .form-control {
            border-radius: 12px;
            padding: 0.75rem 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card p-4">
            <div class="text-center mb-4">
                <i class="fa fa-briefcase" style="font-size:3rem; color:#2563eb;"></i>
                <h3 class="fw-bold mt-2">E-Recruitment</h3>
                <p class="text-muted">Enterprise Government</p>
            </div>
            
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <?php if(isset($_GET['success'])): ?>
                <div class="alert alert-success">Registrasi berhasil! Silakan login.</div>
            <?php endif; ?>
            
            <form method="post" action="index.php?page=login">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" value="<?= htmlspecialchars($_POST['username'] ?? 'irfan maulana') ?>" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-login w-100">Masuk Sekarang</button>
            </form>
            <p class="mt-3 text-center">Belum punya akun? <a href="index.php?page=register" class="text-primary fw-semibold">Daftar di sini</a></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>