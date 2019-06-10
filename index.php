<title>Toko Online</title>
<?php 
    require_once "koneksi.php";
    require_once "header.php";

$login = false;
    if(isset($_SESSION['nama'])){
        $login = true;
    }
    
        
    
            $query = "SELECT * FROM barang order by id desc limit 4";
       $sql = mysqli_query($koneksi, $query);
    
     
    


    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        
        $query = "SELECT * FROM barang WHERE nama_barang LIKE '%$cari%'";
         $sql = mysqli_query($koneksi, $query);
        }
    
   
    
        ?>
<head>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="bxslider/jquery.bxslider.min.css">
<script type="text/javascript" src="bxslider/jquery.bxslider.min.js"></script>
</head> 
<nav>
    <center>
        <h1>Temukan Produk Sewaan Anda Disini!</h1>
    <form action="" method="get">
    <input type="search" name="cari" placeholder="Mau Belanja Apa??">
    </form>
        </center>
</nav>

<ul class="container">
    <div><img src="images2/1.jpg"></div>
    <div><img src="images2/2.jpg"></div>
    <div><img src="images2/3.jpg"></div>
    <div><img src="images2/4.jpg"></div>
    <div><img src="images2/1.jpg"></div>
</ul>

<script>
    $(document).ready(function(){

            var index = 0,
                items = $('.container div');
                total = items.length;

            function slide(){
                var item = $('.container div').eq(index);
                    items.hide();
                    item.show();
            }

            var autoslide = setInterval(function(){
                    index += 1;
                    if( index > total - 1) index = 0;
                    slide();
            }, 2000);

                $('#next').click(function(){
                    index += 1;
                    if(index > total - 1) index = 0;
                    slide();
                });

                $('#prev').click(function(){
                    index -= 1;
                    if( index < 0 ) index = total - 1;
                    slide();
                });
          }); 
</script>
    <div class="main">

        <?php 
        
        while($row = mysqli_fetch_assoc($sql)):?>
<!--            <div class="wrap">-->
            <div class="box">
                <a href="single.php?id=<?= $row['id'];?>" alt="Ini Foto">
                    <img src="<?= "images2/". $row['foto'];?>" width="130" height="170">
                </a>
                <div class="deskripsi" style="margin-top: 12px;"><center><?= $row['nama_barang'];?> </center></div><br>
                    <h2>Rp.<?= number_format($row['harga'],0,',','.');?></h2>
                    <div class="beli"><a href="aksi_cart.php?id=<?= $row['id'];?>">Add To cart</a></div>

                </div>
<!--                </div>-->
                <?php endwhile;?>
                    <br>
                    <div class="muat"><a href="banyak.php">Lihat Semua Produk</a></div>
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
        <p style="float:right; margin-right: 10%; margin-top: 5px;"><div class="muat2"><a href="keranjang.php">Detail</a></div></p><br>
        <p class="total"><b>Total Belanja Anda : Rp.<?= number_format($total,0, ',', '.');?></b></p>
    </div>

<!--    <?php require_once "kategori.php";?>-->
<?php require_once "footer.php";?>

<style media="screen">
    *{
        font-size: 12px;
        max-width: 100% !important;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        
    }
    .container div{
        display: none;
    }
    .container img{
        width: 70%;
        height: 500px;
        margin-top: 20px;
        margin-left: 200px;
    }
    .muat{
        width: 150px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 5px;
        margin: 20px 40%;
        float: left;
        clear: both;
        background: #4caf50;
        border:1px solid #4caf50;
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
    .muat:hover {
        background: white;
        border: 2px solid #4caf50;
        
    }
    .muat:hover a{
        color: black;
    }
    .muat a, .muat2 a{
        display: block;
        text-decoration: none;
        color: white;
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
        from {transform: rotatey(0deg); opacity: 0}
        to {transform: rotatey(360deg);}
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
        background: #fff;
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
   form{
        height: 80px;
    }
    input[type=search]{
        width: 250px;
        height: 30px;
        background: #f2f2f2;
        border: none;
        border-radius: 4px;
        box-sizing: border-box;
        padding-left: 7px;
        clear: both;
    }
</style>
           