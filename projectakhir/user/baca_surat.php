<?php
include 'sidebar.php';
?>
<?php
include '../db_connect.php';
if (isset($_GET['id_surat'])) {
    $id_surat = $_GET['id_surat'];
    $data_surat = mysqli_query($koneksi, "SELECT * FROM quran_id WHERE suraId=$id_surat");
    $judul_surat = mysqli_query($koneksi, "SELECT * FROM judul_surah WHERE id_surah=$id_surat");
    $user = $_SESSION['user_id'];
    setcookie("url_terakhir_baca$user", "baca_surat.php?id_surat=$id_surat", time() + (86400 * 30));
    foreach ($judul_surat as $js) {
        setcookie("nama_terakhir_baca$user", $js['nama'], time() + (86400 * 30));
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-32">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel="stylesheet" href="surat.css">
            <title>
                <?= $js['nama'] ?>
            </title>
        </head>

        <body>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-2">
                            <div class="card-body">
                                <strong>
                                    <center>
                                        <?= $js['nama'] ?>
                                        <center>
                                </strong>
                                <p>
                                    <center>Jumlah Ayat :
                                        <?= mysqli_num_rows($data_surat) ?> (
                                        <?= $js['arti_surah'] ?> )<center>
                                </p>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h1>
                                    <center><b><b>بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</b></b>
                                        <center>
                                </h1>
                            </div>
                        </div>
                        <?php foreach ($data_surat as $ds) { ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p>
                                        <?= $ds['verseID'] ?>.
                                    </p>
                                    <h3 class="text-end"><b><b>
                                                <?= $ds['ayahText'] ?>
                                            </b></b></h3>
                                    <p>
                                        <?= $ds['readText'] ?>
                                    </p>
                                    <hr>
                                    <p>
                                        <?= $ds['indoText'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="relative">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                    <input type="hidden" name="id_surat" value="<?php echo $js['id_surah'] - 1 ?>">
                    <button class="right-button" type="submit"><span>next</span></button>
                </form>
                <?php if ($_GET['id_surat'] == "114") {
                } else { ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                        <input type="hidden" name="id_surat" value="<?php echo $_GET['id_surat'] + 1 ?>" />
                        <button class="left-button" type="submit"><span>previous</span></button>
                    </form>
                <?php } ?>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>
    <?php }
} ?>