<?php 
    require_once "koneksi.php";
?>
    

    <?php 
    $error = "";
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "SELECT * FROM barang WHERE id = '$id'";
            $result = mysqli_query($koneksi, $query);
            $row= mysqli_fetch_assoc($result);
            
            $nama_barang = $row['nama_barang'];
            $harga = $row['harga'];
            $jumlah_barang = $row['jumlah_barang'];
            $deskripsi = $row['deskripsi'];
            $kategori = $row['kategori'];
            
        }
        
            if(isset($_POST['submit'])){
              $nama_barang2 = $_POST['nama_barang'];
            $harga2 = $_POST['harga'];
            $jumlah_barang2 = $_POST['jumlah_barang'];
            $deskripsi2 = $_POST['deskripsi'];
            $kategori2 = $_POST['kategori'];
                
                    if(isset($_POST['ubah_foto'])){
                        $foto = $_FILES['foto'] ['name'];
                        $tmp  = $_FILES['foto'] ['tmp_name'];
                        $path = "images/". $foto;
                        
                        if(move_uploaded_file($tmp, $path)){
                            unlink("images/". $row['foto']);
                            
                            $query = "UPDATE barang SET nama_barang='$nama_barang2', harga='$harga2', jumlah_barang='$jumlah_barang2',
                                      deskripsi='$deskripsi2', kategori='$kategori2', foto='$foto' WHERE id='$id'";
                            
                            if(mysqli_query($koneksi, $query)){
                                header('Location: index.php');
                            }else{
                                $error = "error".mysql_errno();
                            }
                               }
                    }else{
                                $query = "UPDATE barang SET nama_barang='$nama_barang2', harga='$harga2', jumlah_barang='$jumlah_barang2',
                                      deskripsi='$deskripsi2', kategori='$kategori2' WHERE id='$id'";
                        
                                $result = mysqli_query($koneksi, $query);
                                    if($result){?>
                                     <script>alert("barang berhasil di Edit");document.location="dashboard.php";</script> 
    <?php 
                                }else{
                                    $error = "error bos";
                                }
                            }
            }
        
            

    ?>


<title>Edit Barang</title>
<form action="" method="post" enctype="multipart/form-data">
    <div class="judul">
        <h3>Tambah Barang</h3>
    </div><br><br><br>
    <label>Nama Barang</label><br>
    <input type="text" name="nama_barang" value="<?= $nama_barang; ?>" required><br><br><br><br>
    
    <label>Harga</label><br>
    <input type="text" name="harga" value="<?= $harga; ?>" required><br><br><br><br>
    
    <label>Jumlah Barang</label><br>
    <input type="number" name="jumlah_barang" value="<?= $jumlah_barang; ?>" required><br><br><br><br>
    
    <label>Deskripsi</label><br>
    <textarea name="deskripsi" required><?= $deskripsi; ?></textarea><br><br><br><br>
    
    <label>Kategori</label><br>
    <select name="kategori" required>
        <?php if($kategori == "Komputer")?>
        <option value="undangan" selected="selected">Undangan</option>
        <option value="tenda">Tenda</option>?>
    </select><br><br><br><br>
    
    <input type="checkbox" name="ubah_foto" value="true">Ceklis jika ingin mengubah foto<br>
    <label >Foto</label><br>
    <input type="file" name="foto" ><br><br><br><br>
    
    <div class="error"><?= $error;?></div><br>
    <input type="submit" name="submit" value="Edit Barang">
</form>
<style media="screen">
    body{
        font-size: 12px;
        font-family: verdana;
    }
    .error{
        color: red;
    }
    .judul{
        width: 100%;
        height: 40px;
        background: #ca4f6c;
        line-height: 40px;
        text-align: center;
        border-radius: 4px;
        color: white;
    }
    form{
        width: 40%;
        height: 550px;
         margin: auto;
/*
        background: #f2f2f2;
        padding: 40px;
       
        border-radius: 4px;
*/
    }   
    input[type=text], input[type=password],input[type=number], input[type=file], select,textarea{
        font-size: 14px;
        float: left;
        display: inline-block;
        width: 100%;
        height: 40px;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding :10px;
        box-sizing: border-box;
    }
    input[type=submit]:hover{
        background: #45a049;
        cursor: pointer;
    }
    input[type=submit]{
        font-size: 18px;
        color: white;
        float: left;
        display: inline-block;
        width: 100%;
        text-align: center;
        height: 40px;
        background: white;
        border: none;
        border-radius: 4px;
        padding :10px;
        background: #4CAF50;
        box-sizing: border-box;
    }
</style>