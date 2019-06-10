<?php 
    require_once "koneksi.php";
    require_once "header.php";
    $sid = session_id();
    $sel = "SELECT * FROM barang, pembelian WHERE barang.id=pembelian.id";
    $tmp = mysqli_query($koneksi, $sel);
?>
<title>Dashboard Admin</title>
<div class="dash-1">
<!--
    <div id="profil">
        <img src="images/nike-1782-907904-1.jpg" width="150" height="150" class="profil">
        <p style="margin-left:20px; font-size: 18px;">Nama Admin</p>
    </div><br>
-->
    <h1 style="color: #ca4f6c; font-size: 23px; margin-left: 35%; margin-top: 60px;">Dashboard Admin</h1><br><br>
    <h1 style="font-size: 22px; color:#ca4f6c;">Data Pemesanan  </h1><br>
    <table border="1">
            <tr>
            <th>Foto</th> 
            <th>Nama Penyewa</th> 
            <th>Alamat</th> 
            <th>Barang</th> 
            <th>No Telepon</th> 
            <th>Jumlah Hari</th> 
            <th>Rekening Bank</th> 
            <th>Banyak Barang</th> 
            <th>Harga</th> 
            <th>Subtotal</th> 
                <th></th>
       </tr>
        <?php 
        $total = 0;
        while($row= mysqli_fetch_assoc($tmp)):?>
        <tr>
            <td><img src="<?= "images/".$row['foto'];?>" width="50" height="50"></td>
            <td><?= $row['pembeli'];?></td>
            <td><?= $row['alamat'];?></td>
            <td><?= $row['nama_barang'];?></td>
            <td><?= $row['telepon'];?></td>
            <td><?= $row['hari'];?></td>
            <td><?= $row['rek'];?></td>
            <td><?= $row['banyak'];?> barang</td>
            <td>Rp. <?= number_format($row['harga'], 0, ',', '.');?></td>
            <?php $subtotal = $row['banyak'] * $row['harga'];?>
            <td>Rp. <?= number_format($subtotal,0,',','.');?></td>
            <?php $total = $total + $subtotal;?>
            <td><a href="del_pesan.php?id= <?= $row['id'];?>" onclick="return confirm('Anda Yakin Akan menghapus data ini?');"><p class="aksi" style="background: #e33f3f;">Hapus</p></a></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <div id="produk"><br><br>
        
<!--        <h1 style="color: #ca4f6c; font-size: 23px; margin-left: 38%;">Daftar Produk</h1><br>-->
        <?php $query = "SELECT * FROM barang order by id desc";
    $sql = mysqli_query($koneksi, $query);
?>  <h1 style="font-size: 22px; color:#ca4f6c;">Data Produk</h1><br>
        <p class="aksi-2"><a href="tambah.php">Tambah Data</a></p><br>
        
        <table border="1">
            <tr>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Deskripsi</th>
                <th></th>
                <th></th>
            </tr>
            <?php while($row= mysqli_fetch_assoc($sql)):?>
            <tr>
                <td><img src="<?= "images/".$row['foto'];?> "width='100' height='70'></td>
                <td><?= $row['nama_barang'];?></td>
                <td><?= $row['harga'];?></td>
                <td><?= $row['jumlah_barang'];?></td>
                <td><?= $row['deskripsi'];?></td>
                <td><a href="edit.php?id= <?= $row['id'];?>"><p class="aksi" style="background: #41c9d2;">Edit</p></a></td>
<!--                <td><a href="min.php?id= <?= $t['id'];?>"><p class="aksi" style="background: #ecef09;">Kurang</p></a></td>-->
                <td><a href="hapus.php?id= <?= $row['id'];?>" onclick="return confirm('Anda Yakin Akan menghapus data ini?');"><p class="aksi" style="background: #e33f3f;">Hapus</p></a></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
</div>

<?php require_once "footer.php";?>
<style media="screen">
    *{
        font-family: verdana; 
    }
    .dash-1{
        width: 90%;
        margin: 20px auto;
    }
    td a{
        text-decoration: none;
        color: white;
    }
    td a{
        text-decoration: none;
        color: white;
    }
    #produk a{
        text-decoration: none;
        color: white;
        display: block;
    }
    .aksi-2{
        width: 100px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        background: #41c9d2;
        border-radius: 4px;
    }
    .aksi{
        width: 60px;
        height: 20px;
        line-height: 20px;
        text-align: center;
    }
    th{
        background: #2c9ddd;
        color: white;
    }
    #profil{
        width: 200px;
        margin: 0 auto;
        margin-top: 30px;
    }
    #profil img{
        border-radius: 50%;
    }
    table{
        width: 100%;
        border-collapse: collapse;
        
    }
    th, td{
        height: 30px;
        padding-left:20px;
        
        border: 1px solid #ddd;
    }
</style>