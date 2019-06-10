<title>Tambah Data</title>
<link href="6.ico" rel="icon">
<?php 
    require_once "koneksi.php";
    
    $error ="";

    if(isset($_POST['submit'])){
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $jml_barang = $_POST['jumlah_barang'];
        $deskripsi = $_POST['deskripsi'];
        $kategori = $_POST['kategori'];
        
        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];
        $path = "images/".$foto;
        
        if(move_uploaded_file($tmp, $path)){
            $query = "INSERT INTO barang (nama_barang, harga, jumlah_barang, deskripsi, kategori, foto)
                      VALUES ('$nama_barang', '$harga', '$jml_barang', '$deskripsi', '$kategori', '$foto')";
            if(mysqli_query($koneksi, $query)){
                header('Location: dashboard.php');
            }else{
                $error = "tambah data gagal!!";
            }
        }
    }
?>
<!--<link rel="stylesheet" href="">-->
<title>Tambah Barang</title>
<form action="" method="post" enctype="multipart/form-data">
    <div class="judul">
        <h3 style="color: #ca4f6c; font-size: 23px;">Tambah Barang</h3>
    </div><br><br><br>
    <label>Nama Barang</label><br>
    <input type="text" name="nama_barang" required><br><br><br><br>
    
    <label>Harga</label><br>
    <input type="text" name="harga" placeholder="data tidak boleh titik" required><br><br><br><br>
    
    <label>Jumlah Barang</label><br>
    <input type="number" name="jumlah_barang" required><br><br><br><br>
    
    <label>Deskripsi</label><br>
    <textarea name="deskripsi" required></textarea><br><br><br><br>
    
    <label>Kategori</label><br>
    <select name="kategori" required>
        <option value="undangan" selected="selected">Undangan</option>
        <option value="tenda">Tenda</option>
    </select><br><br><br><br>
    
    <label >Foto</label><br>
    <input type="file" name="foto" required><br><br><br><br>
    
    <div class="error"><?= $error;?></div><br>
    <input type="submit" name="submit" value="Tambah Barang">
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
        font-size: 12px;
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