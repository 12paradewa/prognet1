<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
</body>
</html>

<?php
$host = 'prognet.localnet';
$username = '2205551041';
$password = '2205551041';
$database = 'db_2205551041';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Mahasiswa";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">';
    echo '<br><center><h2>Data Mahasiswa</h2><center><br>';
    echo '<a href="input-data.html" class="btn btn-warning">Kembali Ke Form Input Data</a><br><br>';
    echo '<table class="table table-bordered table-striped">';
    echo '<thead><tr><th>ID</th><th>Nama</th><th>NIM</th><th>Email</th><th>Jenis Kelamin</th><th>Alamat</th><th>Fakultas</th><th>Angkatan</th><th>Semester</th><th>Hobi</th><th>Hobi Lainnya</th><th>Aksi</th></tr></thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['nama'] . '</td>';
        echo '<td>' . $row['nim'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['jenis_kelamin'] . '</td>';
        echo '<td>' . $row['alamat'] . '</td>';
        echo '<td>' . $row['fakultas'] . '</td>';
        echo '<td>' . $row['angkatan'] . '</td>';
        echo '<td>' . $row['semester'] . '</td>';
        echo '<td>' . $row['hobi'] . '</td>';
        echo '<td>' . $row['hobi_lainnya'] . '</td>';
        echo '<td>
        <center>
        <br><a href="update.php?id=' . $row['id'] . '" class="btn btn-primary">Update</a><br>
        <br><a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a><br>
       </center>
              </td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
    echo '</div>';
} else {
    echo "Tidak ada data mahasiswa yang tersedia.";
}

mysqli_close($conn);
?>
