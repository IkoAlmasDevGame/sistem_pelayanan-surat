<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Formulir</title>
        <link rel="website icon" href="../../../../assets/logo/<?php echo $isi['logo']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "pengguna"){
                require_once("../ui/header.php");
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                exit;
            }
        ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header py-2">
                    <h4 class="card-title">Cetak Formulir</h4>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_SESSION['id_akun'])){
                        $id_akun = htmlspecialchars($_SESSION['id_akun']);
                        $sql = "SELECT pengajuan_ktp.*, permohonan_ktp.jenis_surat, permohonan_ktp.nama, permohonan_ktp.ttl, permohonan_ktp.agama, permohonan_ktp.jenis_kelamin, permohonan_ktp.kewarganegaraan, permohonan_ktp.alamat_rumah, permohonan_ktp.nik, permohonan_ktp.no_hp, permohonan_ktp.email FROM pengajuan_ktp inner join permohonan_ktp on pengajuan_ktp.nama = permohonan_ktp.nama && pengajuan_ktp.nik = permohonan_ktp.nik && pengajuan_ktp.jenis_surat = permohonan_ktp.jenis_surat WHERE pengajuan_ktp.id_akun = '$id_akun'";
                        $row = $configs->query($sql);
                    ?>
                    <div class="table-responsive">
                        <div class="text-end">
                            <?php 
                                $config = $configs->query("SELECT * FROM pengajuan_ktp WHERE id_akun = '$id_akun' and status_verifikasi	= 'Ter-verifikasi'");
                                while($data = $config->fetch_array()){
                            ?>
                            <div class="mb-1"></div>
                            <a href="" class="btn btn-primary btn-sm">
                                <i class="fa fa-download"></i>
                                <span>Download</span>
                            </a>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <?php 
                                while($isi = $row->fetch_array()){
                            ?>
                            <div class="mb-1"></div>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="form-label">
                                            <label for="">Nama Lengkap</label>
                                        </td>
                                        <td class="form-inline">
                                            <?php echo $isi['nama'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-label">
                                            <label for="">Tanggal Lahir</label>
                                        </td>
                                        <td class="form-inline">
                                            <?php echo $isi['ttl'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Agama</label>
                                        </td>
                                        <td>
                                            <?php echo $isi['agama'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Jenis Kelamin</label>
                                        </td>
                                        <td>
                                            <?php echo $isi['jenis_kelamin'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Kewarganegaraan</label>
                                        </td>
                                        <td>
                                            <?php echo $isi['kewarganegaraan'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Alamat</label>
                                        </td>
                                        <td>
                                            <?php echo $isi['alamat_rumah'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Email</label>
                                        </td>
                                        <td>
                                            <?php echo $isi['email'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nomor Handphone</label>
                                        </td>
                                        <td>
                                            <?php echo $isi['no_hp'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nomor Induk Kependudukan</label>
                                        </td>
                                        <td>
                                            <?php echo $isi['nik'] ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>