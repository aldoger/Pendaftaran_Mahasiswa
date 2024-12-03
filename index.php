<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jaro:opsz@6..72&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <style>
        .btn-custom {
            border: 1px solid black;
            color: black;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-custom:hover {
            background-color: blue;
            color: white;
        }
        header {
            text-align: justify; 
            text-justify: inter-word; 
            line-height: 1.8; 
            color: #333; 
            word-spacing: 2px;
        }
        body{
            font-family: "Jaro", sans-serif;
        }
    </style>
</head>

<body class="overflow-hidden">
    <div class="mb-3 text-center bg-primary">
        <h1 class="display-3">SMK CodePro</h1>
    </div>
    <div class="container-fluid m-2 row">
        <div class="col-6 d-flex flex-column justify-content-center">
            <header class="w-75  fs-5">
                <p>SMK CodePro sekolah yang dirancang khusus untuk mengajarkan keterampilan coding kepada siswa dari berbagai usia dan latar belakang. Kami percaya bahwa coding bukan hanya keterampilan, tetapi juga bahasa masa depan yang membuka pintu menuju peluang global.</p>
            </header>
            <nav>
            <ul class="d-flex list-unstyled gap-3">
                <li><a class="text-decoration-none btn-custom" href="form-daftar.php">Daftar Baru</a></li>
                <li><a class="text-decoration-none btn-custom" href="list-siswa.php">Pendaftar</a></li>
            </ul>

                <?php if(isset($_GET['status'])): ?>
                    <p>
                        <?php
                            if($_GET['status'] == 'sukses'){
                                echo "Pendaftaran siswa baru berhasil!";
                            } else {
                                echo "Pendaftaran gagal!";
                            }
                        ?>
                    </p>
                <?php endif; ?>
            </nav>
        </div>
        <div class="col-6">
            <img src="./asset/logo.png" alt="">
        </div>
    </div>
</body>
</html>