<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Baru | SMK Coding</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jaro&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Jaro", sans-serif;
            background-color: #f8f9fa;
        }
        header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 2rem;
        }
        form {
            background-color: white;
            padding: 2rem;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <header>
            <h3>Formulir Pendaftaran Siswa Baru</h3>
        </header>

        <form action="proses-pendaftaran.php" method="POST" enctype="multipart/form-data" class="mx-auto w-75">
            <fieldset>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat lengkap" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                    <div class="form-check">
                        <input type="radio" name="jenis_kelamin" value="laki-laki" class="form-check-input" id="laki-laki" required>
                        <label for="laki-laki" class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jenis_kelamin" value="perempuan" class="form-check-input" id="perempuan" required>
                        <label for="perempuan" class="form-check-label">Perempuan</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="agama" class="form-label">Agama:</label>
                    <select name="agama" class="form-select" required>
                        <option value="">Pilih Agama</option>
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Atheis</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="sekolah_asal" class="form-label">Sekolah Asal:</label>
                    <input type="text" name="sekolah_asal" class="form-control" placeholder="Nama sekolah" required>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">foto</label>
                    <input type="file" name="foto" class="form-control" >
                </div>

                <div class="text-center">
                    <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
                </div>
            </fieldset>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
