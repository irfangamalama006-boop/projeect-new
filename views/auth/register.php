<?php
$pageTitle = "Registrasi";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi • E-Recruitment Enterprise</title>
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
        .register-container {
            width: 100%;
            max-width: 440px;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 20px 35px rgba(0,0,0,0.3);
            border: none;
        }
        .btn-register {
            background: #10b981;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            padding: 0.8rem;
            color: white;
            transition: 0.3s;
        }
        .btn-register:hover {
            background: #059669;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16,185,129,0.4);
        }
        .form-control {
            border-radius: 12px;
            padding: 0.75rem 1rem;
        }
        /* Logo */
        .logo-icon {
            display: inline-block;
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 16px;
            line-height: 60px;
            font-size: 24px;
            font-weight: bold;
            box-shadow: 0 8px 20px rgba(37,99,235,0.4);
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="card p-4">
            <!-- Logo & Identitas -->
            <div class="text-center mb-4">
                <div class="logo-icon">ER</div>
                <h3 class="fw-bold mt-2" style="color:#0f172a;">E-Recruitment</h3>
                <p class="text-muted">Enterprise Government</p>
            </div>
            
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <form method="post" action="index.php?page=register">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Irfan Maulana" value="<?= htmlspecialchars($_POST['nama_lengkap'] ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="irfan maulana" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Min. 6 karakter" required>
                </div>
                <button type="submit" class="btn btn-register w-100">Daftar</button>
            </form>
            <p class="mt-3 text-center">Sudah punya akun? <a href="index.php?page=login" class="text-primary fw-semibold">Login</a></p>
            <hr>
            <!-- Copyright -->
            <div class="text-center" style="font-size: 0.7rem; color: #94a3b8; margin-top: 8px;">
                &copy; <?= date('Y') ?> E-Recruitment Enterprise. All rights reserved.
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>