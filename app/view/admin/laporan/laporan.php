<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Pengantar Surat</title>
        <link rel="website icon" href="../../../../assets/logo/<?php echo $isi['logo']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "admin"){
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
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title2">Laporan Pengantar Surat</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-responsive-md">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Induk Kependudukan</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Surat</th>
                                    <th>Opsional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $sql = "SELECT pengajuan_ktp.*, jenis_surat.jenis_surat, jenis_surat.nama_jenis_surat, permohonan_ktp.jenis_surat, permohonan_ktp.nama, permohonan_ktp.ttl, permohonan_ktp.agama, permohonan_ktp.jenis_kelamin, permohonan_ktp.kewarganegaraan, permohonan_ktp.alamat_rumah, permohonan_ktp.nik, permohonan_ktp.no_hp, permohonan_ktp.email FROM pengajuan_ktp inner join permohonan_ktp on pengajuan_ktp.nama = permohonan_ktp.nama && pengajuan_ktp.nik = permohonan_ktp.nik && pengajuan_ktp.jenis_surat = permohonan_ktp.jenis_surat inner join jenis_surat on pengajuan_ktp.jenis_surat = jenis_surat.jenis_surat order by pengajuan_ktp.id_pengajuan asc";
                                    $row = $configs->query($sql);
                                    while($isi = $row->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $isi['nik'] ?></td>
                                    <td><?php echo $isi['nama'] ?></td>
                                    <td><?php echo $isi['nama_jenis_surat'] ?></td>
                                    <td>
                                        <a href="?page=print-surat&nik=<?=$isi['nik']?>" class="btn btn-info">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>