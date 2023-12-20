<?php
include 'sidebar.php';
header('Content-Type: text/html; charset=utf-8');

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();
}

$lastReadSurah = '';
$lastReadVerse = '';


if (isset($_COOKIE['lastReadSurah']) && isset($_COOKIE['lastReadVerse'])) {
    $lastReadSurah = $_COOKIE['lastReadSurah'];
    $lastReadVerse = $_COOKIE['lastReadVerse'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="rizz.css">
</head>
<br>
<br>
<br>

<body>
    <style>
        .card-link {
            text-decoration: none;
        }
    </style>
    <div class="container mt-5">
        <div class="flex flex-cols-3">
            <?php
            include '../db_connect.php';
            foreach (mysqli_query($koneksi, 'SELECT * FROM `judul_surah`') as $s) {
                echo "<div class='col'>
                <a href='baca_surat.php?id_surat=" . $s['id_surah'] . "' class='card-link'>
                    <div class='card mb-4 card-surat'>
                        <div class='card-body'>
                            <h5 class='card-title'>" . $s["id"] . ". " . $s['nama'] . "</h5>
                            <h2 class='card-subtitle mb-2 text-body-secondary text-end'><b><b>" . $s['nama_arab'] . "</b></b></h2>
                            <p class='card-text text-end'>" . $s['arti_surah'] . "</p>
                            <p class='card-text '>" . $s['deskripsi_surah'] . "</p>
                        </div>
                    </div>
                </a>
            </div>";
            } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>

