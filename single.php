<?php 
    require_once "koneksi.php";
    require_once "header.php";
?>
<title>Detail Produk</title>
<?php 
        $id = $_GET['id'];
        if(isset($id));
            
            $query = "SELECT * FROM barang WHERE id='$id'";
            $result = mysqli_query($koneksi, $query);
            $row= mysqli_fetch_assoc($result);

?>
<center>
    <div class="produk">

    <h1 style="font-size: 16px">Detail Produk</h1>
    </div></center>
<div class="single">
<div class="detail">
    <div class="img-produk">
        <a href="<?= "images2/".$row['foto'];?>"><img src="<?= "images2/".$row['foto'];?>" width="220" height="220"></a>
    </div>
     
     <div class="desc">
            <br>
         <h1><?= $row['nama_barang'];?></h1><br><br>
         <p>Harga : Rp. <?= $row['harga'];?></p><br>
         <p>Stock :<?= $row['jumlah_barang'];?></p><br>
         <p>Keterangan :<?= $row['deskripsi'];?></p><br>
         <div class="beli"><a href="aksi_cart.php?id=<?= $row['id'];?>">Add To cart</a></div>
    </div>
    
</div>
</div>
    <div class="cart">
    <div id="cart">
        <p>Keranjang Belanja Anda</p>
    </div>
        <table border="1">
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
               
            </tr>
            <?php
            $sid = session_id();
            
            $iner = "SELECT * FROM keranjang2, barang WHERE id_session='$sid' AND barang.id=keranjang2.id";
            $tmp = mysqli_query($koneksi, $iner);
            $total = 0;
            while($t= mysqli_fetch_assoc($tmp)):
            
            $subtotal = $t['jumlah'] * $t['harga'];
            ?>
            <tr>
                <td><?= $t['nama_barang'];?></td>
                <td><?= $t['jumlah'];?></td>
                <td><?= number_format($t['harga'],0, ',', '.'); ?></td>
                <td><?= number_format($subtotal,0,',','.');?></td>
            <?php $total += $subtotal; ?>
            </tr>
            <?php endwhile;?>
        </table> 
        <p style="float:right; margin-right: 10%; margin-top: 5px;"><a href="keranjang.php"><div class="muat2">Detail</div></a></p>
        <p class="total">Total Belanja Anda : <?= number_format($total,0, ',', '.');?></p>
    </div>

<style media="screen">
    *{
        font-family: verdana;
    }
    .muat2 a{
        display: block;
        text-decoration: none;
        color: white;
    }
    .muat2{
        width: 50px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        margin-right: 20px;
        border-radius: 5px;
        float: right;
        clear: both;
        background: #4caf50;
        border:1px solid #4caf50;
    }
    .total{
        margin-top: 12px;
        font-size: 14px;
    }
    #cart p{
        margin: 0 auto;
        text-align: center;
        font-size: 18px;
        color: #ca4f6c;
        
    }
    .img-produk{
        width: 30%;
/*        background: red;*/
        float: left;
        display: inline-block;
        margin-left: 6.2%;
    }
    .cart{
        border-radius: 2px;
    }
    .cart{
        width: 20%;
        float: right;
        margin-top: 100px;
        margin-right: 5%;
        border: 1px solid #ddd;
        padding: 20px;
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
    }
    .produk{
        width: 100%;
        height: 40px;
        background: #ca4f6c;
        margin-top: 5%;
        line-height: 40px;
        text-align: center;
        color: white;
    }
    .detail{
        margin: 9% 0;
    }
    .desc{
        float:right;
/*        background: blue;*/
        width: 60%;
        height: auto;
    }
    .desc p{
        font-size: 18px;
    }
    .desc h1{
        font-size: 21px;
    }
    .single{
        width: 70%;;
        height: auto;
        float: left;
        margin-bottom: 10%;
/*        background: yellow;*/
    }
    .beli{
        width: 100px;
        height: 30px;
        background: #ca4f6c;
        color: white;
        line-height: 30px;
        text-align: center;
        border-radius: 4px;
        margin: 10px auto;
    }
    .beli:hover{
        background: #d93668;
    }
    .beli a{
        display: block;
        color: white;
        text-decoration: none;
    }

</style>
<?php require_once "footer.php";?>