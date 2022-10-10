<?php
// fungsi untuk melakukan koneksi ke database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, 'prakweb_c_203040148_pw');

    return $conn;
}

// function untuk melakukan query dan memasukannya kedalam array
function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function untuk menambah data produk
function tambah($data)
{
    $conn = koneksi();
    $nama = htmlspecialchars($data["nama_buku"]);
    $pengarang = htmlspecialchars($data["nama_pengarang"]);
    $lembar = htmlspecialchars($data["jumlah_lembar"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $gambar = htmlspecialchars($data["gambar__buku"]);
    $query = "INSERT INTO buku VALUES
                ('', '$nama', '$pengarang', '$lembar','$penerbit','$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// function untuk menghapus data produk
function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE * FROM buku WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// function untuk mengubah data produk
function ubah($data)
{
    $conn = koneksi();
    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama_buku"]);
    $pengarang = htmlspecialchars($data["nama_pengarang"]);
    $lembar = htmlspecialchars($data["jumlah_lembar"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $gambar = htmlspecialchars($data["gambar__buku"]);
    $query = "UPDATE buku
                SET 
                nama_buku = '$nama',
                nama_pengarang = '$pengarang',
                jumlah_lembar = '$lembar',
                penerbit = '$penerbit',
                gambar_buku = '$gambar'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM buku
              WHERE 
            judul_Buku LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%'
          ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}