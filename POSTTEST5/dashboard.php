<?php
session_start();
if (isset($_GET['page']) && $_GET['page'] === 'data') {
  echo '<p><a href="data.php">Klik di sini untuk menuju data obat</a></p>';
  exit;
}
$username = $_SESSION['username'];
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Dashboard — Apotek</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header style="text-align:center; padding:12px;">
    <h2>Selamat Datang, <?= htmlspecialchars($username) ?>!</h2>
    <nav>
      <a href="index.php">Beranda</a> |
      <a href="data.php">Data</a> |
      <a href="logout.php">Logout</a>
    </nav>
  </header>

  
  <main style="text-align:center;">
    <p>Ini adalah halaman dashboard. Hanya pengguna yang sudah login yang bisa melihat halaman ini.</p>

  
    <?php
    if (isset($_GET['page']) && $_GET['page'] === 'data') {
      echo '<p><a href="data.php">Klik di sini untuk menuju data obat</a></p>';
    }

    ?>
  </main>
</body>
</html>
