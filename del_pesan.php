<?php 
    require_once "koneksi.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(mysqli_query($koneksi, "DELETE FROM pembelian WHERE id='$id'")){ ?>
            <script>alert('Data berhasil dihapus');document.location="dashboard.php";</script>
    <?php 
        }
    }
    
?>