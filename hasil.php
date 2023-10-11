<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="hasil.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Data Mahasiswa</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $nim = $_POST["nim"];
            $email = $_POST["email"];
            $jenis_kelamin = $_POST["jenis_kelamin"];
            $alamat = $_POST["alamat"];
            $fakultas = $_POST["fakultas"];
            $jurusan = $_POST["jurusan"];
            $angkatan = $_POST["angkatan"];
            $semester = $_POST["semester"];

            $hobi = isset($_POST["hobi"]) ? implode(", ", $_POST["hobi"]) : '';
            $hobi_lainnya = isset($_POST["hobi_lainnya"]) ? $_POST["hobi_lainnya"] : '';

            if (!empty($hobi_lainnya)) {
                // Tambahkan hobi lainnya ke daftar hobi jika diisi
                if (!empty($hobi)) {
                    $hobi .= ", $hobi_lainnya";
                } else {
                    $hobi = $hobi_lainnya;
                }

            }

            echo "<p><strong>Nama:</strong> $nama</p>";
            echo "<p><strong>NIM:</strong> $nim</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Jenis Kelamin:</strong> $jenis_kelamin</p>";
            echo "<p><strong>Alamat:</strong> $alamat</p>";
            echo "<p><strong>Fakultas:</strong> $fakultas</p>";
            echo "<p><strong>Jurusan:</strong> $jurusan</p>";
            echo "<p><strong>Angkatan:</strong> $angkatan</p>";
            echo "<p><strong>Semester:</strong> $semester</p>";
            echo "<p><strong>Hobby:</strong> $hobi</p>";

        }
        ?>
    </div>
</body>
</html>
