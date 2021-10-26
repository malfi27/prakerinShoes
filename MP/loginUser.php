<?php
    $passlog = "empty";
    if(isset($_GET['username'])) $username=$_GET["username"];
    if(isset($_GET['password'])) $password=$_GET["password"];
    $conn=mysqli_connect("localhost","id17543566_ssip2021","Ssip2021111-","id17543566_ssip");
    $login = mysqli_query($conn, "select * from mm2021 where uname='$username' and pswd='$password'");
    $cek = mysqli_num_rows($login);
    if($cek > 0){
        echo "success";
    }
    else {
        $passlog = 'Gagal';
        echo $passlog;
    }

?>