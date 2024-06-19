<?php 
if(isset($_GET['info'])){
    if($_GET['info'] == "berhasil"){
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Informasi</strong>
    <p>Berhasil ditambahkan ...</p>
    <button type="button" class="btn-close" onclick="document.location.href='../ui/header.php?page=formulir'"
        data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }else if($_GET['info'] == "gagal"){
?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Informasi</strong>
    <p>gagal ditambahkan ...</p>
    <button type="button" class="btn-close" onclick="document.location.href='../ui/header.php?page=formulir'"
        data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
    }
}
?>