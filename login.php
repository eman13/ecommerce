<title>Login admin</title>
<link href="6.ico" rel="icon">
<?php 
    require_once "koneksi.php";

    if(isset($_SESSION['nama'])){
        header('Location: index.php');
    }else{
        

    $error = "";
    if(isset($_POST['submit'])){
        $nama = mysqli_real_escape_string($koneksi, $_POST['username']);
        $_SESSION['nama'] = $nama;
        
        $pass =  mysqli_real_escape_string($koneksi, $_POST['password']);
        
        if(!empty(trim($nama)) && !empty(trim($pass))){
            
            $query = "SELECT * FROM login WHERE username='$nama' AND password='$pass'";
           
            if($result = mysqli_query($koneksi, $query)){
                if(mysqli_num_rows($result) !=0)
                header('Location: dashboard.php');
             else
                 unset($_SESSION['nama']);
                $error = "kombinasi nama dan password salah";
            
        }else{
            
        }
    }

}
?>

<form action="" method="post">
    <div class="judul">
        <h1>Login Admin</h1>
    </div><br><br><br>
    <label for="nama">Username</label><br>
    <input type="text" name="username" required><br><br><br><br>
    
    <label for="password">Password</label><br>
    <input type="password" name="password" required><br><br><br><br><br>
    <div class="error"><?= $error;?></div><br>
    <input type="submit" name="submit" value="Login">
</form>
<style media="screen">
    body{
        font-size: 12px;
        font-family: verdana;
    }
    .error{
        color: red;
    }
    .judul{
        width: 100%;
        height: 40px;
        background: none;
        line-height: 40px;
        text-align: center;
        border-radius: 4px;
        color: #ca4f6c;
        margin-top: 30%;
    }
    form{
        width: 23%;
        height: 320px;
        background: none;
        padding: 20px;
        margin: auto;
        border-radius: 4px;
    }
    label{
        
    }
    input[type=text], input[type=password]{
        float: left;
        display: inline-block;
        width: 100%;
        height: 40px;
        background: white;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding :10px;
        box-sizing: border-box;
    }
    input[type=submit]:hover{
        background: #45a049;
        cursor: pointer;
    }
    input[type=submit]{
        font-size: 18px;
        color: white;
        float: left;
        display: inline-block;
        width: 100%;
        text-align: center;
        height: 40px;
        background: white;
        border: none;
        border-radius: 4px;
        padding :10px;
        background: #4CAF50;
        box-sizing: border-box;
    }
</style>
<?php } ?>