<?php
    if(isset($_GET['a'])) $a=$_GET["a"];
    if(isset($_GET['b'])) $b=$_GET["b"];
    if(isset($_GET['c'])) $c=$_GET["c"];
     $conn=mysqli_connect("localhost","id17543566_ssip2021","Ssip2021111-","id17543566_ssip");
     $reg = mysqli_query($conn, "INSERT INTO mm2021 (uname, email, pswd) VALUES ('$a' , '$b' , '$c')");
    echo "success";
?>