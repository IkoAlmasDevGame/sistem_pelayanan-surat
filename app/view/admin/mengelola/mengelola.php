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
                    <h5 class="card-title2">Data Mengelola Pengguna</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm w-100 table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>repassword</th>
                                    <th>Jabatan</th>
                                    <th>opsional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    $row = $configs->query("SELECT * FROM user");
                                    while($isi = $row->fetch_array()){
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $isi['username'] ?></td>
                                    <td>Ter-Enkripsi</td>
                                    <td>Ter-Enkripsi</td>
                                    <td><?php echo $isi['role'] ?></td>
                                    <td>
                                        <?php 
                                            if($isi['role'] == "admin"){
                                        ?>
                                        <a href="?page=pengguna&aksi=ubahmengelola&id_akun=<?=$isi['id_akun']?>"
                                            aria-current="page" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit fa-1x"></i>
                                        </a>
                                        <a href="?page=pengguna&aksi=hapus-mengelola&id_akun=<?=$isi['id_akun']?>"
                                            aria-current="page"
                                            onclick="return confirm('Apakah anda ingin menghapus data pengelola pengguna ini ?')"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash fa-1x"></i>
                                        </a>
                                        <?php
                                            }elseif($isi['role'] == "pengguna"){
                                        ?>
                                        <a href="?page=pengguna&aksi=hapus-mengelola&id_akun=<?=$isi['id_akun']?>"
                                            aria-current="page"
                                            onclick="return confirm('Apakah anda ingin menghapus data pengelola pengguna ini ?')"
                                            class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash fa-1x"></i>
                                        </a>
                                        <?php
                                            }
                                        ?>
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