<?php 
// error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$dbname = "pelayanan_surat";
$configs = mysqli_connect("localhost", "root", "", $dbname);
if($configs->connect_errno){
    die("Koneksi database gagal : ".$configs->connect_errno);
    $configs->close();
}
?>