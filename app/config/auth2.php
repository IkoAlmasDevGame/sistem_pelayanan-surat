<?php 
if(isset($_SESSION["status"])){
    if(isset($_SESSION["id_akun"])){
        if(isset($_SESSION["name"])){
            if(isset($_SESSION["role"])){
                if(isset($_COOKIE['cookies'])){
                    
                }
            }                              
        }
    }
}else{
    echo "<script lang='javascript'>
    window.setTimeout(() => {
        alert('Maaf anda gagal masuk ke halaman utama ...'),
        document.location.href='../auth/login.php'
    }, 3000);
    </script>
    ";
    die;
    exit;
}
?>