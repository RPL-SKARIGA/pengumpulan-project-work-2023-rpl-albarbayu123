<?php
include "../../db_connect.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$namaArab = $_POST['nama_arab'];
$arti = $_POST['arti'];
$deskripsi = $_POST['deskripsi'];
$id = $_POST['idsurah'];


$sql = "INSERT INTO judul_surah 
        VALUES (0, '$nama', '$namaArab', '$arti', '$deskripsi', $id);";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>
        alert('tambah sukses!');
        window.location.href = '../admin_update.php'
    </script>";
}else {
    echo "error";
}
?>