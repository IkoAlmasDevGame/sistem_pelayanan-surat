<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verifikasi Pengajuan</title>
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
                    <h5 class="card-title2">Verifikasi Pengajuan</h5>
                    <h6 class="card-title2">Pelayanan Surat Pengantar KTP</h6>
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
                                    <th>Status Verifikasi</th>
                                    <th>Proses Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $sql = "SELECT pengajuan_ktp.*, jenis_surat.jenis_surat, jenis_surat.nama_jenis_surat FROM pengajuan_ktp inner join jenis_surat on pengajuan_ktp.jenis_surat = jenis_surat.jenis_surat order by id_pengajuan asc";
                                    $row = $configs->query($sql);
                                    while($isi = $row->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $isi['nik'] ?></td>
                                    <td><?php echo $isi['nama'] ?></td>
                                    <td><?php echo $isi['nama_jenis_surat'] ?></td>
                                    <form action="?aksi=tambah-verifikasi" method="post">
                                        <input type="hidden" name="id_pengajuan" value="<?=$isi['id_pengajuan']?>">
                                        <td>
                                            <?php 
                                                if($isi['status_verifikasi'] == "belum verifikasi"){
                                            ?>
                                            <button type="submit" name="status_verifikasi" value="Ter-Verifikasi"
                                                class="btn btn-success btn-sm">
                                                Klick Here
                                            </button>
                                            <?php
                                                }else{
                                                    echo "sudah verifikasi";
                                                }
                                            ?>
                                        </td>
                                    </form>
                                    <form action="?aksi=tambah-proses" method="post">
                                        <input type="hidden" name="id_pengajuan" value="<?=$isi['id_pengajuan']?>">
                                        <td>
                                            <select name="proses_pengajuan" onchange="this.form.submit()" required id=""
                                                class="form-control form-select">
                                                <option value="">Pilih Proses Pengajuan</option>
                                                <option <?php if($isi['proses_pengajuan'] == "sedang diproses"){?>
                                                    selected <?php } ?> value="sedang diproses">sedang diproses</option>
                                                <option <?php if($isi['proses_pengajuan'] == "selesai diproses"){?>
                                                    selected <?php } ?> value="selesai diproses">selesai diproses
                                                </option>
                                            </select>
                                        </td>
                                    </form>
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