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
                require_once("../../../database/koneksi.php");
                
                // header("Content-Type: application/vnd.ms-excel; charset=utf-8");
                // header("Content-Disposition: attachment; filename=surat-pengantar-ktp.xls"); 
                // header("Expires: 0");
                // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                // header("Cache-Control: private",false);
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                exit;
            }
        ?>
    </head>

    <div class="container col-sm-12 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-2">
                <div class="d-flex justify-content-center align-items-center flex-wrap gap-5">
                    <div class="img-responsive">
                        <img src="../../../../assets/logo/<?php echo $isi['logo']?>"
                            class="img-fluid img-thumbnail d-block" alt="">
                    </div>
                    <div class="d-grid justify-content-center align-items-center flex-wrap">
                        <h5 class="card-title2 text-dark" style="text-align: center;">PEMERINTAH KABUPATEN TUGU JAYA
                        </h5>
                        <h5 class="card-title2 text-dark" style="text-align: center;">
                            <?php echo $isi['nama_desa'] ?>
                        </h5>
                    </div>
                </div>
                <?php 
                    if(isset($_GET['nik'])){
                        $nik = htmlspecialchars($_GET['nik']);
                        $row = $configs->query("SELECT * FROM permohonan_ktp WHERE nik = '$nik'");
                    }
                ?>
                <div class="border border-top mt-1"></div>
                <h5 class="card-title text-dark" style="text-align: center; text-decoration: underline;">SURAT
                    PENGANTAR
                </h5>
                <p class="text-center text-dark">Nomor : ..... / ..... / ..... / ...... / ...... / ...... </p>
                <div class="card-body">
                    <p class="text-center text-dark">Yang bertanda tangan di bawah ini Kepala
                        <?php echo $isi['nama_desa'] ?>,
                        menerangkan bahwa :</p>
                    <div class="table-responsive">
                        <?php 
                                while($iss = $row->fetch_array()){
                                    $tanggallahir = explode("-", $iss['ttl']);
                            ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <label for="" class="form-label mt-2" style="font-size: 14px;">NAMA</label>
                                    </td>
                                    <td>
                                        <input type="text" value="<?=$iss['nama']?>" class="form-control-plaintext"
                                            style="font-size: 14px;" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="form-label mt-2" style="font-size: 14px;">NIK</label>
                                    </td>
                                    <td>
                                        <input type="text" value="<?=$iss['nik']?>" class="form-control-plaintext"
                                            style="font-size: 14px;" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="form-label mt-2" style="font-size: 14px;">Tempat /
                                            Tanggal Lahir</label>
                                    </td>
                                    <td>
                                        <input type="text"
                                            value="<?php echo $isi['nama_desa'].", ".$tanggallahir[2]." / ".$tanggallahir[1]." / ".$tanggallahir[0]?>"
                                            class="form-control-plaintext" style="font-size: 14px;" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="form-label mt-2" style="font-size: 14px;">Jenis
                                            Kelamin</label>
                                    </td>
                                    <td>
                                        <input type="text" value="<?php echo ucfirst($iss['jenis_kelamin'])?>"
                                            class="form-control-plaintext" style="font-size: 14px;" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="form-label mt-2" style="font-size: 14px;">Bangsa /
                                            Agama</label>
                                    </td>
                                    <td>
                                        <input type="text"
                                            value="<?php echo ucfirst($iss['kewarganegaraan']). " / ".ucfirst($iss['agama'])?>"
                                            class="form-control-plaintext" style="font-size: 14px;" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="" class="form-label mt-2">ALAMAT </label>
                                    </td>
                                    <td>
                                        <textarea style="font-size: 14px;" name="" class="form-control-plaintext" id=""
                                            readonly><?php echo $iss['alamat_rumah']?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                                }
                            ?>
                    </div>
                    <p class="text-dark text-center" style="font-size: 12px;">
                        Memang benar yang namanya tersebut diatas Penduduk dan Berdomisili di
                        <?php echo $isi['nama_desa'] ?>.
                    </p>
                    <p class="text-dark text-center" style="font-size: 12px;">
                        Surat Pengantar ini diberikan untuk keperluan mengurus / mengambil / memperbaiki :
                    <div class="text-decoration-underline text-dark text-center" style="font-size: 12px;">“ Kartu
                        Keluarga (KK) / KTP /
                        Akte Kelahiran ”</div>
                    </p>
                    <p class="text-dark text-center" style="font-size: 12px;">
                        Demikianlah Surat Pengantar ini dibuat dengan sebenarnya, untuk dapat dipergunakan
                        sebagaimana mestinya.
                    </p>
                    <div class="form-inline text-end">
                        <p class="text-dark" style="font-size: 12px;">DIKELUARKAN DI :
                            <?php echo $isi['nama_desa'] ?></p>
                        <p class="text-dark text-decoration-underline" style="font-size: 12px;">PADA
                            TANGGAL :
                            ...... ........... ,
                            <span id="textTahun" style="font-size: 12px;">
                                <script type="text/javascript">
                                var today = new Date();
                                var tahun = today.getFullYear();
                                document.getElementById("textTahun").innerHTML = tahun;
                                </script>
                            </span>
                        </p>
                        <div class="text-dark">
                            <div class="text-dark" style="font-size: 12px;">KEPALA DESA
                                <?php echo ucwords(ucfirst($isi['nama_desa'])) ?>
                            </div>
                            <br>
                            <br>
                            (.............................................)
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("../ui/footer.php");?>