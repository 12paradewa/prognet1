<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi Mahasiswa</title>
    <!-- Tambahkan referensi ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="cobak.css">

</head>
<body>
    <div class="container">
        <h1 class="text-center">Form Biodata Mahasiswa</h1>
        <form method="post" action="hasil.php">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap:</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>

                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="number" class="form-control" name="nim" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki" required>
                            <label class="form-check-label">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" required>
                            <label class="form-check-label">Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" name="alamat" rows="4" required></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fakultas">Fakultas:</label>
                        <input type="text" class="form-control" name="fakultas" required>
                    </div>

                    <div class="form-group">
                        <label for="jurusan">Jurusan:</label>
                        <input type="text" class="form-control" name="jurusan" required>
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan:</label>
                        <input type="number" class="form-control" name="angkatan" required>
                    </div>

                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <input type="number" class="form-control" name="semester" required>
                    </div>

                    <div class="form-group">
                        <label for="hobi">Hobby:</label><br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="Olahraga">
                            <label class="form-check-label">Olahraga</label>
                        </div>
                  
                      
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="Musik">
                            <label class="form-check-label">Musik</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="hobi[]" value="Lainnya">
                            <label class="form-check-label">Lainnya</label>
                        </div>
                        <input type="text" class="form-control" name="hobi_lainnya" placeholder="Hobi Lainnya">
                    </div>

                    
                </div>
            </div>

            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Simpan">
            </div>
        </form>
    </div>

    <!-- Tambahkan referensi ke Bootstrap JS dan jQuery (jika diperlukan) di bawah ini -->
</body>
</html>
