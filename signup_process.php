<?php
// Koneksi ke database (gantilah dengan informasi database Anda)
$host = "localhost";
$username = "username_database";
$password = "password_database";
$database = "nama_database";

$koneksi = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari formulir
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Query untuk menyimpan data ke database
$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

// Eksekusi query
$result = mysqli_query($koneksi, $query);

// Periksa apakah data berhasil disimpan
if ($result) {
    echo "Signup berhasil. Anda dapat login sekarang.";
} else {
    echo "Signup gagal. Silakan coba lagi.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>