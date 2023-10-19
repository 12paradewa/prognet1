<?php
// Buat koneksi ke database
$host = 'prognet.localnet'; // Ganti dengan host database Anda
$username = '2205551041'; // Ganti dengan username database Anda
$password = '2205551041'; // Ganti dengan password database Anda
$database = 'db_2205551041'; // Ganti dengan nama database Anda

$conn = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Tangkap data dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$fakultas = $_POST['fakultas'];
$angkatan = $_POST['angkatan'];
$semester = $_POST['semester'];
$hobi = isset($_POST['hobi']) ? implode(', ', $_POST['hobi']) : '';
$hobi_lainnya = $_POST['hobi_lainnya'];

// Query SQL untuk menyimpan data ke database
$sql = "INSERT INTO Mahasiswa (nama, nim, email, jenis_kelamin, alamat, fakultas, angkatan, semester, hobi, hobi_lainnya)
        VALUES ('$nama', $nim, '$email', '$jenis_kelamin', '$alamat', '$fakultas', $angkatan, $semester, '$hobi', '$hobi_lainnya')";

// Eksekusi query
if (mysqli_query($conn, $sql)) {
    header("Location: tampil.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);
?>
