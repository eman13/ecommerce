
<?php 
    
    session_start();

    unset($_SESSION['nama']);
    session_destroy();    

?>
<script>alert('Anda Sudah Logout!');document.location="index.php"; </script>


