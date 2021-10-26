<?php

require 'function.php';


session_start();
    
    if (isset($_GET)) {

      //  $query = removeqty($_SESSION['user'][0]['id'],$_POST['cartid']);
      $query = removeproduct($_GET["id"]);
        header("Location: index.php");
  
    }

?>