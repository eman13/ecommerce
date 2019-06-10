<?php 
    require_once "koneksi.php";
    $sid = session_id();

    $sel = "SELECT id FROM keranjang2 WHERE id='$_GET[id]' AND id_session='$sid'";
    $query = mysqli_query($koneksi, $sel);
    $hit = mysqli_num_rows($query);
    
    if($hit==0){
        $ins = "INSERT INTO keranjang2 (id, jumlah, id_session) VALUES('$_GET[id]', 1, '$sid')";
        mysqli_query($koneksi, $ins);
    }else{
        $upd = "UPDATE keranjang2 SET jumlah = jumlah + 1 WHERE id='$_GET[id]' AND id_session='$sid'";
        mysqli_query($koneksi, $upd);
    }
    header('Location: keranjang.php');
    ?>