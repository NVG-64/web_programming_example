<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'mahasiswa_db'); // Mengembalikan hasil
}

function query($query)
{
  // Koneksi ke DataBase dan Memilih DataBase
  $conn = koneksi();

  // Query isi suatu tabel
  $result = mysqli_query($conn, $query);

  // Jika datanya hanya satu, maka akan dijalankan ini
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  // Jika datanya banyak, perintah ini akan dijalankan
  $rows = []; // Buat array kosong untuk menampung hasil loop
  while ($row = mysqli_fetch_assoc($result)) { // Lakukan loop untuk menangkap semua data yang ada, selama data itu ada
    $rows[] = $row; // Menyimpan data hasil penangkapan ke dalam array kosong
  }

  return $rows; // Mengembalikan hasil
}

function add($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
              mahasiswa
            VALUES
              (null, '$nama', $nrp, '$email', '$jurusan', '$gambar');
            ";
  mysqli_query($conn, $query);
  echo mysqli_error($conn); // Untuk debug

  return mysqli_affected_rows($conn);
}

// $row = mysqli_fetch_row($result);      // Array Numerik
// $row = mysqli_fetch_assoc($result);    // Array Associative
// $row = mysqli_fetch_array($result);    // Array Numerik dan Associative (keduanya)
