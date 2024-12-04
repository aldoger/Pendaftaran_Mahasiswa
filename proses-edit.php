<?php

include("config.php");

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto_lama = $_POST['foto_lama'];

    // Inisialisasi foto
    $foto = $foto_lama;  // Menggunakan foto lama terlebih dahulu

    // Periksa apakah file baru diunggah
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name'];  
        $tmp = $_FILES['foto']['tmp_name'];
        $path = "images/" . $foto;

        if (move_uploaded_file($tmp, $path)) {
            // Hapus foto lama jika ada
            if (!empty($foto_lama) && file_exists("images/$foto_lama") && $path=="images/$foto_lama") {
                unlink("images/$foto_lama");
            }
        } else {
            die("File gagal diupload.");
        }
    }

    // Update database dengan foto baru atau lama
    $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', foto='$foto' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: index.php?status=sukses');
    } else {
        die("Query gagal: " . mysqli_error($db));
    }

} else {
    die("Akses dilarang...");
}

?>
