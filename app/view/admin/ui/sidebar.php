<?php 
if($_SESSION['role'] == ""){
    echo "<script>document.location.href = '../auth/login.php'</script>";
    die;
    exit;
}
?>

<?php 
if($_SESSION['role'] == "admin"){
?>
<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" role="button" class="logo d-flex align-items-center fst-normal fw-semibold" style="font-size: 13px;">
            <?php echo $isi['nama_desa'] ?>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto mx-3">
        <ul>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                    data-bs-toggle="dropdown" aria-controls="dropdown">
                    <i class="fa fa-user-alt"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <hr class="dropdown-divider">
                        <div class="text-start">nama : <?php echo $_SESSION['name'] ?></div>
                        <div class="mb-1"></div>
                        <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                        <hr class="dropdown-divider">
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
<!-- ======= Header ======= -->

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="?page=beranda" aria-current="page">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <div class="dropdown-divider"></div>

        <!-- Dropdown Button -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data Master</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="?page=verifikasi-pengajuan" aria-current="page">
                        <i class="bi bi-circle"></i>
                        <span>Verifikasi Pengajuan</span>
                    </a>
                </li>
                <li>
                    <a href="?page=status-permohonan" aria-current="page">
                        <i class="bi bi-circle"></i>
                        <span>Update Status Permohonan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <div class="dropdown-divider"></div>

        <!-- Dropdown Laporan -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data Laporan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="laporan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="" aria-current="page">
                        <i class="bi bi-circle"></i>
                        <span>surat pengantar ktp</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <div class="dropdown-divider"></div>

        <!-- Data Pengguna (user profile pembuatan akun) -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#person-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data pengguna</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="person-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="" aria-current="page">
                        <i class="bi bi-circle"></i>
                        <span>Mengelola Data Pengguna</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->


        <div class="dropdown-divider"></div>

        <li class="nav-item">
            <a class="nav-link" href="?page=sistemwebsite" aria-current="page">
                <i class="fab fa-internet-explorer has-icon text-primary"></i>
                <span class="text-info hover">Sistem Website</span>
            </a>
        </li><!-- End Log Out Nav -->

        <li class="nav-item">
            <a class="nav-link" onclick="return confirm('Apakah anda ingin keluar dari website ini ?')"
                href="?page=keluar" aria-current="page">
                <i class="fa fa-sign-out has-icon fa-1x"></i>
                <span>Log Out</span>
            </a>
        </li><!-- End Log Out Nav -->
    </ul>

</aside>

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                </div>

            </div><!-- End Right side columns -->

        </div>

    </section>
    <?php
}else{
    echo "<script>document.location.href = '../auth/login.php'</script>";
    die;
    exit;
}
?>