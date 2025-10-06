<?php
session_start();
if (isset($_SESSION['username'])) {
  header('Location: dashboard.php');
  exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Beranda — Sistem Informasi Apotek</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <div class="container">
      <h1>Sistem Informasi Apotek</h1>
      <nav>
        <a href="index.php">Beranda</a>
        <a href="data.php">Data Obat</a>
        <a href="login.php">Login</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <div class="hero-header">
      <img src="LOGO.png" alt="Logo Apotek" width="60" height="60">
      <h2>Selamat Datang di Sistem Informasi Data Apotek</h2>
    </div>
    
    <div class="about-section">
      <div class="about-card">
        <h3>Tentang Sistem Kami</h3>
        <p>Aplikasi ini membantu pengelolaan data obat, supplier, dan transaksi penjualan di apotek secara efisien dan terintegrasi.</p>
        
        <h4>Fitur Utama:</h4>
        <ul class="benefit-list">
          <li>Manajemen Data Obat Lengkap</li>
          <li>Tracking Stok Otomatis</li>
          <li>Laporan Penjualan</li>
          <li>Manajemen Supplier</li>
          <li>Dashboard Analitik</li>
        </ul>
        
        <div style="text-align: center; margin-top: 20px;">
          <a href="login.php" class="btn btn-primary">Masuk ke Dashboard</a>
        </div>
      </div>
    </div>

    <div class="system-features">
      <h3>Fitur Sistem</h3>
      <ul>
        <li>✅ Input data obat dengan mudah</li>
        <li>✅ Monitoring stok real-time</li>
        <li>✅ Laporan keuangan otomatis</li>
        <li>✅ Manajemen supplier terintegrasi</li>
      </ul>
      <span>Didesain untuk kemudahan dan efisiensi operasional apotek</span>
    </div>
  </main>

  <footer>
    <div class="container">
      <p>© 2025 Sistem Informasi Data Apotek - All rights reserved</p>
    </div>
  </footer>
</body>
</html>