<?php require_once "koneksi.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $query = "DELETE FROM barang WHERE id = '$id'";
        if(mysqli_query($koneksi, $query)){ ?>
            <script>alert("barang berhasil di Hapus");document.location="hapus.php";</script>
<?php 
        }else{
            echo "error";
        }
    }

?>