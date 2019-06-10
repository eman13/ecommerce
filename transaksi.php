<title>
    Hasil Transaksi
</title>
<link href="6.ico" rel="icon">

<?php require_once "koneksi.php";
        require_once "header.php";
    $sid = session_id();
    error_reporting(0);

    $query = "SELECT * FROM barang , pembelian WHERE id_session='$sid' AND barang.id=pembelian.id";
    $sql = mysqli_query($koneksi, $query);
    
    
?>

<!---------------------  disini tempat hassil pemesanann    --------------------------->
    
<div class="result">
    <table>
       <tr>
            <th>Foto</th> 
            <th>Penyewa</th> 
            <th>Alamat</th> 
            <th>Barang</th> 
            <th>No Telepon</th> 
            <th>Tanggal Pesan</th> 
            <th>Harga</th>
            <th>Banyak</th>
            <th>Harga * Banyak</th>
            <th>Hari</th> 
            <th>Total</th> 
       </tr>
        <?php 
        $total = 0;
        $rek = "";
        while($row= mysqli_fetch_assoc($sql)):?>
        <tr>
            <td><img src="<?= "images2/".$row['foto'];?>" width="50" height="50"></td>
            <td><?= $row['pembeli'];?></td>
            <td><?= $row['alamat'];?></td>
            <td><?= $row['nama_barang'];?></td>
            <td><?= $row['telepon'];?></td>
            <?php $rek = $row['rek'];?>
            <td><?= $row['tanggal'];?></td>
            <td>Rp. <?= number_format($row['harga'], 0,',','.');?></td>
            <?php $harga = $row['banyak'] * $row['harga'];?>
            <td><?= $row['banyak'];?></td>
            <td>Rp. <?= number_format($harga, 0, ',', '.');?></td>
            <td><?= $row['hari'];?></td>
            
            
            <?php $subtotal = $row['banyak'] * $row['harga'] * $row['hari'];?>
            <td>Rp. <?= number_format($subtotal,0,',','.');?></td>
            <?php $total = $total + $subtotal ;?>
        </tr>
        <?php endwhile; ?>
        
    </table>
    <p class="total">Silahkan Lakukan Pembayaran melalui rekening <b><?= $rek; ?> </b>atas nama <b>toko cart</b>, sebesar : <b>Rp. <?= number_format($total,0, ',', '.');?></b> <br>dan jika sudah melakukan pembayaran segera hubungi kami melalui telepon 08287871827 kami siap melayani anda!</p><br>
</div>
<?php require_once "footer.php";?>

    <style media="screen">
        *{
            font-family: verdana;
            font-size: 14px;
/*            background: #fefcf4;*/
        }
        .total{
        margin-top: 12px;
        margin-left: 12px;
        font-size: 14px;
    }
        .end{
            margin-left: 150px;
            width: 65%;
            font-size: 13px;
            color: #565050;
            margin-top: 20px;
        }
        .margin{
            margin-left: 300px;
            width: 300px;
            margin-top: -40px;
            font-size: 13px;
            color: #565050;
            margin-bottom: 5px;
        }
        .contoh{
            font-size: 23px;
            color: #ca4f6c;
            padding-top: 40px;
            margin: 0 500px;
        }
        .nama{
            font-size: 13px;
            width: 700px;
            color: #565050;
            padding-top: 12px;
            line-height: 40px;
            margin-left: 150px;
            border-bottom: 0.1px solid #ca4f6c;
        }
        h1{
            color: red;
        }
        h2{
            color: red;
            text-transform: capitalize;
            margin-top: 7%;
        }
        .result{
            width: 90%;
            height: auto;
            float: left;
            background: #f1ebeb;
            margin-top: 40px;
            margin-left: 5%;
            padding-bottom: 10px;
            margin-bottom: 200px;
            border-radius: 12px;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }
    
        th{
            color: white;
            background: #4CAF50;
        }
        tr:hover{
            background: #ddd;
        }
        td{
            text-transform: capitalize;
            border: 1px solid #ddd;
            height: 50px;
        }
        th, td{
            box-sizing: border-box;
            padding: 10px;
            
        }
    </style>