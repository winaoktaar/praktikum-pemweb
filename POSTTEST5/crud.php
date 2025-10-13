<?php 
  require 'koneksi.php';

  $sql = mysqli_query($conn, "SELECT * FROM `data`");

  $data = [];

  while($row = mysqli_fetch_assoc($sql)){
    $pendataan_apotek[] = $row;
  }
?>
<?php 
  require 'koneksi.php';

  $sql = mysqli_query($conn, "SELECT * FROM pendaftaran");

  $pendaftaran = [];

  while($row = mysqli_fetch_assoc($sql)){
    $pendaftaran[] = $row;
  }
?>
<?php
require 'koneksi'
if (isset($_POST['tambah'])) {
  $Nama_Obat = $_POST['Nama_Obat'];
  $Supplier = $_POST['Supplier'];
  $Stok = $_POST['Stok'];
  $Harga = $_POST['Harga'];

  $query = "INSERT INTO obat (Nama_Obat, Supplier, Stok, Harga)
            VALUES ('$Nama_Obat', '$Supplier', '$Stok', '$Harga')";
  mysqli_query($conn, $query);
  header("Location: dashboard.php?page=data");
  exit;
}

if (isset($_POST['edit'])) {
  $kode = $_POST['kode'];
  $Nama_Obat = $_POST['Nama_Obat'];
  $Supplier = $_POST['Supplier'];
  $Stok = $_POST['Stok'];
  $Harga = $_POST['Harga'];

  $query = "UPDATE obat SET 
              Nama_Obat='$Nama_Obat', 
              Supplier='$Supplier', 
              Stok='$Stok', 
              Harga='$Harga' 
            WHERE kode=$kode";
  mysqli_query($conn, $query);
  header("Location: dashboard.php?page=data");
  exit;
}

if (isset($_GET['hapus'])) {
  $kode = $_GET['hapus'];
  mysqli_query($conn, "DELETE FROM obat WHERE kode=$kode");
  header("Location: dashboard.php?page=data");
  exit;
}

$sql = mysqli_query($conn, "SELECT * FROM obat ORDER BY kode DESC");
$obat = [];
while ($row = mysqli_fetch_assoc($sql)) {
  $obat[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Sistem Informasi Data Apotek</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body { background-color: #f4f8fc; }
    .navbar { background-color: #00695c; }
    .navbar-brand, .nav-link { color: white !important; }
    footer { margin-top: 40px; background-color: #00695c; color: white; padding: 20px; text-align: center; }
    .card-header { background-color: #009688; color: white; }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php?page=beranda">Apotek Sehat</a>
    <div class="navbar-nav">
      <a class="nav-link" href="dashboard.php?page=beranda">Beranda</a>
      <a class="nav-link active" href="dashboard.php?page=data">Data Obat</a>
      <a class="nav-link" href="logout.php">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2 class="text-center mb-4">Sistem Informasi Data Apotek</h2>

  <div class="card mb-4">
    <div class="card-header">Tambah Data Obat</div>
    <div class="card-body">
      <form method="POST" action="">
        <div class="row g-2">
          <div class="col-md-3">
            <input type="text" name="Nama_Obat" class="form-control" placeholder="Nama Obat" required>
          </div>
          <div class="col-md-3">
            <input type="text" name="Supplier" class="form-control" placeholder="Supplier" required>
          </div>
          <div class="col-md-2">
            <input type="number" name="Stok" class="form-control" placeholder="Stok" required>
          </div>
          <div class="col-md-2">
            <input type="number" name="Harga" class="form-control" placeholder="Harga" required>
          </div>
          <div class="col-md-2">
            <button type="submit" name="tambah" class="btn btn-success w-100">
              <i class="fa-solid fa-plus"></i> Tambah
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <table class="table table-bordered text-center align-middle">
    <thead class="table-dark">
      <tr>
        <th>Kode</th>
        <th>Nama Obat</th>
        <th>Supplier</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($obat as $data) : ?>
      <tr>
        <td><?= $data['kode'] ?></td>
        <td><?= htmlspecialchars($data['Nama_Obat']) ?></td>
        <td><?= htmlspecialchars($data['Supplier']) ?></td>
        <td><?= htmlspecialchars($data['Stok']) ?></td>
        <td>Rp<?= number_format($data['Harga'], 0, ',', '.') ?></td>
        <td>
          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['kode'] ?>">
            <i class="fa-solid fa-pen-to-square"></i>
          </button>

          <a href="dashboard.php?page=data&hapus=<?= $data['kode'] ?>" 
             onclick="return confirm('Yakin ingin menghapus data ini?');" 
             class="btn btn-danger btn-sm">
            <i class="fa-solid fa-trash-can"></i>
          </a>
        </td>
      </tr>

      <div class="modal fade" id="editModal<?= $data['kode'] ?>" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="">
              <div class="modal-header bg-warning">
                <h5 class="modal-title">Edit Data Obat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="kode" value="<?= $data['kode'] ?>">
                <div class="mb-3">
                  <label>Nama Obat</label>
                  <input type="text" name="Nama_Obat" value="<?= $data['Nama_Obat'] ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Supplier</label>
                  <input type="text" name="Supplier" value="<?= $data['Supplier'] ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Stok</label>
                  <input type="number" name="Stok" value="<?= $data['Stok'] ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label>Harga</label>
                  <input type="number" name="Harga" value="<?= $data['Harga'] ?>" class="form-control" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="edit" class="btn btn-warning text-white">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<footer>
  <p>&copy; 2024 Sistem Informasi Data Apotek</p>
  <p>Apotek Sehat - Menyediakan Obat Berkualitas untuk Anda</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
