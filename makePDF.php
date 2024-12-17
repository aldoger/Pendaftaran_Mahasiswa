<?php
require('fpdf.php');
include('config.php'); // Include your database configuration file

// Create a new instance of FPDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

// Add Title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'Daftar Siswa Baru - SMK Coding', 0, 1, 'C');

// Add space after title
$pdf->Cell(10, 10, '', 0, 1);

// Add Table Headers
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(173, 216, 230); // Light Blue Background
$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Foto', 1, 0, 'C', true); // Add Foto column
$pdf->Cell(40, 10, 'Nama', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Jenis Kelamin', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Agama', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Alamat', 1, 1, 'C', true);

// Retrieve Data from Database
$sql = "SELECT * FROM calon_siswa";
$query = mysqli_query($db, $sql);
$no = 1;

// Check if data exists
if (mysqli_num_rows($query) > 0) {
    $pdf->SetFont('Arial', '', 10);
    while ($siswa = mysqli_fetch_array($query)) {
        $pdf->Cell(10, 30, $no++, 1, 0, 'C'); // Nomor
        
        // Foto (check if the image exists)
        if (!empty($siswa['foto']) && file_exists('images/' . $siswa['foto'])) {
            $pdf->Cell(30, 30, $pdf->Image('images/' . $siswa['foto'], $pdf->GetX() + 2, $pdf->GetY() + 2, 26, 26), 1, 0, 'C');
        } else {
            $pdf->Cell(30, 30, 'No Image', 1, 0, 'C');
        }
        
        $pdf->Cell(40, 30, $siswa['nama'], 1, 0); // Nama
        $pdf->Cell(30, 30, $siswa['jenis_kelamin'], 1, 0, 'C'); // Jenis Kelamin
        $pdf->Cell(30, 30, $siswa['agama'], 1, 0, 'C'); // Agama
        $pdf->Cell(50, 30, $siswa['alamat'], 1, 1); // Alamat
    }
} else {
    // If no data, display message
    $pdf->Cell(190, 10, 'Tidak ada data siswa.', 1, 1, 'C');
}

// Output Total Students
$total = mysqli_num_rows($query);
$pdf->Ln(10); // Add a new line
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'Total Siswa: ' . $total, 0, 1, 'C');

// Output the PDF
$pdf->Output('D', 'Daftar_Siswa.pdf'); // Force Download
?>
