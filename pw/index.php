<?php
require 'functions.php';

$buku = query("SELECT * FROM buku");

if (isset($_POST['cari'])) {
  $buku = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Buku</title>
</head>

<body>

  <h1>Daftar Buku</h1>

  <table border="1" cellpading="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>nama</th>
      <th>pengarang</th>
      <th>lembar</th>
      <th>penerbit</th>
      <th>gambar</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($buku as $row) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $row["nama_buku"]; ?> </td>
        <td><?= $row["nama_pengarang"]; ?></td>
        <td><?= $row["jumlah_lembar"]; ?> </td>
        <td><?= $row["penerbit"]; ?> </td>
        <td><img src="img/<?= $row["gambar_buku"]; ?>" alt="" width="100"></td>
        <td>
            <button>
              <div class="update"><a href="ubah.php?= $tp['id']; ?>">Ubah</a></div>
            </button>
            <button>
              <div class="delete"><a href="hapus.php? $tp['id']; ?>" onclick="return confirm('Hapus Data??')">Hapus</a></div>
            </button>
            <button>
              <div class="tambah"><a href="tambah.php?= $tp['id']; ?>">tambah</a></div>
            </button>
        </td>
        
       
      </tr>
      <?php endforeach; ?>
  </table>

</body>

</html>