<?php 
namespace controller;
use model\Pengguna;
use model\permohonan;
use model\pengajuan;

class Authentication {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new Pengguna($konfig);
    }

    public function buatakun(){
        $username = htmlspecialchars($_POST['username']) ? htmlentities($_POST['username']) : $_POST['username'];
        $password = md5(htmlspecialchars($_POST['password']), false) ? md5(htmlentities($_POST['password']), false) : md5($_POST['password'], false);
        $repassword = md5(htmlspecialchars($_POST['repassword']), false) ? md5(htmlentities($_POST['repassword']), false) : md5($_POST['repassword'], false);
        $role = htmlspecialchars($_POST['role']) ? htmlentities($_POST['role']) : $_POST['role'];
        
        $row = $this->konfig->create($username,$password,$repassword,$role);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function ubahakun(){
        $username = htmlspecialchars($_POST['username']) ? htmlentities($_POST['username']) : $_POST['username'];
        $password = md5(htmlspecialchars($_POST['password']), false) ? md5(htmlentities($_POST['password']), false) : md5($_POST['password'], false);
        $repassword = md5(htmlspecialchars($_POST['repassword']), false) ? md5(htmlentities($_POST['repassword']), false) : md5($_POST['repassword'], false);
        $role = htmlspecialchars($_POST['role']) ? htmlentities($_POST['role']) : $_POST['role'];
        $id_akun = htmlspecialchars($_POST['id_akun']) ? htmlentities($_POST['id_akun']) : $_POST['id_akun'];

        $row = $this->konfig->update($username,$password,$repassword,$role,$id_akun);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapusakun(){
        $id_akun = htmlspecialchars($_GET['id_akun']) ? htmlentities($_GET['id_akun']) : $_GET['id_akun'];
        $row = $this->konfig->delete($id_akun);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function signin(){
        session_start();
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $password = md5($_POST['password'], false);
        
        $row = $this->konfig->login($username,$password);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

class permohonan_ktp {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new permohonan($konfig);
    }

    public function buat(){
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

        $row = $this->konfig->create($jsurat,$nama,$ttl,$agama,$jenis_kelamin,$kewarganegaraan,$alamat_rumah,$email,$no_hp,$nik);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

class pengajuan_ktp {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new pengajuan($konfig);
    }

    public function buatstatus(){
        $id_pengajuan = htmlentities($_POST['id_pengajuan']) ? htmlspecialchars($_POST['id_pengajuan']) : $_POST['id_pengajuan'];
        $permohonan = htmlentities($_POST['status_permohonan']) ? htmlspecialchars($_POST['status_permohonan']) : $_POST['status_permohonan'];

        $row = $this->konfig->UpdateStatus($permohonan, $id_pengajuan);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function buatstatusalasan(){
        $id_pengajuan = htmlentities($_POST['id_pengajuan']) ? htmlspecialchars($_POST['id_pengajuan']) : $_POST['id_pengajuan'];
        $alasan = htmlentities($_POST['alasan']) ? htmlspecialchars($_POST['alasan']) : $_POST['alasan'];

        $row = $this->konfig->UpdateStatusAlasan($alasan, $id_pengajuan);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function buatstatusproses(){
        $id_pengajuan = htmlentities($_POST['id_pengajuan']) ? htmlspecialchars($_POST['id_pengajuan']) : $_POST['id_pengajuan'];
        $proses = htmlentities($_POST['proses_pengajuan']) ? htmlspecialchars($_POST['proses_pengajuan']) : $_POST['proses_pengajuan'];

        $row = $this->konfig->UpdateProsesVerification($proses, $id_pengajuan);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }

    public function buatverification(){
        $id_pengajuan = htmlentities($_POST['id_pengajuan']) ? htmlspecialchars($_POST['id_pengajuan']) : $_POST['id_pengajuan'];
        $status = "Ter-Verifikasi";
        $proses = htmlentities($_POST['proses_pengajuan']) ? htmlspecialchars($_POST['proses_pengajuan']) : $_POST['proses_pengajuan'];

        $row = $this->konfig->UpdateVerification($status, $proses, $id_pengajuan);
        if($row === true){
            return true;
        }else{
            return false;
        }
    }
}

?>
