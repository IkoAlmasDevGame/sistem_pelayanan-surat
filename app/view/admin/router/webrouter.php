<?php 
require_once("../../../database/koneksi.php");
$row = mysqli_query($configs, "SELECT * FROM sistem WHERE flags = '1'");
$isi = mysqli_fetch_array($row);

/* Controller & Model */
/* Controller */
require_once("../../../controller/controller.php");
/* Model */
require_once("../../../model/model_pengguna.php");
require_once("../../../model/model_permohonan.php");
require_once("../../../model/model_pengajuan.php");
// Pemanggilan Controller
$user = new controller\Authentication($configs);
$permohonan = new controller\permohonan_ktp($configs);
$pengajuan = new controller\pengajuan_ktp($configs);

if(!isset($_GET['page'])){
    require_once("../dashboard/index.php");
}else{
    switch ($_GET['page']) {
        case 'beranda':
            require_once("../dashboard/index.php");
            break;
        
        case 'verifikasi-pengajuan':
            require_once("../verifikasi/verifikasi.php");
            break;
        
        case 'status-permohonan':
            require_once("../permohonan/permohonan.php");
            break;

        case 'keluar':
            if(isset($_SESSION['status'])){
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("location:../auth/login.php");
            exit(0);
            break;
        
        default:
            require_once("../page/dashboard/index.php");
            break;
    }
}

if(!isset($_GET['aksi'])){
    require_once("../../../controller/controller.php");
}else{
    switch ($_GET['aksi']) {
        case 'tambah-status':
            $pengajuan->buatstatus();
            break;
        case 'tambah-verifikasi':
            $pengajuan->buatverification();
            break;
        case 'tambah-alasan':
            $pengajuan->buatstatusalasan();
            break;
        case 'tambah-proses':
            $pengajuan->buatstatusproses();
            break;

        default:
            require_once("../../../controller/controller.php");
            break;
    }
}
?>