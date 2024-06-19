<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Permohonan Formulir</title>
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
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <h4 class="card-title">Formulir Permohonan</h4>
                    <?php require_once("../permohonan/functions.php") ?>
                </div>
                <?php 
                    if(isset($_SESSION['name']) && isset($_SESSION['id_akun'])){
                        $name = htmlspecialchars($_SESSION['name']);
                        $akun = htmlspecialchars($_SESSION['id_akun']);
                        $row = $configs->query("SELECT * FROM user WHERE username = '$name' and id_akun = '$akun'");
                ?>
                <div class="card-body">
                    <?php while($isi = $row->fetch_array()){ ?>
                    <div class="text-end">
                        <p>nama anda : <?=$name;?></p>
                    </div>
                    <div class="table-responsive">
                        <div class="form-group">
                            <form action="?aksi=tambah-permohonan" method="post">
                                <input type="hidden" name="id_akun" value="<?=$akun?>">
                                <table class="table table-striped-columns">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label for="">Jenis Surat</label>
                                                <select name="jenis_surat" id="jenis_surat" required
                                                    class="form-control form-select">
                                                    <option value="">Pilih Jenis Surat</option>
                                                    <?php 
                                                        $row = $configs->query("SELECT * FROM jenis_surat");
                                                        while($i = $row->fetch_array()){
                                                    ?>
                                                    <option value="<?=$i['jenis_surat']?>">
                                                        <?php echo $i['nama_jenis_surat'] ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">nama lengkap</label>
                                                <input type="text" class="form-control" required aria-required="true"
                                                    name="nama" maxlength="100"
                                                    placeholder="masukkan nama lengkap anda ..." id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date" class="form-control" required aria-required="true"
                                                    name="ttl" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Agama</label>
                                                <select name="agama" id="agama" required
                                                    class="form-control form-select">
                                                    <option value="">Pilih Agama</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                    <option value="katholik">Katholik</option>
                                                    <option value="budha">Buddha</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="konghucu">Konghucu</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Jenis Kelamin</label>
                                                <select name="jenis_kelamin" id="jenis_kelamin" required
                                                    class="form-control form-select">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="laki-laki">Laki - Laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Kewarga Negaraan</label>
                                                <input type="text" class="form-control" required aria-required="true"
                                                    name="kewarganegaraan"
                                                    placeholder="masukkan nama kewarga negara anda ..." maxlength="128"
                                                    id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Alamat Rumah</label>
                                                <textarea name="alamat_rumah" class="form-control" required
                                                    aria-required="true" id=""></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">email</label>
                                                <input type="email" class="form-control" required aria-required="true"
                                                    name="email" placeholder="masukkan alamat email anda ..."
                                                    maxlength="100" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nomor Telepon</label>
                                                <input type="text" class="form-control" required aria-required="true"
                                                    name="no_hp" placeholder="masukkan nomor handphone anda ..."
                                                    maxlength="13" id="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="">Nomor Induk Kependudukan</label>
                                                <input type="text" class="form-control" required aria-required="true"
                                                    name="nik" placeholder="masukkan nomor induk kependudukan anda ..."
                                                    maxlength="16" id="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-default"
                                            onclick="location.href='../ui/header.php?page=beranda'">Cancel</button>
                                        <button type="reset" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>