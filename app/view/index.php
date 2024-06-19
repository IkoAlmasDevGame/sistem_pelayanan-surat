<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistem Pelayanan Surat Pengantar KTP">
        <meta name="description" content="Desa TuguJaya Sistem Pelayanan Surat Pengantar KTP">
        <meta name="description" content="@copyright 2024 Desa TuguJaya">
        <?php 
            require_once("../database/koneksi.php");
            $row = $configs->query("SELECT * FROM sistem WHERE flags = '1'");
            $hasil = mysqli_fetch_array($row);
        ?>
        <title><?php echo $hasil['nama_website'] ?></title>
        <link rel="shortcut icon" href="../../assets/logo/<?php echo $hasil['logo']?>" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>

    <body>
        <div class="navbar navbar-expand-sm navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="navbar-default">
                    <div class="d-flex justify-content-start align-items-center gap-2 flex-wrap">
                        <img src="../../assets/logo/<?=$hasil['logo']?>" alt="" width="32" height="32">
                        <a href="./index.php" class="navbar-brand"><?php echo $hasil['nama_desa'] ?></a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-nav-scroll ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="./index.php" class="nav-link active" aria-current="page">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="auth/login.php" class="nav-link" aria-current="page">Login Pengguna</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="min-vh-100">
            <div class="container-fluid">
                <div class="col-sm-12 col-md-12">
                    <div class="row">
                        <div class="img-responsive">
                            <img src="../../assets/gambar/<?php echo $hasil['gambar']?>"
                                class="img-thumbnail img-fluid w-100 d-block" alt="">
                        </div>
                        <div class="z-1 text-end position-relative" style="margin-top: -26px;">
                            <h4 class="fs-5 display-5 fst-normal text-dark fw-bold me-3 text-decoration-underline">
                                <?php echo $hasil['nama_desa'] ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <footer class="footer bottom-0 mt-5">
                <div class="border border-top"></div>
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <p>&copy; 2024 <?php echo $hasil['nama_desa'] ?></p>
                    <a href="./index.php" class="fa fa-arrow-alt-circle-up" style="z-index: 1; opacity: 25%;"></a>
                </div>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        </script>
    </body>

</html>