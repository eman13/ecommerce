<?php require_once "koneksi.php";
        require_once "header.php";
    
?>
<head>
<title>Keranjang Belanja</title>
<link href="images/6.ico" rel="icon">
    </head>
<div class="cart">
    <div id="cart">
        <p>Keranjang Pemesanan Anda</p>
    </div>
        <table border="1">
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Tanggal Pesan</th>
                <th>Subtotal</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php
            $sid = session_id();
            
            $iner = "SELECT * FROM keranjang2, barang WHERE id_session='$sid' AND barang.id=keranjang2.id AND id_session='$sid'";
            $tmp = mysqli_query($koneksi, $iner);
            $total = 0;
            
            while($t= mysqli_fetch_assoc($tmp)):
            
            $subtotal = $t['jumlah'] * $t['harga'];
            ?>
            <tr>
                <td><?= $t['nama_barang'];?></td>
                <td><?= $t['jumlah'];?></td>
                <td><?= number_format($t['harga'],0, ',', '.'); ?></td>
                <td><?= date("d-m-Y");?></td>
                <td><?= number_format($subtotal,0,',','.');?></td>
            <?php  $total += $subtotal; ?>
                <td><a href="add.php?id= <?= $t['id'];?>"><p class="aksi" style="background: #41c9d2;">Tambah</p></a></td>
                <td><a href="min.php?id= <?= $t['id'];?>"><p class="aksi" style="background: #ecef09;">Kurang</p></a></td>
                <td><a href="del.php?id= <?= $t['id'];?>" onclick="return confirm('Anda Yakin Akan menghapus ini?');"><p class="aksi" style="background: #e33f3f;">Hapus</p></a></td>
            </tr>
            <?php endwhile;?>
        </table> 
        
        <p class="total"><b>Total Belanja Anda : Rp. <?= number_format($total,0, ',', '.');?></b></p><br>
        <?php  $sel = "SELECT * FROM keranjang2 WHERE id_session='$sid'";
                $cb = mysqli_query($koneksi, $sel);  
        $count = mysqli_num_rows($cb);
        
    if(!empty($count)){
    
    ?>
        <p><a href="cart.php"><div class="muat">Lanjut Ke Pembayaran</div></a></p>
        
    <?php }else{
        echo "";
    } ?>
    </div>

    <?php  require_once "footer.php";?>
<style media="screen">
    .total{
        margin-top: 12px;
        font-size: 14px;
    }
    .muat a{
        display: block;
        text-decoration: none;
        color: white;
    }
    .muat{
        width: 150px;
        height:30px;
        line-height: 30px;
        text-align: center;
        border-radius: 5px;
        margin-top: -30px;  
        margin-right: 110px;
        float: right;
        background: #4caf50;
        border:1px solid #4caf50;
    }
    td a{
        text-decoration: none;
        color: white;
    }
    .aksi{
        width: 60px;
        height: 20px;
        line-height: 20px;
        text-align: center;
    }
    #cart p{
        margin: 0 auto;
        text-align: center;
        font-size: 28px;
        color: #ca4f6c;
        
    }
    .cart{
        border-radius: 2px;
    }
    .cart{
        width: 80%;
        margin: 0 auto;
        margin-top: 50px;
        border: 1px solid #ddd;
        padding: 20px;
        height: auto;
        margin-bottom: 100px; 
    }
    table{
        margin-top: 12px;
        border-collapse: collapse;
        width: 90%;
    }
    td, th{
        border: 1px solid #ddd;
        height: 30px;
        padding: 5px;
        padding-left: 15px;
    }
</style>