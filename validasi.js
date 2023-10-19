
    // Fungsi validasi saat formulir dikirim
    function validateForm() {
        // Mengambil nilai dari input fields
        var nama = document.getElementById('nama').value;
        var nim = document.getElementById('nim').value;
        var email = document.getElementById('email').value;
        var jenis_kelamin = document.querySelector('input[name="jenis_kelamin"]:checked');
        var alamat = document.getElementById('alamat').value;
        var fakultas = document.getElementById('fakultas').value;
        var angkatan = document.getElementById('angkatan').value;
        var semester = document.getElementById('semester').value;

        // Validasi Nama
        if (nama === "") {
            document.getElementById('nama-error').textContent = "Nama harus diisi";
            return false;
        } else {
            document.getElementById('nama-error').textContent = "";
        }

        // Validasi NIM
        if (nim === "" || isNaN(nim)) {
            document.getElementById('nim-error').textContent = "NIM harus diisi dengan angka";
            return false;
        } else {
            document.getElementById('nim-error').textContent = "";
        }

        // Validasi Email
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!email.match(emailPattern)) {
            document.getElementById('email-error').textContent = "Format email tidak valid";
            return false;
        } else {
            document.getElementById('email-error').textContent = "";
        }

        // Validasi Jenis Kelamin
        if (jenis_kelamin === null) {
            document.getElementById('jenis_kelamin-error').textContent = "Pilih jenis kelamin";
            return false;
        } else {
            document.getElementById('jenis_kelamin-error').textContent = "";
        }

        // Validasi Alamat
        if (alamat === "") {
            document.getElementById('alamat-error').textContent = "Alamat harus diisi";
            return false;
        } else {
            document.getElementById('alamat-error').textContent = "";
        }

        // Validasi Fakultas
        if (fakultas === "Pilih fakultas") {
            document.getElementById('fakultas-error').textContent = "Pilih fakultas";
            return false;
        } else {
            document.getElementById('fakultas-error').textContent = "";
        }

        // Validasi Angkatan
        if (angkatan === "" || isNaN(angkatan)) {
            document.getElementById('angkatan-error').textContent = "Angkatan harus diisi dengan angka";
            return false;
        } else {
            document.getElementById('angkatan-error').textContent = "";
        }

        // Validasi Semester
        if (semester === "" || isNaN(semester)) {
            document.getElementById('semester-error').textContent = "Semester harus diisi dengan angka";
            return false;
        } else {
            document.getElementById('semester-error').textContent = "";
        }

        return true;
    }

    // Menambahkan event listener ke formulir untuk memanggil fungsi validasi saat formulir dikirim
    document.querySelector('form').addEventListener('submit', function (e) {
        if (!validateForm()) {
            e.preventDefault(); // Mencegah pengiriman formulir jika validasi gagal
        }
    });
