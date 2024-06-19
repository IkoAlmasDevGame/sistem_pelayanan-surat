<?php 
require_once("../ui/header.php");
require_once("../ui/sidebar.php");
?>

<div class="m-5 p-5">
    <div class="container-fluid">
        <div class="d-flex justify-content-around align-items-center flex-wrap gap-4">
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-header py-2">
                        <h5 class="card-title2">Pengajuan Setuju</h5>
                    </div>
                    <div class="card-body">
                        <?php 
                            $row = $configs->query("SELECT count(status_permohonan) as sp from pengajuan_ktp WHERE status_permohonan='setuju'");
                            $isi = mysqli_fetch_array($row);
                        ?>
                        <div class="mt-4 mb-auto"></div>
                        <p class="text-center fs-4 fw-normal">
                            <?php echo $isi['sp'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="card">
                    <div class="card-header py-2">
                        <h5 class="card-title2">Pengajuan Di tolak</h5>
                    </div>
                    <div class="card-body">
                        <?php 
                            $row = $configs->query("SELECT count(status_permohonan) as spt from pengajuan_ktp WHERE status_permohonan='di tolak'");
                            $isi = mysqli_fetch_array($row);
                        ?>
                        <div class="mt-4 mb-auto"></div>
                        <p class="text-center fs-4 fw-normal">
                            <?php echo $isi['spt'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
require_once("../ui/footer.php");
?>