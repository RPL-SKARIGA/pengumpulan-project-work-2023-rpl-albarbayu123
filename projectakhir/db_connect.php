<?php
$host = "localhost";
$username = "root"; 
$password = "";
$database = "juz_amma";
date_default_timezone_set("Asia/Jakarta");
$koneksi = new mysqli($host, $username, $password, $database);
mysqli_query($koneksi,"SET NAMES utf8;");
mysqli_query($koneksi,"SET CHARACTER_SET utf8;");


if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
