<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_fp";

try {
    // buat koneksi pdo
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
}catch (PDOException $e) {
    // Tampilkan eror
    die("Koneksi Gagal" . $e->getMessage());
}

?>