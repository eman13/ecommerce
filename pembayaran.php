<?php

require_once "koneksi.php";
    
    $id = session_id();
    $query = "SELECT * FROM pembelian WHERE session_id='$id'";
    $sql = mysqli_query($koneksi, $query);
    
    $row = mysqli_fetch_assoc($sql);
    $telepon = $row['telepon'];

    if(isset($_POST['submit'])){
        $rek = $_POST['rekening'];
        
        $query = "INSERT INTO bank (nama, telepon) VALUES('$rek', '$telepon')";
        if(mysqli_query($koneksi, $query)){
            header('Location: finish.php');
        }else{
            echo "error";
        }
    }
    
?>

<form action="" method="post">
    <?=  $id;?>
    <h1>Selesaikan Transaksi Anda</h1>
    <p>Langkah terakhir untuk menyelesaikan Transaksi anda <br>Pilih Bank transfer :  </p><br><br>
    <select name="rekening">
    <option value="0928-2334-2093-2390 (BCA)" selected="selected">BCA</option>
    <option value="2334-1234-4343-3452 (BNI)" >BNI</option>
    <option value="2343-2349-0902-3294 (BRI)" >BRI</option>
    </select><br><br><br><br><br>
    
    <input type="submit" name="submit" value="Selesai">
</form>

<style media="screen">
    *{
        font-family: verdana;
    }
    form{
        width: 40%;
        height: 400px;
        background: none;
        margin: 0 auto;
        padding: 20px;
    }
    h1{
        color: #ca4f6c;
    }
    input[type=submit]:hover{
        background: #45a049;
    }
    input[type=submit]{
        color: white;
        cursor: pointer;
        display: inline-block;
        float: left;
        border: none;
        background: #4CAF50;
        width: 100%;
        height: 40px;
        border-radius: 4px;
    }
    select{
        margin: 0 auto;
        width: 200px;
        height: 40px;
        padding: 10px;
        float: left;
        border-radius: 4px;
        display: inline-block;
    }
</style>