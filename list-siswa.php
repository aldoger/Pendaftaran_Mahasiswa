<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jaro&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Jaro", sans-serif;
            background-color: #f8f9fa; /* Light gray background for contrast */
        }
        header {
            background-color: #007bff; /* Blue */
            color: white;
            padding: 1rem 0;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 1rem;
        }
        table {
            border-radius: 5px;
            overflow: hidden;
        }
        table thead {
            background-color: #007bff;
            color: white;
        }
        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tbody tr:hover {
            background-color: #dbe9f8;
        }
        nav a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        nav a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <header>
            <h3>Siswa yang sudah mendaftar</h3>
        </header>

        <nav class="mb-3">
            <a href="form-daftar.php">[+] Tambah Baru</a>
            <a href="makePDF.php" class="btn btn-primary">Generate PDF</a>
        </nav>

        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM calon_siswa";
                $query = mysqli_query($db, $sql);

                // Periksa apakah ada data
                if (mysqli_num_rows($query) > 0) {
                    $no = 1; // Nomor urut
                    while ($siswa = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $siswa['nama'] . "</td>";
                        if (empty($siswa['foto'])) {
                            echo "<td><span class='text-muted'>Tidak Ada Foto</span></td>";
                        } else {
                            echo "<td><img src='images/" . $siswa['foto'] . "' width='100' height='100' alt='Foto Siswa'></td>";
                        }
                        echo "<td>" . $siswa['alamat'] . "</td>";
                        echo "<td>" . $siswa['jenis_kelamin'] . "</td>";
                        echo "<td>" . $siswa['agama'] . "</td>";
                        echo "<td>" . $siswa['sekolah_asal'] . "</td>";

                        // Tindakan
                        echo "<td>";
                        echo "<a class='btn btn-warning btn-sm' href='form-edit.php?id=" . $siswa['id'] . "'>Edit</a> ";
                        echo "<a class='btn btn-danger btn-sm' href='hapus.php?id=" . $siswa['id'] . "'>Hapus</a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                } else {
                    // Jika tidak ada data siswa
                    echo "<tr>";
                    echo "<td colspan='8' class='text-center'>Tidak ada data siswa.</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <p class="text-center">Total: <?php echo mysqli_num_rows($query) ?></p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
