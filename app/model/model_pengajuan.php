<?php 
namespace model;

class pengajuan {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function UpdateStatus($permohonan, $id_pengajuan){
        $id_pengajuan = htmlentities($_POST['id_pengajuan']) ? htmlspecialchars($_POST['id_pengajuan']) : $_POST['id_pengajuan'];
        $permohonan = htmlentities($_POST['status_permohonan']) ? htmlspecialchars($_POST['status_permohonan']) : $_POST['status_permohonan'];

        $table = "pengajuan_ktp";
        $sql = "UPDATE $table SET status_permohonan='$permohonan' WHERE id_pengajuan='$id_pengajuan'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>document.location.href = '../ui/header.php?page=status-permohonan';</script>";
            die;
            exit;
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=status-permohonan';</script>";
            die;
            exit;            
        }
    }

    public function UpdateStatusAlasan($alasan, $id_pengajuan){
        $id_pengajuan = htmlentities($_POST['id_pengajuan']) ? htmlspecialchars($_POST['id_pengajuan']) : $_POST['id_pengajuan'];
        $alasan = htmlentities($_POST['alasan']) ? htmlspecialchars($_POST['alasan']) : $_POST['alasan'];

        $table = "pengajuan_ktp";
        $sql = "UPDATE $table SET alasan='$alasan' WHERE id_pengajuan='$id_pengajuan'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>document.location.href = '../ui/header.php?page=status-permohonan';</script>";
            die;
            exit;
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=status-permohonan';</script>";
            die;
            exit;            
        }
    }

    public function UpdateVerification($status, $id_pengajuan){
        $id_pengajuan = htmlentities($_POST['id_pengajuan']) ? htmlspecialchars($_POST['id_pengajuan']) : $_POST['id_pengajuan'];
        $status = "Ter-Verifikasi";

        $table = "pengajuan_ktp";
        $sql = "UPDATE $table SET status_verifikasi='$status' WHERE id_pengajuan='$id_pengajuan'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>document.location.href = '../ui/header.php?page=verifikasi-pengajuan';</script>";
            die;
            exit;
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=verifikasi-pengajuan';</script>";
            die;
            exit;            
        }
    }
    
    public function UpdateProsesVerification($proses, $id_pengajuan){
        $id_pengajuan = htmlentities($_POST['id_pengajuan']) ? htmlspecialchars($_POST['id_pengajuan']) : $_POST['id_pengajuan'];
        $proses = htmlentities($_POST['proses_pengajuan']) ? htmlspecialchars($_POST['proses_pengajuan']) : $_POST['proses_pengajuan'];

        $table = "pengajuan_ktp";
        $sql = "UPDATE $table SET proses_pengajuan='$proses' WHERE id_pengajuan='$id_pengajuan'";
        $row = $this->db->query($sql);

        if($row){
            echo "<script>document.location.href = '../ui/header.php?page=verifikasi-pengajuan';</script>";
            die;
            exit;
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=verifikasi-pengajuan';</script>";
            die;
            exit;            
        }
    }
}

?>