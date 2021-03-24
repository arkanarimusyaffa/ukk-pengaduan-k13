<?php 
include "database.php";
$NIK = $_POST['NIK'];
$pass = $_POST['password'];

$sqlDataMasyarakat = "SELECT nik, `password`,  from `loginm` WHERE `nik` = $NIK ";
$queryDataMasyarakat = mysqli_query($conn, $sqlDataMasyarakat);
$row = mysqli_fetch_object($queryDataMasyarakat);

if($username == $row -> nik and $pass = $row -> password){
    if($row -> status == 'aktif'){
        @session_start();
        $_SESSION['nik'] = $NIK;
        $_SESSION['password'] = $pass;
        $_SESSION['level'] = 'loginm';
        header ("location:http://".$server."index2.php");
    }else{
        echo '<script>alert("akun anda belum aktif hubungi admin");window.location.href="loginM.php";</script>';
    }
} else{
    echo '<script>alert("cek kembali data anda atau registrasi");window.location.href="registerM.php";</script>';
}
