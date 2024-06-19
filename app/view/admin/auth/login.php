<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistem Pelayanan Surat Pengantar KTP">
        <meta name="description" content="Desa TuguJaya Sistem Pelayanan Surat Pengantar KTP">
        <meta name="description" content="@copyright 2024 Desa TuguJaya">
        <?php 
            require_once("../../../database/koneksi.php");
            $row = $configs->query("SELECT * FROM sistem WHERE flags = '1'");
            $hasil = mysqli_fetch_array($row);
        ?>
        <title><?php echo $hasil['nama_website'] ?></title>
        <link rel="shortcut icon" href="../../../../assets/logo/<?php echo $hasil['logo']?>" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="./styles.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="d-grid justify-content-center align-items-center flex-wrap">
                <div class="m-5 p-5">
                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                        <div class="card shadow mb-4">
                            <div class="card-header py-2">
                                <h4 class="card-title">Login Administrasi</h4>
                                <div class="border border-top"></div>
                                <h4 class="card-title2"><?php echo $hasil['nama_website'] ?></h4>
                                <h4 class="card-title2"><?php echo $hasil['nama_desa'] ?></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="table-responsive">
                                        <?php 
                                            require_once("../../../controller/controller.php");
                                            require_once("../../../model/model_pengguna.php");
                                            $user = new controller\Authentication($configs);

                                            if(!isset($_GET['aksi'])){
                                                require_once("../../../controller/controller.php");
                                            }else{
                                                switch ($_GET['aksi']) {
                                                    case 'sign-in':
                                                        $user->signin();
                                                        break;
                                                    
                                                    default:
                                                        require_once("../../../controller/controller.php");
                                                        break;
                                                }
                                            }
                                        ?>
                                        <form action="?aksi=sign-in" method="post">
                                            <div class="form-inline">
                                                <div class="form-label">
                                                    <label for="">user name</label>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <input type="text" name="username" id="" class="form-control"
                                                        required aria-required="true"
                                                        placeholder="masukkan username anda ...">
                                                </div>
                                            </div>
                                            <div class="form-inline">
                                                <div class="form-label">
                                                    <label for="">password</label>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <input type="password" name="password" id="" class="form-control"
                                                        required aria-required="true"
                                                        placeholder="masukkan password anda ...">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-center">
                                                    <a href="./register.php" role="button"
                                                        class="text-primary text-decoration-none">
                                                        membuat akun ...
                                                    </a>
                                                    <div class="mb-1"></div>
                                                    <button type="submit" class="btn btn-primary col-sm-12 col-md-6">
                                                        Login
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="container bottom-0">
                                <footer class="footer text-start">
                                    <div class="border border-top"></div>
                                    &copy; 2024 <?php echo $hasil['nama_desa'] ?>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        </script>
    </body>

</html>