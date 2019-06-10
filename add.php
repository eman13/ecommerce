<?php 
    require_once "koneksi.php";
    $sid = session_id();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "UPDATE keranjang2 SET jumlah = jumlah + 1 WHERE id='$id' AND id_session='$sid'";
    if(mysqli_query($koneksi, $sql)){
        header('Location: keranjang.php');
    }else{
        echo "Error";
    }
    
}

?>