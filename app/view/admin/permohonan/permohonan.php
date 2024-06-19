<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Status Permohonan</title>
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
                    <h5 class="card-title2">Update Status Permohonan</h5>
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
                                    <th>Status Permohonan</th>
                                    <th>Alasan</th>
                                    <th>Opsional</th>
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
                                    <form action="?aksi=tambah-status" method="post">
                                        <input type="hidden" name="id_pengajuan" value="<?=$isi['id_pengajuan']?>">
                                        <td>
                                            <select name="status_permohonan" onchange="this.form.submit()" required
                                                id="" class="form-control form-select">
                                                <option value="">Pilih Status Permohonan</option>
                                                <option <?php if($isi['status_permohonan'] == "di tolak"){?> selected
                                                    <?php } ?> value="di tolak">di tolak</option>
                                                <option <?php if($isi['status_permohonan'] == "setuju"){?> selected
                                                    <?php } ?> value="setuju">setuju
                                                </option>
                                            </select>
                                        </td>
                                    </form>
                                    <td>
                                        <?php 
                                            if($isi['status_permohonan'] == "setuju"){
                                        ?>
                                        <h6 class="fs-6 fst-normal fw-normal text-center text-muted"></h6>
                                        <?php
                                            }else{
                                        ?>
                                        <a href="" role="button" data-bs-toggle="modal"
                                            data-bs-target="#alasan<?=$isi['id_pengajuan']?>" aria-current="page"
                                            class="btn btn-primary btn-sm">
                                            Lihat Alasan
                                        </a>
                                        <div class="modal fade" id="alasan<?=$isi['id_pengajuan']?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Lihat Alasan</h4>
                                                        <button type='button' class='btn btn-close'
                                                            data-bs-dismiss='modal'></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?php echo $isi['alasan'] ?></p>
                                                        <div class="modal-footer">
                                                            <button type='button' class='btn btn-default'
                                                                data-bs-dismiss='modal'>Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="" role="button" data-bs-toggle="modal"
                                            data-bs-target="#tambahalasan<?=$isi['id_pengajuan']?>" aria-current="page"
                                            class="btn btn-danger btn-sm">
                                            <i class="bi bi-plus"></i>
                                        </a>
                                        <div class="modal fade" id="tambahalasan<?=$isi['id_pengajuan']?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Tambah Alasan</h4>
                                                        <button type='button' class='btn btn-close'
                                                            data-bs-dismiss='modal'></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="?aksi=tambah-alasan" method="post">
                                                            <div class="form-inline">
                                                                <div class="card-input">
                                                                    <p>Status Permohonan Pengajuan :
                                                                        <?php echo $isi['status_permohonan'] ?>
                                                                    </p>
                                                                </div>
                                                                <div class="card-input">
                                                                    <label for="">Alasan Pengajuan Permohonan : </label>
                                                                    <input type="hidden" name="id_pengajuan"
                                                                        value="<?=$isi['id_pengajuan']?>">
                                                                    <textarea name="alasan" class="form-control"
                                                                        required id=""></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-secondary">
                                                                    Update
                                                                </button>
                                                                <button type='button' class='btn btn-default'
                                                                    data-bs-dismiss='modal'>Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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