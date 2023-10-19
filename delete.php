<!DOCTYPE html>
<html>
<head>
    <title>Hapus Data Mahasiswa</title>
    <!-- Tambahkan referensi ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
            background-color: #f7f7f7; /* Warna latar belakang */
            padding: 20px;
        }

        .container {
            background-color: #fff; /* Warna latar belakang kontainer */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Bayangan pada kontainer */
        }

        h1 {
            color: #333; /* Warna teks */
        }

        .btn {
            margin-top: 10px; 
            margin-right: 10px;/* Margin atas tombol Hapus */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Hapus Data Mahasiswa</h1><br>
        <?php
        $host = 'prognet.localnet';
        $username = '2205551041';
        $password = '2205551041';
        $database = 'db_2205551041';

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Verifikasi apakah ID mahasiswa yang akan dihapus benar-benar ada
            $sql = "SELECT * FROM Mahasiswa WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                // Konfirmasi penghapusan
                $row = mysqli_fetch_assoc($result);
                echo "Anda yakin ingin menghapus data mahasiswa ini?<br>";
                echo "Nama: " . $row['nama'] . "<br>";
                echo "NIM: " . $row['nim'] . "<br>";
                echo "<form method='post' action='delete.php'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "<input type='submit' class='btn btn-danger' name='confirm_delete' value='Ya, Hapus'>";
                echo "<a class='btn btn-secondary' href='tampil.php'>Batal</a>";
                echo "</form>";
            } else {
                echo "Data mahasiswa tidak ditemukan.";
            }
        } elseif (isset($_POST['confirm_delete'])) {
            $id = $_POST['id'];

            // Hapus data mahasiswa
            $sql = "DELETE FROM Mahasiswa WHERE id = $id";

            if (mysqli_query($conn, $sql)) {
                header("Location: tampil.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
