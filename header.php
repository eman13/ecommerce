<?php 
    require_once "koneksi.php";
    
        $login = false;
    if(isset($_SESSION['nama'])){
        $login = true;
    }
?>

<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8">
    <head>
        
    
        <link href="6.ico" rel="icon">
        
    
    </head>
    <body>
        <header>
           
    <ul>
    <li><a href="index.php"><img src="6.ico" width="40" height="40" style="margin-top: 10px;"></a></li>    
    <li><a style="font-size:15px;"href="keranjang.php">Keranjang </a></li>    
    <li><a style="font-size:15px;"href="transaksi.php">Transaksi</a></li>   
        <?php if($login == true):?>
<!--    <li><a style="font-size:15px;"href="tambah.php">Tambah Data</a></li>  -->
        <?php endif;?>
        <?php if($login == true):?>
    <li><a style="font-size:15px;"href="dashboard.php">Dashboard</a></li>  
        <?php endif;?>
        <?php if($login == true):?>
    <li><a style="font-size:15px;"href="logout.php" onclick="return confirm('Anda Yakin akan Logout?')";>Logout</a></li>  
        <?php else:?>
<!--    <li><a style="font-size:15px;"href="login.php">Login Admin</a></li>-->
        <?php endif;?>
    </ul>
    </header>
        <nav>
        
        </nav>
        
    </body>
    <style media="screen">
        *{
            margin: 0; padding: 0;
            font-family: verdana;
            font-size: 12px;
            max-width: 100% !important;
        }
        header{
            width: 100%;
            height: 60px;
            background: #45a049;
        }
        ul{
            margin: 0 5%;
            
        }
        li{
            list-style: none;
            float: left;
            width: 12%;
            line-height: 60px;
            text-align:center;
            font-size: 12px;
        }
        li:hover{
            background: #4CAf50;
            transition: 0.6s ease;
        }
        li:first-child:hover{
            background: none;
            }
        
        li > a{
            text-decoration: none;
            color: white;
            display: block;
        }
        nav{
            width: 100%;
            height: 100px;
            background: #4CAf50;
        }
    </style>
</html>