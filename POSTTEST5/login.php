<?php
session_start();

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['username'])) {
  header('Location: dashboard.php');
  exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Autentikasi sederhana (username: admin, password: 123)
  if ($username === 'admin' && $password === '123') {
    $_SESSION['username'] = $username;
    header('Location: dashboard.php');
    exit;
  } else {
    $error = 'Username atau password salah!';
  }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login — Apotek</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div id="login">
    <div id="login-title">Login Sistem Apotek</div>
    <form method="POST" action="login.php">
      <fieldset>
        <legend>Masuk ke Dashboard</legend>
        <?php if ($error): ?>
          <div style="color: red; background: #ffe6e6; padding: 10px; border-radius: 8px; margin-bottom: 15px; border: 1px solid #ff4444;">
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>
        
        <div>
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Masukkan username" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
        </div>
        
        <div>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Masukkan password" required>
        </div>
        
        <div>
          <button type="submit">Login</button>
          <a href="index.php" class="btn-back">Kembali ke Beranda</a>
        </div>
        
        <div class="small">
          Demo: username: <strong>admin</strong> / password: <strong>123</strong>
        </div>
      </fieldset>
    </form>
  </div>
</body>
</html>