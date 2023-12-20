<?php
include "../../db_connect.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$namaArab = $_POST['nama_arab'];
$arti = $_POST['arti'];
$deskripsi = $_POST['deskripsi'];

$sql = "UPDATE judul_surah
        SET 
            nama = '$nama',
            nama_arab = '$namaArab',
            arti_surah = '$arti',
            deskripsi_surah = '$deskripsi'
        WHERE
            id = $id;";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>
        alert('edit sukses!');
        window.location.href = '../admin_update.php'
    </script>";
}else {
    echo "error";
}

?>