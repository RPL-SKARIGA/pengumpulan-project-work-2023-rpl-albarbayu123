<?php
include "../../db_connect.php";
$id = $_GET['id'];
$sql = "DELETE FROM judul_surah WHERE id = $id";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>alert('hapus sukses!');window.location.href='../admin_update.php'</script>";
}else {
    echo "error";
}
?>