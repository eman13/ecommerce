<?php 
    require_once "koneksi.php";
    $sid = session_id();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
         
        $sel = "SELECT * FROM keranjang2 WHERE id='$id' ";
        $m = mysqli_query($koneksi, $sel);
        $row= mysqli_fetch_assoc($m);
        
        
        if($row['jumlah'] >= 2){
        $sql = "UPDATE keranjang2 SET jumlah = jumlah - 1 WHERE id='$id'";
        mysqli_query($koneksi, $sql);
        }else{
            $del = "DELETE FROM keranjang2 WHERE id='$id'";
            mysqli_query($koneksi, $del);
        }
    }
    header('Location: keranjang.php');
?>