<?php

// Koneksi ke DataBase dan Memilih DataBase
$conn = mysqli_connect('localhost', 'root', '', 'mahasiswa_db');

// Query isi tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// Ubah data ke dalam bentuk array
// $row = mysqli_fetch_row($result);      // Array Numerik
// $row = mysqli_fetch_assoc($result);    // Array Associative
// $row = mysqli_fetch_array($result);    // Array Numerik dan Associative (keduanya)

// Buat array kosong untuk menampung hasil loop
$rows = [];

// Lakukan loop untuk menangkap semua data yang ada, selama data itu ada
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row; // Menyimpan data hasil penangkapan ke dalam array kosong
}


// Tampung ke variabel mahasiswa
$mahasiswa = $rows;


// 9.27
// "E:\Saved Pictures\Call of Duty Characters\Ghost 1.jpg"
// Fast link: https://www.youtube.com/playlist?list=PLFIM0718LjIUDMaZfzeF6WjurKhRaL0wo
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h3>Daftar Mahasiswa</h3>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>Num.</th>
      <th>Gambar</th>
      <th>NRP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1;
    foreach ($mahasiswa as $mhs) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $mhs['gambar']; ?>" width="100"></td>
        <td><?= $mhs['nrp']; ?></td>
        <td><?= $mhs['nama']; ?></td>
        <td><?= $mhs['email']; ?></td>
        <td><?= $mhs['jurusan']; ?></td>
        <td>
          <a href="">Ubah</a> | <a href="">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>

</body>

</html>