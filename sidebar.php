<?php 
    
    require_once "koneksi.php";
    $id= session_id();
?>
<div class="cart">
 <div class="sidebar">
    
    <h1>Keranjang Belanja</h1><br>
    </div>
    <table>
    
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jml</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
       
        <tr>
            <td>1</td>
            <td>laptop</td>
            <td>2</td>
            <td>1200000</td>
            <td>2100000</td>
        </tr>
    </table>
        </div>


<style media="screen">
    table, th, td{
        border: 1px solid #3CBC8D;
        text-align: left;
    }
    table{
        border-collapse: collapse;
        width: 100%;
        color: black;
    }
    th, td{
        padding: 8px;
    }
     .cart{
        margin: 6% 5% 6% 0;
        width: 25%;
        float: right;
        height: 300px;
        background: #ddd;
        color: white;
    }
    .sidebar h1{
        text-align: center;
        line-height: 40px;
    }
    .sidebar{
        height: 40px;
        background: #3CBC8D;
    }
</style>