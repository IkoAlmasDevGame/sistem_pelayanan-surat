<?php 
namespace model;

class Pengguna {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function login($username,$password){
        $username = htmlentities($_POST['username']) ? htmlspecialchars($_POST['username']) : $_POST['username'];
        $password = md5($_POST['password'], false);
        password_verify($password, PASSWORD_DEFAULT);

        if($username == "" || $password == ""){
            echo "";
            die;
            exit;
        }

        $table = "user";
        $sql = "SELECT * FROM $table WHERE username='$username' and password ='$password'";
        $config = $this->db->query($sql);
        $cek = mysqli_num_rows($config);

        if($cek > 0){
            $response = array($username,$password);
            $responded["user"] = $response;
            if($row = $config->fetch_assoc()){
                if($row['role'] == "admin"){
                    $_SESSION['id_akun'] = $row['id_akun'];
                    $_SESSION['name'] = $row['username'];
                    $_SESSION['role'] = "admin";                    
                    echo "<script>
                    document.location.href = '../ui/header.php?page=beranda';
                    </script>";
                }elseif($row['role'] == "pengguna"){
                    $_SESSION['id_akun'] = $row['id_akun'];
                    $_SESSION['name'] = $row['username'];
                    $_SESSION['role'] = "pengguna";
                    echo "<script>
                    document.location.href = '../page/ui/header.php?page=beranda';
                    </script>";
                }
                $_SESSION['status'] = true;
                $_COOKIE['cookies'] = $username;
                setcookie($responded[$table], $row, time() + (86400 * 30), "/");
                array_push($responded[$table], $row);
                exit;
            }
        }else{
            $_SESSION['status'] = false;
            echo "<script>
                document.location.href = '../auth/login.php'
            </script>";
            die;
            exit;
        }
    }

    public function create($username,$password,$repassword,$role){
        $username = htmlspecialchars($_POST['username']) ? htmlentities($_POST['username']) : $_POST['username'];
        $password = md5(htmlspecialchars($_POST['password']), false) ? md5(htmlentities($_POST['password']), false) : md5($_POST['password'], false);
        $repassword = md5(htmlspecialchars($_POST['repassword']), false) ? md5(htmlentities($_POST['repassword']), false) : md5($_POST['repassword'], false);
        $role = htmlspecialchars($_POST['role']) ? htmlentities($_POST['role']) : $_POST['role'];

        if($username == "" || $password == "" || $repassword == ""){
            echo "";
            die;
            exit;
        }

        if($role == "admin") {
            $table = "user";
            $sql = "INSERT INTO $table (id_akun,username,password,repassword,role) VALUES ('','$username','$password','$repassword','$role')";
            $row = $this->db->query($sql);
        }else if($role == "pengguna"){
            $table = "user";
            $sql = "INSERT INTO $table (id_akun,username,password,repassword,role) VALUES ('','$username','$password','$repassword','$role')";
            $row = $this->db->query($sql);
        }

        if($row){
            echo "<script>
            document.location.href = '../auth/register.php';
            </script>";
            die;
            exit;
        }else{
            echo "<script>
            document.location.href = '../auth/register.php';
            </script>";
            die;
            exit;
        }
    }

    public function update($username,$password,$repassword,$role,$id_akun){
        $username = htmlspecialchars($_POST['username']) ? htmlentities($_POST['username']) : $_POST['username'];
        $password = md5(htmlspecialchars($_POST['password']), false) ? md5(htmlentities($_POST['password']), false) : md5($_POST['password'], false);
        $repassword = md5(htmlspecialchars($_POST['repassword']), false) ? md5(htmlentities($_POST['repassword']), false) : md5($_POST['repassword'], false);
        $role = htmlspecialchars($_POST['role']) ? htmlentities($_POST['role']) : $_POST['role'];
        $id_akun = htmlspecialchars($_POST['id_akun']) ? htmlentities($_POST['id_akun']) : $_POST['id_akun'];

        if($username == "" || $password == "" || $repassword == ""){
            echo "";
            die;
            exit;
        }

        if($role == "admin") {
            $table = "user";
            $sql = "UPDATE $table SET username='$username', password='$password', repassword='$repassword', role='$role' WHERE id_akun='$id_akun'";
            $row = $this->db->query($sql);
        }else if($role == "pengguna"){
            $table = "user";
            $sql = "UPDATE $table SET username='$username', password='$password', repassword='$repassword', role='$role' WHERE id_akun='$id_akun'";
            $row = $this->db->query($sql);
        }

        if($row){
            echo "<script>document.location.href = '../ui/header.php?page=pengguna';</script>";
            die;
            exit;
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=pengguna';</script>";
            die;
            exit;
        }
    }

    public function delete($id_akun){
        $id_akun = htmlspecialchars($_GET['id_akun']) ? htmlentities($_GET['id_akun']) : $_GET['id_akun'];
        $table = "user";
        $sql = "DELETE FROM $table WHERE id_akun = '$id_akun'";
        $row = $this->db->query($sql);

        if($row){
            echo "";
            die;
            exit;
        }else{
            echo "";
            die;
            exit;
        }
    }
}
?>