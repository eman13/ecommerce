<?php 
    require_once "koneksi.php";
    require_once "header.php";  

    $sel = "SELECT * FROM barang";
    $query = mysqli_query($koneksi, $sel);
    
?>
<title>Semua Produk</title>

<div class="main">

        <?php 
        
        while($row = mysqli_fetch_assoc($query)):?>
<!--            <div class="wrap">-->
            <div class="box">
                <a href="single.php?id=<?= $row['id'];?>" alt="Ini Foto">
                    <img src="<?= "images2/". $row['foto'];?>" width="130" height="170">
                </a>
                <div class="deskripsi" style="margin-top: 12px;"><center><?= $row['nama_barang'];?> </center></div><br>
                    <h2>Rp.<?= number_format($row['harga'],0,',','.');?></h2>
                    <div class="beli"><a href="aksi_cart.php?id=<?= $row['id'];?>">Add To cart</a></div>
<!--                    <?php if($login == true):?> -->
<!--
                    <div class="beli"><a href="hapus.php?id= <?= $row['id'];?>" onclick="return confirm('Anda yakin menghapus data ini?');">Hapus</a></div>
                    <div class="beli"><a href="edit.php?id= <?= $row['id']; ?>">Edit</a></div>
                    <?php endif; ?>
-->
                </div>
<!--                </div>-->
                <?php endwhile;?>
                    <br>
                    <div class="muat"><a href="">Tidak ada barang lagi!</a></div>
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
<!--
                <td><a href="min.php?id= <?= $t['id'];?>">[-]</a></td>
                <td><a href="del.php?id= <?= $t['id'];?>">[x]</a></td>
-->
            </tr>
            <?php endwhile;?>
        </table> 
        <p style="float:right; margin-right: 10%; margin-top: 5px;"><a href="keranjang.php"><div class="muat2">Detail</div></a></p>
        <p class="total"><b>Total Belanja Anda : Rp.<?= number_format($total,0, ',', '.');?></b></p>
    </div>

<!--    <?php require_once "kategori.php";?>-->
<?php require_once "footer.php";?>

<style media="screen">
    *{
        font-size: 12px;
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
    .muat a{
        display: block;
        text-decoration: none;
        color: white;
        cursor: no-drop;
    }
    .muat{
        width: 150px;
        height:30px;
        line-height: 30px;
        text-align: center;
        margin: 20px 40%;
        border-radius: 5px;
        float: left;
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
    h1{
        font-size: 18px;
    }
    
    .container{
        width: 500px;
        margin: 0 auto;
    }
    div.box img{
        width:100%;    
    }
   
    
    .box:last-child{
        margin-bottom: 10%;
    }
    .box{
        margin:30px 25px 0 0;
        width: 180px;
        border: 1px solid #f2f2f2;
        float: left;
        display: inline-block;
        text-transform: capitalize;
        background: #fafafa;
        animation: flip 2s;
    }
    @keyframes flip{
        from {transform: rotateY(0ddeg); opacity: 0}
        to {transform: rotateY(360deg);}
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
    h2{
        
        text-align: center;
    }
    body{
        background: white;
    }
    .box:hover{
        border:1px solid #777;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.12);
    }
    .deskripsi{
       font-size: 28px;
    }
    .main{
        width: 65%;
        height: auto;
        margin-left: 5%;
        margin-top: 5%;
        float: left;
    }
    nav h1{
        color: white;
        margin-top: -15px;
        margin-bottom: 20px;
        
    }
   
</style>