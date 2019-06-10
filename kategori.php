<?php 
    require_once "koneksi.php";

if(isset($_GET['kategori'])){
        $kategori = $_GET['kategori'];
        $query = "SELECT * FROM barang WHERE kategori ='$kategori'";
        $sql = mysqli_query($koneksi, $query);
    }
    
    function kategori(){
        $query = "SELECT * FROM barang WHERE kategori='$kategori'";
        $result = mysqli_query($koneksi, $query);
        return $result;
    }
?>

<div class="kategori">
    <div class="judul">
        Cari Berdasarkan Kategori
    </div>
    <form action="" method="get">
    <label>Pilih Kategori : </label><br><br>
    <select name="kategori">
        <option value="undangan" selected="selected">Undangan</option>
        <option value="tenda">Tenda</option>
    </select>
    <br><br><br><br><br>
    <input type="submit" name="cari" value="cari">
           </form>
</div>

<style media="screen">
    label{
        font-size: 15px;
    }
    .kategori{
        margin-right: 5%;
        margin-top: 2%;
        width: 20%;
        height: auto;
        border: 1px solid #ddd;
        float: right;
        padding: 20px;
/*        background: red;*/
        display: inline-block;
    }
    .judul{
        font-size: 20px;
        margin-bottom: 5%;
        width: 100%;
        height: 30px;
        line-height: 30px;
        color: #ca4f6c;
        text-align: center;
    }
    input[type=submit]:hover{
        background: #45a049;
    }
    input[type=submit]{
        cursor: pointer;
        display: inline-block;
        float: left;
        border-radius: 4px;
        width: 100px;
        padding: 10px;
        border: none;
        background: #4caf50;
        color: white;
        font-size: 16px;
    }
    select{
        font-size: 14px;
        float: left;
        display: inline-block;
        padding: 10px;
        width: 200px;
        height: 45px;
        margin: 0 auto;
        border-radius: 4px;
    }
    
</style>