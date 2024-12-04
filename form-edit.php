<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Edit Siswa | SMK Coding</title>
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
            <h3>Formulir Edit Siswa</h3>
        </header>

        <form action="proses-edit.php" method="POST" enctype="multipart/form-data" class="mx-auto w-75">
            <fieldset>
                <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $siswa['nama'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Alamat lengkap" required><?php echo $siswa['alamat'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                    <?php $jk = $siswa['jenis_kelamin']; ?>
                    <div class="form-check">
                        <input type="radio" name="jenis_kelamin" value="laki-laki" class="form-check-input" id="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?> required>
                        <label for="laki-laki" class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="jenis_kelamin" value="perempuan" class="form-check-input" id="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?> required>
                        <label for="perempuan" class="form-check-label">Perempuan</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="agama" class="form-label">Agama:</label>
                    <?php $agama = $siswa['agama']; ?>
                    <select name="agama" class="form-select" required>
                        <option value="Islam" <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                        <option value="Kristen" <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                        <option value="Hindu" <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                        <option value="Budha" <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                        <option value="Atheis" <?php echo ($agama == 'Atheis') ? "selected" : "" ?>>Atheis</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="sekolah_asal" class="form-label">Sekolah Asal:</label>
                    <input type="text" name="sekolah_asal" class="form-control" placeholder="Nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" name="foto" class="form-control">
                    <!-- Input tersembunyi untuk menyimpan nama foto lama -->
                    <input type="hidden" name="foto_lama" value="<?php echo $siswa['foto']; ?>">
                    <!-- Menampilkan gambar lama -->
                    <?php if (!empty($siswa['foto'])): ?>
                        <img src="images/<?php echo $siswa['foto']; ?>" alt="Foto Siswa" style="width: 150px; height: auto; margin-top: 10px;">
                    <?php endif; ?>
                </div>


                <div class="text-center">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </div>
            </fieldset>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
