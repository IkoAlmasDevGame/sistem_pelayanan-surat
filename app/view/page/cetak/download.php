<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak</title>
        <link rel="website icon" href="../../../../assets/logo/<?php echo $isi['logo']?>" type="image/x-icon">
        <?php 
            if($_SESSION['role'] == "pengguna"){
                require_once("../ui/header.php");
                require_once("../../../database/koneksi.php");
                
                header("Content-Type:   application/pdf; charset=utf-8");
                header("Content-Disposition: attachment; filename=$_SESSION[name].pdf"); 
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Cache-Control: private",false);

            }else{
                echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
                exit;
            }
        ?>
    </head>

    <body>
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <div class="d-flex justify-content-around align-items-center flex-wrap">
                        <img src="../../../../assets/logo/<?php echo $isi['logo']?>" width="64" height="64"
                            class="img-thumbnail img-circle">
                    </div>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_SESSION[''])){
                    ?>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>