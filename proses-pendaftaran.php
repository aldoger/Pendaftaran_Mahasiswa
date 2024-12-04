<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau belum?
if (isset($_POST['daftar'])) {

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    // Cek apakah foto sudah diupload
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {

        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        // Tentukan path tempat file akan disimpan
        $path = "images/" . $foto;

        // Pindahkan file dari folder sementara ke folder tujuan
        if (move_uploaded_file($tmp, $path)) {
            // Buat query untuk menyimpan data ke database
            $sql = "INSERT INTO calon_siswa (nama, alamat, foto, jenis_kelamin, agama, sekolah_asal) 
                    VALUES ('$nama', '$alamat', '$foto', '$jk', '$agama', '$sekolah')";
            $query = mysqli_query($db, $sql);

            // apakah query simpan berhasil?
            if ($query) {
                // kalau berhasil alihkan ke halaman index.php dengan status=sukses
                header('Location: index.php?status=sukses');
            } else {
                // kalau gagal alihkan ke halaman index.php dengan status=gagal
                header('Location: index.php?status=gagal');
            }
        } else {
            echo "<script>alert('Gagal mengupload foto!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Foto belum dipilih!'); window.history.back();</script>";
    }
} else {
    die("Akses dilarang...");
}

?>
