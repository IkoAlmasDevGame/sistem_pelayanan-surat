<?php 
namespace model;

class permohonan {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($jsurat,$nama,$ttl,$agama,$jenis_kelamin,$kewarganegaraan,$alamat_rumah,$email,$no_hp,$nik){
        $jsurat = htmlentities($_POST['jenis_surat']) ? htmlspecialchars($_POST['jenis_surat']) : $_POST['jenis_surat'];
        $nama = htmlentities($_POST['nama']) ? htmlspecialchars($_POST['nama']) : $_POST['nama'];
        $ttl = htmlentities($_POST['ttl']) ? htmlspecialchars($_POST['ttl']) : $_POST['ttl'];
        $agama = htmlentities($_POST['agama']) ? htmlspecialchars($_POST['agama']) : $_POST['agama'];
        $jenis_kelamin = htmlentities($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : $_POST['jenis_kelamin'];
        $kewarganegaraan = htmlentities($_POST['kewarganegaraan']) ? htmlspecialchars($_POST['kewarganegaraan']) : $_POST['kewarganegaraan'];
        $alamat_rumah = htmlentities($_POST['alamat_rumah']) ? htmlspecialchars($_POST['alamat_rumah']) : $_POST['alamat_rumah'];
        $email = htmlentities($_POST['email']) ? htmlspecialchars($_POST['email']) : $_POST['email'];
        $no_hp = htmlentities($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp']) : $_POST['no_hp'];
        $nik = htmlentities($_POST['nik']) ? htmlspecialchars($_POST['nik']) : $_POST['nik'];
        $id_akun = htmlentities($_POST['id_akun']) ? htmlspecialchars($_POST['id_akun']) : $_POST['id_akun'];

        $table = "permohonan_ktp";
        $sql = "INSERT INTO $table (id, jenis_surat, nama, ttl, agama, jenis_kelamin, kewarganegaraan, alamat_rumah, email, no_hp, nik)
         VALUES ('','$jsurat','$nama','$ttl','$agama','$jenis_kelamin','$kewarganegaraan','$alamat_rumah','$email','$no_hp','$nik')";
        $row = $this->db->query($sql);
        $this->db->query("INSERT INTO pengajuan_ktp (id_pengajuan,id_akun,nama,nik,jenis_surat) VALUES ('','$id_akun','$nama','$nik','$jsurat')");

        if($row){
            echo "<script>
            document.location.href = '../ui/header.php?page=formulir&info=berhasil'
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../ui/header.php?page=formulir&info=gagal'
            </script>";
            die;
            exit;            
        }
    }
}

?>