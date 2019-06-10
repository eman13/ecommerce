<?php 
    require_once "koneksi.php";
    

    if(isset($_GET['id'])){
        $id= $_GET['id'];
        
        $sql = "DELETE FROM keranjang2 WHERE id='$id'";
        if(mysqli_query($koneksi, $sql)){
            header('Location: keranjang.php');
        }else{
            echo "error";
        }
    }
    

?>