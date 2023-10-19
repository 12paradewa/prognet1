<!DOCTYPE html>
<html>
<head>
    <title>Update Data Mahasiswa</title>
    <!-- Tambahkan referensi ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Update Data Mahasiswa</h1>
        <?php
        $host = 'prognet.localnet';
        $username = '2205551041';
        $password = '2205551041';
        $database = 'db_2205551041';

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
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

            $sql = "UPDATE Mahasiswa SET nama='$nama', nim='$nim', email='$email', jenis_kelamin='$jenis_kelamin', alamat='$alamat', fakultas='$fakultas', angkatan='$angkatan', semester='$semester', hobi='$hobi', hobi_lainnya='$hobi_lainnya' WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
                header("Location: tampil.php"); // Redirect ke halaman tampil_data.php setelah berhasil mengupdate data
                exit(); // Pastikan untuk menghentikan eksekusi setelah melakukan redirect
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            $id = $_GET['id']; // Ambil ID mahasiswa dari parameter URL
            $sql = "SELECT * FROM Mahasiswa WHERE id = $id";
            $result = mysqli_query($conn, $sql);
        }
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <form method="post" action="update.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap:</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="number" class="form-control" name="nim" value="<?php echo $row['nim']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?> required>
                            <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?> required>
                            <label class="form-check-label">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" name="alamat" rows="4" required><?php echo $row['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Fakultas * :</label>
                        <select id="fakultas" name="fakultas" class="form-control">
                            <option value="Pilih fakultas">Pilih Fakultas </option>
                            <option value="Fakultas Teknik" <?php if ($row['fakultas'] == 'Fakultas Teknik') echo 'selected'; ?>>Fakultas Teknik</option>
                            <option value="Fakultas Ilmu Budaya" <?php if ($row['fakultas'] == 'Fakultas Ilmu Budaya') echo 'selected'; ?>>Fakultas Ilmu Budaya</option>
                            <option value="Fakultas Kedokteran" <?php if ($row['fakultas'] == 'Fakultas Kedokteran') echo 'selected'; ?>>Fakultas Kedokteran</option>
                            <option value="Fakultas Pertanian" <?php if ($row['fakultas'] == 'Fakultas Pertanian') echo 'selected'; ?>>Fakultas Pertanian</option>
                            <option value="Fakultas Peternakan" <?php if ($row['fakultas'] == 'Fakultas Peternakan') echo 'selected'; ?>>Fakultas Peternakan</option>
                            <option value="Fakultas Pariwisata" <?php if ($row['fakultas'] == 'Fakultas Pariwisata') echo 'selected'; ?>>Fakultas Pariwisata</option>
                            <option value="Fakultas Hukum" <?php if ($row['fakultas'] == 'Fakultas Hukum') echo 'selected'; ?>>Fakultas Hukum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan:</label>
                        <input type="number" class="form-control" name="angkatan" value="<?php echo $row['angkatan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <input type="number" class="form-control" name="semester" value="<?php echo $row['semester']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="hobi">Hobby:</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="Olahraga" <?php if (in_array('Olahraga', explode(', ', $row['hobi']))) echo 'checked'; ?>>
                            <label class="form-check-label">Olahraga</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="Musik" <?php if (in_array('Musik', explode(', ', $row['hobi']))) echo 'checked'; ?>>
                            <label class="form-check-label">Musik</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="Lainnya" <?php if (in_array('Lainnya', explode(', ', $row['hobi']))) echo 'checked'; ?>>
                            <label class="form-check-label">Lainnya</label>
                        </div>
                        <input type="text" class="form-control" name="hobi_lainnya" value="<?php echo $row['hobi_lainnya']; ?>" placeholder="Hobi Lainnya">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" name="update" value="Update">
                    </div>
                </form>
            </div>
        </body>
        </html>
      
        <?php
    } else {
        echo "Data mahasiswa tidak ditemukan.";
    }

    mysqli_close($conn);
    ?>