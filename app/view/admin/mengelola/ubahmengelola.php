<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mengelola Data Pengguna</title>
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
                    <h4 class="card-title2">
                        Ubah Mengelola Akun
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php 
                            if(isset($_GET['id_akun'])){
                                $id = htmlspecialchars($_GET['id_akun']);
                                $row = $configs->query("SELECT * FROM user WHERE id_akun = '$id'");
                                while($isi = $row->fetch_array()){
                        ?>
                        <form action="?aksi=ubah-mengelola" method="post">
                            <input type="hidden" name="id_akun" value="<?=$id?>">
                            <input type="hidden" name="role" value="<?=$isi['role']?>">
                            <div class="form-group">
                                <div class="form-inline">
                                    <div class="form-label mt-1 mt-lg-1">
                                        <label for="">User Name : </label>
                                    </div>
                                    <input type="text" name="username" class="form-control" required
                                        aria-required="true" value="<?php echo $isi['username']?>" id="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-inline">
                                    <div class="form-label mt-1 mt-lg-1">
                                        <label for="">Kata Sandi : </label>
                                    </div>
                                    <input type="password" name="password" class="form-control" required
                                        aria-required="true" placeholder="masukkan kata sandi baru" id="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-inline">
                                    <div class="form-label mt-1 mt-lg-1">
                                        <label for="">Ulangi Kata Sandi : </label>
                                    </div>
                                    <input type="password" name="repassword" class="form-control" required
                                        aria-required="true" placeholder="masukkan ulang kata sandi baru" id="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-secondary">Update</button>
                                    <a href="?page=pengguna" role="button" class='btn btn-default'>Batal</a>
                                    <button type="reset" class="btn btn-danger">Hapus</button>
                                </div>
                            </div>
                        </form>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>