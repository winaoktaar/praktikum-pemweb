<?php
session_start();
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Data Obat — Apotek</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header style="padding:12px; text-align:center;">
    <a href="index.php">← Kembali ke Beranda</a> |
    <?php if (isset($_SESSION['username'])): ?>
      <a href="dashboard.php">Dashboard</a> |
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
  </header>

  <main style="max-width:980px; margin:16px auto; padding:0 12px;">
    <h2>Data Obat</h2>
    <p>Daftar obat yang tersimpan (contoh demo lokal).</p>

    <table border="1" cellpadding="8" id="obat-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode</th>
          <th>Nama Obat</th>
          <th>Supplier</th>
          <th>Stok</th>
          <th>Harga (Rp)</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr><td>1</td><td>OBT-001</td><td>Paracetamol 500mg</td><td>PT. Sehat</td><td>120</td><td>1200</td><td><button>Hapus</button></td></tr>
        <tr><td>2</td><td>OBT-002</td><td>Amoxicillin 500mg</td><td>CV. Medika</td><td>40</td><td>4500</td><td><button>Hapus</button></td></tr>
      </tbody>
    </table>
  </main>
</body>
</html>
