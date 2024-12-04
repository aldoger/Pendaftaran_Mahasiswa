<?php

include("config.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // Buat query untuk mendapatkan nama foto
    $sql_get_photo = "SELECT foto FROM calon_siswa WHERE id = $id";
    $query_get_photo = mysqli_query($db, $sql_get_photo);
    
    if ($query_get_photo) {
        $data = mysqli_fetch_assoc($query_get_photo);
        $foto = $data['foto']; // Nama foto yang akan dihapus

        // Tentukan path lengkap foto
        $foto_path = "images/" . $foto;

        // Hapus foto dari folder jika file ada
        if (file_exists($foto_path)) {
            unlink($foto_path); // Menghapus file foto
        }
    }

    // Buat query hapus data dari database
    $sql = "DELETE FROM calon_siswa WHERE id = $id";
    $query = mysqli_query($db, $sql);

    // Apakah query hapus berhasil?
    if ($query) {
        header('Location: list-siswa.php');
    } else {
        die("Gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>